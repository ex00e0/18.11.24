<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Application;

class UserController extends Controller
{
    public function show_reg () {
        return view('reg');
    }
    public function show_appl () {
        return view('show_appl');
    }

    public function make_appl (Request $request) {
        $validator = Validator::make($request->all(),
        [
            "date_time" => ['required'],
            "address" => ['required'],
        ],
        $messages = [
            "date_time.required" => 'Не заполнено поле даты и времени',
            "address.required" => 'Не заполнено поле адреса',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }
        else {
            $user = Application::create([
                "date_time" => $request->date_time,
                "address" => $request->address,
                "service_type" => $request->service_type,
                "user_id" =>  Auth::user()->id,
            ]);
            return redirect()->route('appl')->withErrors(["success" => 'Заявка создана']);
        }
    }
    public function index () {
        return view('index');
    }

    public function exit (Request $request) {
        Auth::logout();
        return redirect()->route('index');
    }
    public function login (Request $request) {
        $user = User::where('login', $request->login)->exists();
        if ($user != false) {
            $user = User::where('login', $request->login)->first();
            if (Hash::check($request->password, $user->password)) {
                Auth::login(User::find($user->id));
                if ($user->role == 'user') {
                    return redirect()->route('appl');
                }
                else {
                    return redirect()->route('admin/appl');
                }
            } 
            else {
                return back()->withErrors(["password"=>'Неверный пароль']);
            }
        }
        else {
            return back()->withErrors(["login"=>'Неверный логин']);
        }
    }

    public function appl () {
        $appl = ['appl' => Application::where('user_id', Auth::user()->id)->latest()->get()];
        return view('appl', $appl);
    }


    public function reg (Request $request) {
        $validator = Validator::make($request->all(),
        [
            "full_name" => ['required', 'regex:/[А-Яа-я ]$/u'],
            "login" => ['required', 'unique:users'],
            "phone" => ['required', 'regex:/[+]{1}[7]{1}[0-9]{10}$/u'],
            "email" => ['required', 'unique:users'],
            "password" => ['required', 'min:6'],
        ],
        $messages = [
            "full_name.required" => 'Не заполнено поле ФИО',
            "full_name.regex" => 'Недопустимые символы в ФИО',
            "login.required" => 'Не заполнено поле логин',
            "login.unique" => 'Пользователь с таким логином уже есть',
            "phone.required" => 'Не заполнено поле номер телефона',
            "phone.regex" => 'Неверный формат номера телефона',
            "email.required" => 'Не заполнено поле электронная почта',
            "email.unique" => 'Данная электронная почта занята',
            "password.required" => 'Не заполнено поле пароль',
            "password.min" => 'Пароль должен быть не менее 6 символов',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }
        else {
            $user = User::create([
                "full_name" => $request->full_name,
                "login" => $request->login,
                "phone" => $request->phone,
                "email" => $request->email,
                "password" => Hash::make($request->password),
            ]);
            Auth::login($user);
            return redirect()->route('appl');
        }
    }
}

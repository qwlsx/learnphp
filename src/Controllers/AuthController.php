<?php

namespace App\Controllers;

use App\Models\User;

class AuthController {
    public function loginform() {
        view('auth/login');
    }

    public function login() {
        $users = User::where('email', $_POST['email']);
        $user = $users[0] ?? null;
        if(!$user || !password_verify($_POST['password'], $user->password)) {
            return redirect('/login');
        }
        $_SESSION['userID'] = $user->id;
        redirect('/');
    }

    public function registerForm() {
    view('auth/register');
    }

    public function register() {
        $users = User::where('email', $_POST['email']);
        $user = $users[0] ?? null;
        if(!$user && $_POST['password'] === $_POST['password_confirmation']) {
           return redirect('/register');
        }
        $user = new User();
        $user->name = $_POST['name'];
        $user->email = $_POST['email'];
        $user->password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $user->save();
        redirect('/login');
    }

    public function logout() {
        unset($_SESSION['userID']);
        redirect('/');
    }


}

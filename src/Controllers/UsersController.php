<?php

namespace App\Controllers;

use App\Models\User;

class UsersController
{
    public function index()
    {
        $users = User::all();
        view('users/index', compact('users'));
    }

    public function view()
    {
        if ($user = $this->findUser()) {
            view('users/view', compact('user'));
        }
    }

    public function create()
    {
        $user = new User();
        view('users/edit', compact('user'));
    }

    public function store()
    {
        $this->save(new User());
    }

    public function edit()
    {
        if ($user = $this->findUser()) {
            view('users/edit', compact('user'));
        }
    }

    public function update()
    {
        if ($user = $this->findUser()) {
            $this->save($user);
        }
    }

    public function delete()
    {
        if ($user = $this->findUser()) {
            $user->delete();
            if (($_SESSION['userID'] ?? null) == $user->id) {
                unset($_SESSION['userID']);
            }
            redirect('/admin/users');
        }
    }

    private function findUser()
    {
        $id = filter_var($_GET['id'] ?? null, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);
        $user = $id ? User::find($id) : false;
        if (!$user) {
            http_response_code(404);
            echo 'User not found';
        }
        return $user;
    }

    private function save(User $user)
    {
        $user->name = trim((string) ($_POST['name'] ?? ''));
        $user->email = trim((string) ($_POST['email'] ?? ''));
        $password = (string) ($_POST['password'] ?? '');
        $error = null;

        if ($user->name === '' || strlen($user->name) > 1024) {
            $error = 'Enter a name (up to 1024 bytes).';
        } elseif (strlen($user->email) > 255 || !filter_var($user->email, FILTER_VALIDATE_EMAIL)) {
            $error = 'Enter a valid email address.';
        } elseif (!$user->id && $password === '') {
            $error = 'Enter a password for the new user.';
        } else {
            foreach (User::where('email', $user->email) as $existing) {
                if ($existing->id != $user->id) {
                    $error = 'This email address is already in use.';
                    break;
                }
            }
        }

        if ($error) {
            http_response_code(422);
            view('users/edit', compact('user', 'error'));
            return;
        }

        if ($password !== '') {
            $user->password = password_hash($password, PASSWORD_DEFAULT);
        }
        $user->save();
        redirect('/admin/users');
    }
}

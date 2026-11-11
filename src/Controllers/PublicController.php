<?php

namespace App\Controllers;

use App\Models\Post;

class PublicController
{
    public function index()
    {
        $posts = Post::all();
        $title = 'World';
        view('index', compact('title', 'posts'));
    }

    public function us()
    {
        $posts = Post::all();
        $title = 'U.S';
        view('us', compact('title', 'posts'));
    }

    public function tech()
    {
        $title = 'Technology';
        $posts = [
            [
                'title' => 'Artificial Intelligence',
                'date' => 'October 1, 2026',
                'author' => 'Ruslan',
                'body' => 'Artificial intelligence is changing how people work and learn.',
            ],
            [
                'title' => 'New Smartphones',
                'date' => 'October 3, 2026',
                'author' => 'Ruslan',
                'body' => 'Modern smartphones have better cameras and faster processors.',
            ],
            [
                'title' => 'Cybersecurity',
                'date' => 'October 5, 2026',
                'author' => 'Ruslan',
                'body' => 'Cybersecurity helps protect computers and personal information.',
            ],
            [
                'title' => 'Cloud Computing',
                'date' => 'October 7, 2026',
                'author' => 'Ruslan',
                'body' => 'Cloud computing lets people store files and run services online.',
            ],
        ];

        view('tech', compact('title', 'posts'));
    }

    public function form()
    {
        $title = 'PHP Forms';
        $message = null;

        if (isset($_GET['name'])) {
            $message = 'GET: Hello, ' . $_GET['name'];
        }

        view('form', compact('title', 'message'));
    }

    public function submitForm()
    {
        $title = 'PHP Forms';
        $name = trim($_POST['name'] ?? '');
        $message = $name !== '' ? 'POST: Hello, ' . $name : 'Please enter your name.';

        view('form', compact('title', 'message'));
    }

    public function forms()
    {
        view('forms');
    }

    public function answer()
    {
        dump($_GET, $_POST);
    }
}

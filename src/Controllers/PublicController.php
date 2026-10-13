<?php

namespace App\Controllers;

class PublicController
{
    public function index()
    {
        $title = 'World';
        $posts = [
            [
                'title' => 'Some World title 1',
                'date' => 'January 1, 2021',
                'author' => 'Pets',
                'body' => 'Some World body 1',
            ],
            [
                'title' => 'Some World title 2',
                'date' => 'January 4, 2021',
                'author' => 'Jaanus',
                'body' => 'Some World body 2',
            ],
            [
                'title' => 'Some World title 3',
                'date' => 'January 6, 2021',
                'author' => 'Tseburaska',
                'body' => 'Some World body 3',
            ],
            [
                'title' => 'Some World title 4',
                'date' => 'January 8, 2021',
                'author' => 'Gena',
                'body' => 'Some World body 4',
            ],
        ];

        view('index', compact('title', 'posts'));
    }

    public function us()
    {
        $title = 'U.S';
        $posts = [
            [
                'title' => 'Some U.S title 1',
                'date' => 'January 1, 2021',
                'author' => 'Pets',
                'body' => 'Some U.S body 1',
            ],
            [
                'title' => 'Some U.S title 2',
                'date' => 'January 4, 2021',
                'author' => 'Jaanus',
                'body' => 'Some U.S body 2',
            ],
            [
                'title' => 'Some U.S title 3',
                'date' => 'January 6, 2021',
                'author' => 'Tseburaska',
                'body' => 'Some U.S body 3',
            ],
            [
                'title' => 'Some U.S title 4',
                'date' => 'January 8, 2021',
                'author' => 'Gena',
                'body' => 'Some U.S body 4',
            ],
        ];

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
}


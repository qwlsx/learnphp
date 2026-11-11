<?php

namespace App\Controllers;

use App\Models\Post;

class PostController
{
    public function index()
    {
        $posts = Post::all();
        view('posts/index', compact('posts'));
    }

    public function create()
    {
        view('posts/create');
    }

    public function store()
    {
        $post = new Post();
        $post->title = $_POST['title'];
        $post->body = $_POST['body'];
        $post->save();
        redirect('/admin/posts');
    }

    public function view()
    {
        $post = Post::find($_GET['id']);
        view('posts/view', compact('post'));
    }

    public function edit()
    {
        $post = Post::find($_GET['id']);
        view('posts/edit', compact('post'));
    }

    public function update()
    {
        $post = Post::find($_GET['id']);
        $post->title = $_POST['title'];
        $post->body = $_POST['body'];
        $post->save();
        redirect('/admin/posts');
    }

    public function delete()
    {
        $post = Post::find($_GET['id']);
        $post->delete();
        redirect('/admin/posts');
    }
}

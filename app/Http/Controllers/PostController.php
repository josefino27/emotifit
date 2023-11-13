<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    //

    public function index()
    {
        $posts = Post::all();
        //return dd($posts);
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        $data = [
            'Nombre' => 'Texto',
        ];

        return view('posts.create', $data);
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => "required",
            // Otros campos de la publicación que necesitas validar
        ]);
        $post = new Post();
        $post->titulo = $validatedData['title'];
        $post->descripcion = $validatedData['content'];
        // Otros campos de la publicación

        $post->save();

        return redirect()->route('posts.show', $post);
    }


    public function show(Post $post)
    {
//        return dd($post);
        return view('posts.show', compact('post'));
    }


    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }


    public function update(Request $request, Post $post)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            // Otros campos de la publicación que necesitas validar
        ]);

        $post->title = $validatedData['title'];
        $post->content = $validatedData['content'];
        // Otros campos de la publicación

        $post->save();

        return redirect()->route('posts.show', $post);
    }


    public function delete(Post $post)
    {
        return view('posts.delete', compact('post'));
    }
}

 // Redirigir a la vista de la publicación recién creada
        // return redirect()->route('post.show', $post);

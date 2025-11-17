<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Отобразить список ресурсов.
     */
    public function index()
    {
        $posts = Post::latest()->get();
        return view('home', compact('posts'));
    }

    /**
     * Отобразить форму для создания нового ресурса.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Сохранить только что созданный ресурс в хранилище.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
        ]);

        $userId = Auth::id(); 
        
        // Объединяем валидированные данные с user_id
        $dataToCreate = [
            'title' => $validatedData['title'],
            'body' => $validatedData['body'], 
            'user_id' => $userId,
        ];

        Post::create($dataToCreate);

        return redirect()->route('main')
                         ->with('success', 'Пост успешно создан!');
    }

    /**
     * Отобразить указанный ресурс.
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    // ... методы edit, update, destroy
}

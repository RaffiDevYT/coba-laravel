<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;

class PostController extends Controller
{
    public function index()
    {
        // dd(request('search'));
        $title = "";

        if (request('category')) {
            $title = " in " . Category::firstWhere('slug', request('category'))->name;
        } elseif (request('author')) {
            $title = " by " . User::firstWhere('username', request('author'))->name;
        }

        return view('posts', [
            'title' => 'All Post' . $title,
            'active' => 'posts',
            'posts' => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(7)->withQueryString()
            // latest() : mengurutkan post dari yang terbaru dan melakukan eager loading
            // filter() : melakukan filter berdasarkan search, category, dan author yang dikirimkan dari form
            // paginate() : melakukan pagination dan menampilkan 7 post per halaman
            // withQueryString() : menambahkan query string ke setiap link pagination yang dibuat oleh paginate()
        ]);
    }

    public function show(Post $post)
    {
        return view('post', [
            'title' => 'Single Post',
            'active' => 'posts',
            'post' => $post
        ]);
    }
}

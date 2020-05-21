<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function show()
    {
        return view('blog.show');
    }
}

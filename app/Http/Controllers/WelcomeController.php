<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class WelcomeController extends Controller
{
    public function index(){

        return view('welcome')
        ->with('categories', Category::all())
        ->with('posts', Post::searched()->simplePaginate(2));
    }
}

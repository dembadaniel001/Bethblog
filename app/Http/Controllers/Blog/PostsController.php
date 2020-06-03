<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Post;


class PostsController extends Controller
{
   public function show(Post $post){

       return view('blog.show')->with('post',$post);
   }
   public function category(Category $category){

    return view('blog.category')
    ->with('category',$category)
    ->with('posts',$category->posts()->searched()->SimplePaginate(2))
    ->with('categories',Category::all());
   }

}

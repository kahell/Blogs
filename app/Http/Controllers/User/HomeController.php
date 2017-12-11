<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Model\User\post;
use App\Model\User\category;
use App\Model\User\tag;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){
      $posts = post::where('status', 'on')->orderBy('created_at','DESC')->paginate(5);
      return view('user/blog', compact('posts'));
    }

    public function tag(tag $tag)
    {
      $posts = $tag->posts();
      return view('user/blog', compact('posts'));
    }

    public function category(category $category)
    {
        $posts = $category->posts();
        return view('user/blog', compact('posts'));
    }
}

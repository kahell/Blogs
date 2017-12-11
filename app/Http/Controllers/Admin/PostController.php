<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Model\User\post;
use App\Model\User\category;
use App\Model\User\tag;
use Illuminate\Support\Facades\File as LaraFile;
use App\Http\Controllers\Controller;

class PostController extends Controller
{

    public function index()
    {
      $posts = post::all();
      return view('admin.post.show', compact('posts'));
    }


    public function create()
    {
      $tags = tag::all();
      $categories = category::all();
      return view('admin.post.post', compact('tags', 'categories'));
    }


    public function store(Request $request)
    {

        $this->validate($request, [
          'title' => 'required',
          'subTitle' => 'required',
          'slug' => 'required',
          'bodyPost' => 'required',
          'inputImage'=> 'required'
        ]);

        if ($request->hasFile('inputImage')) {
          $imageName = $request->inputImage->store('public');
        }

        $post = new post;
        $post->image = $imageName;
        $post->title = $request->title;
        $post->subTitle = $request->subTitle;
        $post->slug = $request->slug;
        $post->body = $request->bodyPost;
        $post->status = $request->cbPublish;
        $post->save();
        $post->tags()->sync($request->tags);
        $post->categories()->sync($request->categories);

        return redirect(route('post.index'));
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
      $post = post::with('tags', 'categories')->where('id', $id)->get()->first();
      $tags = tag::all();
      $categories = category::all();
      return view('admin.post.edit', compact('tags', 'categories','post'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
          'title' => 'required',
          'subTitle' => 'required',
          'slug' => 'required',
          'bodyPost' => 'required'
        ]);

        $post = post::find($id);
          return unlink(public_path($request->oldInputImage));
        if ($request->hasFile('inputImage')) {


          $imageName = $request->inputImage->store('public');
          $post->image = $imageName;
        }

        $post->title = $request->title;
        $post->subTitle = $request->subTitle;
        $post->slug = $request->slug;
        $post->body = $request->bodyPost;
        $post->status = $request->cbPublish;
        $post->tags()->sync($request->tags);
        $post->categories()->sync($request->categories);
        $post->save();

        return redirect(route('post.index'));
    }

    public function destroy($id)
    {
        post::where('id', $id)->delete();
        return redirect()->back();
    }
}

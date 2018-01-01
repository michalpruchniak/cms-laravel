<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use Session;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts.index')->with('posts', Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        return view('admin.posts.edit')->with('post', $post)->with('categories', Category::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required'
        ]);
        $post = Post::find($id);
        if($request->hasFile('featured')){
            $featured = $request->featured;
            $featured_new_name = time().$featured->getClientOriginalName();
            $featured->move('uploads/posts', $featured_new_name);
            $post->featured = $featured_new_name;
        }
       $post->title = $request->title;
       $post->content = $request->content;
       $post->category_id = $request->category_id;
       $post->save();
        Session::flash('success', 'Post was updaded');

        return redirect()->route('posts');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        
        Session::flash('success', 'The post was just trashed');
        return redirect()->back();
    }
    public function trashed(){
        $posts = Post::onlyTrashed()->get();
        return view('admin.posts.trashed')->with('posts', $posts);
    }
    public function kill($id){
        $posts = Post::withTrashed()->where('id', $id)->get()->first();
        $posts->forceDelete();
        Session::FLASH('success', 'Post deleted permanently');

        return redirect()->back();
    }
    public function restore($id){
        $posts = Post::withTrashed()->where('id', $id)->get()->first();
        $posts->restore();
        Session::FLASH('success', 'Post restored seccessfully');

        return redirect()->back();
    }
}

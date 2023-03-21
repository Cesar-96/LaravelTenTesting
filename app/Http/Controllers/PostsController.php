<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
//         return dd($posts = Post::all());
        //$posts=Post::all();
        //$posts=Post::latest()->get();
        //$posts=Post::orderBy('id','asc')->get();
        $posts=Post::orderBy('id','asc')->get();
        //$posts=Post::latest();
        return view('posts.index',compact('posts'));


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('posts.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreatePostRequest $request)
    {
        //

//        $file = $request->file('file');                  //file is in create.blade.php
//
//        echo "<br>";
//        //echo $file-> getClientOriginalName();
//
//        echo "<br>";
//        echo $file->getClientOriginalExtension();


        $input = $request->all();

        if($file=$request->file('file')){
            $name = $file->getClientOriginalName();
            $file->move('images',$name);
            $input['path'] = $name;
        }

        Post::create($input);

//        return $request->all();


        //to create post in database
//          Post::create($request->all());

//        $input = $request->all();
//        $input['title']=$request->title;
//        Post::create($request->all());

//        $this->validate($request,[
//            'title'=>'required',
//            'content'=>'required'
//        ]);


//        $post=new Post;
//        $post->title= $request->title;
//        $post->content="lalalalla";
//        $post->save();

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //

        $post = Post::findOrFail($id);
        return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $post = Post::findOrFail($id);
        return view('posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $post = Post::findOrFail($id);
        $post->update($request->all());
        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $post = Post::findOrFail($id);
        $post->delete();
//        $post=Post::whereId($id)->delete();
        return redirect('/posts');
    }

    public function contact(){

        $people = ['pablito','maria','jose'];
        return view('contact',compact('people'));
    }


    public function show_post($id, $name, $password){
        //return view('post')->with('id',$id);

        return view('post',compact('id','name','password'));

    }

    public function posting($id,$name,$pass){
        return view('posting',compact('id','name','pass'));
    }
}

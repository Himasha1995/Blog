<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Dotenv\Validator;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {



            post::create([
                'user_id' => auth()->user()->id,
                'title' => $request->title,
                'description' => $request->description
            ]);

         return redirect(route('posts.all'))->with('status', 'Post Created Successfully ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $postId
     * @return \Illuminate\Http\Response
     */
    public function show($postId )
    {
        $post= Post::findOrFail($postId);

        return view('posts.show' ,compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $postId
     * @return \Illuminate\Http\Response
     */
    public function edit($postId)
    {
        $post= Post::findOrFail($postId);

        return view('posts.edit', compact('post'));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $postId
     * @return \Illuminate\Http\Response
     */
    public function update( $postId, Request $request)
    {
        Post::findOrFail($postId)->update($request->all());

        return redirect(route('posts.all'))->with('status', 'Post Successfully Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $postId
     * @return \Illuminate\Http\Response
     */
    public function delete($postId)
    {
        Post::findOrFail($postId)->delete();
        return redirect(route('posts.all'));

    }
}

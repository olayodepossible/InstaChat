<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');  // this protect the whole end-point
    }

    public function create(){
        return view('posts.create');
    }

    public function store(){
        $data = request()-> validate([
            /* 'fieldNoValidation' => '', this means this field does not need validation */
            'caption' => 'required',
            'post' => 'required',
            'image' => ['required', 'image'],
        ]);
        

        $imagePath = request('image') -> store('uploads', 'public');  // this what need to be save inside db
        //auth()->user->posts()->create($data); // this ensure user_id field is included
        
        //resize the image
        $image = Image::make(public_path("storage/{$imagePath}")) -> fit(1200, 1200);
        $image->save();
        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'post' => $data['post'],
            'image' => $imagePath,
        ]);

        return redirect('/profile/' . auth()->user()->id);
    }

    public function show(\App\Post $post){
        return view('posts.show', compact('post'));
       // return view('posts.show',['post' => $post]);

    }

}

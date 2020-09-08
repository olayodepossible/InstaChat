<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($user)
    {
        $user_db = User::findOrFail($user); // return 404 if not found
        return view('profiles.index', [  'user' => $user_db,]);
    }

    public function edit(User $user){
        $this -> authorize('update', $user -> profile);
        return view('profiles.edit', compact('user'));
    }

    public function update(User $user){
        $this -> authorize('update', $user -> profile);

        $data = request()-> validate([
            /* 'fieldNoValidation' => '', this means this field does not need validation */
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => ""  // can be supplied or not
        ]);

        if(request('image')){
            $imagePath = request('image') -> store('profile', 'public');  // this what we need to be able to save inside db

            //resize the image
            $image = Image::make(public_path("storage/{$imagePath}")) -> fit(1000, 1000);
            $image->save();
        }

        auth() -> user() -> profile -> update(array_merge(
            $data,
            ['image' => $imagePath] // quick way to merge two array together
        ));

        return redirect('/profile/'. $user -> id);


    }
}

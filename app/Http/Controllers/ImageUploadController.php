<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class ImageUploadController extends Controller
{
    public function imageUpload()
    {
        return view('main.dashboard');
    }

    


    public function imageUploadPost(Request $request)
    {
        $request->validate([

            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

    

        $imageName = time().'.'.$request->image->extension();

     

        $request->image->move(public_path('images'), $imageName);


        return back()

            ->with('success', 'You have successfully upload image.')

            ->with('image', $imageName);
    }
   
}
<?php

namespace App\Http\Controllers;

use App\Models\ShortUrl;
use Illuminate\Http\Request;

class ShortUrlController extends Controller
{
    public function index(){
        $allItems = ShortUrl::latest()->paginate(2);
        return view('index',compact('allItems'));
    }//end method

    public function store(Request $request){
        // dd($request->all());
        $request->validate([
            'url' => 'required|url',
        ]);

        $shortCode = substr(md5(uniqid()),0,6);
        ShortUrl::create([
            'original_url' => $request->url,
            'shortened_url' => $shortCode,
        ]);
        flash()->success('Short URL created successfully');
        return redirect()->back();
    }//end method

    public function redirect($shortCode){
        $shortUrl = ShortUrl::where('shortened_url',$shortCode)->firstOrFail();
        return redirect($shortUrl->original_url);
    }//end method
}

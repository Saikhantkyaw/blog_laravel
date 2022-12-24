<?php

namespace App\Http\Controllers;

use view;
use App\Models\post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\storepostrequest;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function index()
    {   
        $post=post::orderBy('id','desc')->get();
        return view('Home',compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  
        
       return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storepostrequest $request)
    {
       //   $validated = $request->validated();

     post::create([
       'name'=>$request->name,
       'description'=>$request->description,
     ]);
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(post $post)
    {
       dd($post->categories);
        return view('show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(post $post)
    {
         
            return view('edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(storepostrequest $request, post $post)
    {
         
         $post->update([
           'name'=>$request->name,
          'description'=>$request->description,
         ]);

         return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(post $post)
    {
        $post->delete();
        return redirect('/posts');
    }
}

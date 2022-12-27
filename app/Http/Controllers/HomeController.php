<?php

namespace App\Http\Controllers;

use view;
use App\Models\post;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $post=post::where('user_id',Auth::user()->id)->orderBy('id','desc')->get();
        return view('Home',compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  
       $cat=category::all();
       return view('create',compact('cat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storepostrequest $request)
    {
        $validated = $request->validated();

     post::create($validated);
       return redirect('/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(post $post)
    {
         // if ( Auth::user()->id != $post->user_id) {
         //    abort(403);
         // }
        $this->authorize('view',$post);
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
         if ( Auth::user()->id != $post->user_id) {
            abort(403);
        }
            $cat=category::all();
            return view('edit',compact('post','cat'));
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
          $validated = $request->validated();
         $post->update( $validated);

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

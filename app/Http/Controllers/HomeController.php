<?php

namespace App\Http\Controllers;

use view;
use App\Models\post;
use App\Models\category;
use App\Mail\poststoredmail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
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
        // Mail::raw('hello sai',function($msg){
        //     $msg->to('saikhantkyaw1551@gmail.com')->subject('test_mail');
        // });
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
 
     post::create($validated + ['user_id'=>Auth::user()->id]);
     Mail::to($request->user())->send(new poststoredmail());
       return redirect('/posts')->with('alert',config('apap.massage.create'));
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
        $this->authorize('view',$post);
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

         return redirect('/posts')->with('alert',config('apap.massage.update'));
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
        return redirect('/posts')->with('alert',config('apap.massage.delete'));
    }
}

<?php

namespace App\Http\Controllers\admin;

use Str;
use Session;
use Carbon\Carbon;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at','DESC')->paginate(5);
        return view('admin.post.post',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.post.create-post', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|unique:posts,title',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'description' => 'required',
            'category' => 'required',
        ]);
        
        $post = Post::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'image' => 'image.jpg',
            'description' => $request->description,
            'category_id' => $request->category,
            'user_id' => auth()->user()->id,
            'published_at' => Carbon::now(),
        ]);

        if($request->has('image')){
            $image = $request->image;
            $image_rename = time().'.'.$image->getClientOriginalExtension();
            $image->storeAs('post', $image_rename);
            $post->image = $image_rename;
            $post->save();
        }

        Session::flash('success','Post has been added successfull');
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('admin.post.update-post',compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->validate($request,[
            'title' => 'required|unique:posts,title',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'description' => 'required',
            'category' => 'required',
        ]);
        
       
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        // $post->image = 'image.jpg';
        $post->description = $request->description;
        $post->category_id = $request->category;
        $post->user_id = auth()->user()->id;
        $post->published_at = Carbon::now();

        if(file_exists(public_path('storage/post/'.$post->image))){
            unlink(public_path('storage/post/'.$post->image));
        }

        $image = $request->image;
        $image_rename = time().'.'.$image->getClientOriginalExtension();
        $image->storeAs('post', $image_rename);
        $post->image = $image_rename;
        $post->update();

        Session::flash('updated','Post has been updated successfull');
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if($post){
            if(file_exists(public_path('storage/post/'.$post->image))){
                unlink(public_path('storage/post/'.$post->image));
            }

            $post->delete();
            Session::flash('delete','Post has been deleted');
            return redirect()->route('post.index');
        }

    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Post $post)
    {
        return view('admin.post.index')
        ->with('posts', $post->latest()->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Category $category)
    {
        

        return view('admin.post.create')
        ->with('categories', $category->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // dd($request->all());

        if($request->hasFile('thumbnail')){
            $filename = uniqid(). $request->file('thumbnail')->getClientOriginalName();
           
            $request->thumbnail->storeAs('images/admin', $filename, 'public');
        }
        else{
            $filename = 'default.png';
        
        }

        

        $request->validate([
            'title'         =>  'required|max:255',
            'description'   =>  'required',
            'thumbnail'     =>  'mimes:jpg,bmp,png,jpeg,gif',
            'category_id'   =>  'integer|required',
        ]);
        
       
        Post::create([
            'title'         =>  $request->input('title'),
            'description'   =>  $request->input('description'),
            'slug'          =>  Str::slug(Str::limit($request->input('title'), 40,), '-')."-".time(),
            'thumbnail'     =>  $filename,
            'user_id'       =>  Auth::user()->id,
            'category_id'   =>  $request->input('category_id'),
        ]);
        
        return back()->with('msg', "succeed");
    }

    /**user_id
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();
        dd($post->title);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $post = Post::where('id', $id)->first();
                
        return view('admin.post.edit', [
            'post' => $post,
            'categories'=>Category::all()
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $post = new Post();
        $post = $post->where('id', $id);

        $request->validate([
            'title'         =>  'required|max:255',
            'description'   =>  'required',
            'thumbnail'     =>  'mimes:jpg,bmp,png,jpeg,gif',
            'category_id'      =>  'integer|required',
        ]);
        
        $slug = Str::slug(Str::limit($request->input('title'), 40,), '-')."-".time(); 
        
        if($request->hasFile('thumbnail')){
            $filename = uniqid(). $request->file('thumbnail')->getClientOriginalName();
           
            $request->thumbnail->storeAs('images/admin', $filename, 'public');
        }else{
            $filename = $post->first()->thumbnail;
        }
        


        $post->update($request->only([
            'title',
            'description',
            'category_id'
            
        ]) + [
            'slug'  => $slug,
            'thumbnail' => $filename,
        ]);
        
        return redirect('post')->with('msg', 'Success');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        
        // dd();
        $post->delete();
        
        Storage::disk('public')->delete('images/admin/'.$post->thumbnail);
        return back()->with('msg', "deleted");
    }
}

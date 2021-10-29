<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Rules\AlphaSpaces;

use function Ramsey\Uuid\v1;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       


        return view('admin.category.index')->with('categories', Category::all());

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
        // dd();
        $request->validate([
            'name' => ['required', 'string', new AlphaSpaces],
        ]);

        Category::create([
            'name'  =>  $request->input('name'),
            'user_id'  =>  Auth::id(),
        ]);

        return back()->with('msg', "created");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {

        // dd($category);
        return view('admin.category.edit', [
            'category'  =>  $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd();
        $request->validate([
            'name' => ['required', 'string', new AlphaSpaces],
        ]);

        Category::find($id)->update($request->only('name'));

        return redirect(route('category.index'))->with('updated_msg', "Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::find($id)->delete();
        return redirect(route('category.index'))->with('delete_msg', "Deleted");
    }
}

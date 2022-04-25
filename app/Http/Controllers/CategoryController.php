<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource as tree.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return Category::select('id', 'parent_id', 'title', '_lft', '_rgt')->with(['products' => function ($query) {
            $query->select('id', 'name', 'price');
        }])->get()->toTree();
    }

    /**
     * Display a listing of the resource as flat array.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function indexFlat(Request $request)
    {
        return Category::select('id', 'parent_id', 'title', '_lft', '_rgt')->with(['products' => function ($query) {
            $query->select('id', 'name', 'price');
        }])->get();
    }

    /**
     * Display the specified resource as sub-tree.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        return Category::select('id', 'parent_id', 'title', '_lft', '_rgt')->with(['products' => function ($query) {
            $query->select('id', 'name', 'price');
        }])->descendantsAndSelf($id)->toTree()->first();
    }

    /**
     * Display the specified resource as flat array.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function showFlat(int $id)
    {
        return Category::select('id', 'parent_id', 'title', '_lft', '_rgt')->with(['products' => function ($query) {
            $query->select('id', 'name', 'price');
        }])->descendantsAndSelf($id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required|min:3',
            'parent_id' => 'required|numeric',
        ]);
        return Category::create($validate);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $category = Category::findOrFail($id);
        $validate = $request->validate([
            'title' => 'required|min:3',
            'parent_id' => 'numeric',
        ]);
        $category->update($validate);
        return $category;
    }

    /**
     * Remove the specified resource from storage.
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, int $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return response()->noContent();
    }
}

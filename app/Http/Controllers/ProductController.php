<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Product::select('id', 'name', 'price')->with(['categories' => function ($query) {
            $query->select('id', 'parent_id', 'title');
        }])->select('id', 'name', 'price')->get();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        return Product::with(['categories' => function ($query) {
            $query->select('id', 'parent_id', 'title');
        }])->select('id', 'name', 'price')->findOrFail($id);
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
            'name' => 'required|min:3',
            'price' => 'required|between:0.1,100',
        ]);
        return Product::create($validate);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $product = Product::findOrFail($id);
        $validate = $request->validate([
            'name' => 'required|min:3',
            'price' => 'required|between:0.1,100',
        ]);
        $product->update($validate);
        return $product;
    }

    /**
     * Remove the specified resource from storage.
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, int $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return response()->noContent();
    }

    /**
     * Update the product categories.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function updateCategories(Request $request, int $id)
    {
        $product = Product::findOrFail($id);
        $validate = $request->validate([
            'categories' => 'required',
        ]);
        $categoriesIds = json_decode($request->all()['categories'], true);
        $product->categories()->sync($categoriesIds);

        return $this->show($id);
    }
}

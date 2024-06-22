<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.categori.index');
    }

    public function getAllData()
    {
        $data = Category::latest()->get();
        return response()->json([
            'status' => 200,
            'data' => $data
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $data = [
            'name' => $request->name
        ];

        if (Category::create($data)) {
            return response()->json([
                'status' => 200,
                'message' => 'Sussesfully add cateogries.'
            ]);
        }
        return response()->json([
            'status' => 201,
            'message' => 'Server Error.'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        if ($category) {
            return response()->json([
                'status' => 200,
                'data' => $category
            ]);
        }
        return response()->json([
            'message' => 'Data not found.'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update([
            'name' => $request->name
        ]);
        return response()->json([
            'status' => 200,
            'message' => 'Successfully update categories.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if ($category) {
            $category->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Successfully delete categories.'
            ]);
        }
        return response()->json([
            'status' => 404,
            'message' => 'Categories not found.'
        ]);
    }
}
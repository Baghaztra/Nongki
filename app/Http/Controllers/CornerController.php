<?php

namespace App\Http\Controllers;

use App\Models\Corner;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCornerRequest;
use App\Http\Requests\UpdateCornerRequest;

class CornerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // Ambil data Corner dengan relasi terkait
        $corners = Corner::with(['images', 'categories', 'facilities'])->latest()->paginate(25);
        $categories = Category::latest()->get();

        return view('home.home', compact('corners', 'categories'));
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
    public function store(StoreCornerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Corner $corner)
    {
        return response()->json([
            'status' => 200,
            'data' => $corner
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Corner $corner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCornerRequest $request, Corner $corner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Corner $corner)
    {
        //
    }

}

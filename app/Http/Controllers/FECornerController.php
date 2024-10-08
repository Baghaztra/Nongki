<?php

namespace App\Http\Controllers;

use App\Models\Corner;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FECornerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $corners = Corner::with(['images', 'categories', 'facilities'])->latest()->paginate(25);
        $categories = Category::latest()->get();

        return view('home.index', ['corners'=>$corners]);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

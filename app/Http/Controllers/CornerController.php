<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCornerRequest;
use App\Http\Requests\UpdateCornerRequest;
use App\Models\Category;
use App\Models\Corner;

class CornerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view('home');
        $corners=Corner::latest()->paginate(25);
        $category=Category::latest()->paginate(25);
        return view('home.home')->with(['corners'=> $corners,'category'=> $category]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
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
        //
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

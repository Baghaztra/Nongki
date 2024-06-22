<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCornerRequest;
use App\Http\Requests\UpdateCornerRequest;
use App\Models\Corner;

class CornerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $corner = Corner::latest()->paginate(10);

        return view("admin.corner.index", ['corner' => $corner, 'search' => request('search')]);
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

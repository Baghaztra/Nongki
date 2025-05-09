<?php

namespace App\Http\Controllers;

use App\Models\Recomendation;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.dashboard');
    }

    public function getAllData()
    {
        return response()->json([
            'status' => 200,
            'data' => Recomendation::latest()->where('status', '=', 0)->get()
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Recomendation $recomendation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Recomendation $recomendation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Recomendation::where('id', $id)->update(['status' => 1]);
        return response()->json([
            'status' => 200,
            'message' => 'OKAY'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recomendation $recomendation)
    {
        //
    }
}
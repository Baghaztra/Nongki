<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFacilityRequest;
use App\Http\Requests\UpdateFacilityRequest;
use App\Models\Facility;

class FacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.facilities.index");
    }

    public function getAllData()
    {
        $data = Facility::latest()->get();
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
    public function store(StoreFacilityRequest $request)
    {
        if (Facility::create(['name' => $request->name])) {
            return response()->json([
                'status' => 200,
                'message' => 'Successfully add fasility.'
            ]);
        }

        return response()->json([
            'status' => 201,
            'message' => 'Error add fasility.'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Facility $facility)
    {
        return response()->json([
            'status' => 200,
            'data' => $facility
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Facility $facility)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFacilityRequest $request, Facility $facility)
    {
        if ($facility->update(['name' => $request->name])) {
            return response()->json([
                'status' => 200,
                'message' => 'Successfully update facilities.'
            ]);
        }
        return response()->json([
            'status' => 201,
            'message' => 'Error update facilities.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Facility $facility)
    {
        if ($facility->delete()) {
            return response()->json([
                'status' => 200,
                'message' => 'Successfully dalete facilities.'
            ]);
        }
        return response()->json([
            'status' => 201,
            'message' => 'Error update facilities.'
        ]);
    }
}
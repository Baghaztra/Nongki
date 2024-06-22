<?php

namespace App\Http\Controllers;

use App\Models\Corner;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Facility;

class FECornerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Corner::query()
            ->select('corners.*')
            ->join('corner_facilities', 'corners.id', '=', 'corner_facilities.corner_id')
            ->join('facilities', 'corner_facilities.facility_id', '=', 'facilities.id')
            ->join('corner_categories', 'corners.id', '=', 'corner_categories.corner_id')
            ->join('categories', 'corner_categories.category_id', '=', 'categories.id')
            ->distinct();

        if ($request->has('q')) {
            $search = $request->q;
            $query->where('corners.name', 'like', '%' . $search . '%');
        }

        if ($request->has('categories')) {
            $categories = $request->categories;
            $query->where(function($q) use ($categories) {
                $q->whereIn('categories.id', $categories);
            });
        }

        if ($request->has('facilities')) {
            $facilities = $request->facilities;
            $query->where(function($q) use ($facilities) {
                $q->whereIn('facilities.id', $facilities);
            });
        }

        $corners = $query->latest()->paginate(25);
        $categories = Category::latest()->get();
        $facilities = Facility::latest()->get();

        return view('home.index', compact('corners', 'categories', 'facilities'));
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
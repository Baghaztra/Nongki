<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Corner;

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

        return view('home.home', ['corners' => $corners, 'categories' => $categories]);
    }

    // Metode lainnya tetap sama
}

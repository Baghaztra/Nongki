<?php

namespace App\Http\Controllers;

use App\Models\Corner;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Facility;
use App\Models\Recomendation;

class FECornerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    // Membuat query dasar dengan join tabel terkait
    $query = Corner::query()
    ->select('corners.id', 'corners.name', 'corners.location', 'corners.created_at', 'corners.updated_at', 
             'corners.detail', 'corners.jam_buka', 'corners.jam_tutup', 'corners.hari_buka', 'corners.harga_min', 'corners.harga_max') 
    ->join('corner_facilities', 'corners.id', '=', 'corner_facilities.corner_id')
    ->join('facilities', 'corner_facilities.facility_id', '=', 'facilities.id')
    ->join('corner_categories', 'corners.id', '=', 'corner_categories.corner_id')
    ->join('categories', 'corner_categories.category_id', '=', 'categories.id')
    ->groupBy('corners.id', 'corners.name', 'corners.location', 'corners.created_at', 'corners.updated_at', 
              'corners.detail', 'corners.jam_buka', 'corners.jam_tutup', 'corners.hari_buka', 'corners.harga_min', 'corners.harga_max') 
    ->distinct();

    // Filter berdasarkan pencarian nama
    if ($request->has('q')) {
        $search = $request->q;
        $query->where('corners.name', 'like', '%' . $search . '%');
    }

    // Filter berdasarkan kategori
    if ($request->has('categories')) {
        $categories = $request->categories;
        $query->whereIn('categories.id', $categories);
    }

    // Filter berdasarkan fasilitas
    if ($request->has('facilities')) {
        $facilities = $request->facilities;
        $query->whereIn('facilities.id', $facilities)
              ->havingRaw('COUNT(DISTINCT facilities.id) = ?', [count($facilities)]);
    }

    // Mendapatkan hasil query dengan paginasi
    $corners = $query->latest()->paginate(10);

    // Mendapatkan data kategori dan fasilitas terbaru
    $categories = Category::latest()->get();
    $facilities = Facility::latest()->get();

    // Mengirim data ke view
    return view('home.index', compact('corners', 'categories', 'facilities'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function sendRekomendasi(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'judul' => 'required',
            'detail' => 'required',
            'lokasi' => 'required',
        ]);

        Recomendation::create([
            'name' => $request->name,
            'email' => $request->email,
            'title' => $request->judul,
            'detail' => $request->detail,
            'location' => $request->lokasi
        ]);

        return response()->json([
            'status' => 200,
            'message' => 'Terima kasih telah memberikan rekomendasi kepada kami.'
        ]);
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
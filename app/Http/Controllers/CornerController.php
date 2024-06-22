<?php

namespace App\Http\Controllers;

use App\Models\Corner;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCornerRequest;
use App\Http\Requests\UpdateCornerRequest;
use App\Models\CornerCategories;
use App\Models\CornerFacilities;
use App\Models\Facility;
use App\Models\Image;

class CornerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest()->get();
        $facilities = Facility::latest()->Get();
        return view("admin.corner.index")->with(['categories' => $categories, 'facilities' => $facilities]);
    }

    public function getAllData()
    {
        $data = Corner::with(['facilities', 'categories', 'images'])->latest()->get();
        return response()->json([
            'status' => 200,
            'message' => 'data found',
            'data' => $data
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $corner = Corner::all();
        $facilities = Facility::all();
        $categories = Category::all();
        return view('admin.corner.create', ['corner'=>$corner, 'facilities'=>$facilities, 'categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCornerRequest $request)
    {
        $corner = Corner::create([
            'location' => $request->location,
            'name' => $request->name,
            'detail' => $request->detail,
            'jam_buka' => $request->jam_buka,
            'jam_tutup' => $request->jam_tutup,
            'hari_buka' => $request->days,
            'harga_min' => $request->harga_min,
            'harga_max' => $request->harga_max,
        ]);

        if (!empty($request->facilities)) {
            $cornerID = Corner::latest()->first();
            $arrayFacilies = $request->facilities;
            for ($i = 0; $i < count($arrayFacilies); $i++) {
                CornerFacilities::create([
                    'corner_id' => $cornerID->id,
                    'facility_id' => $arrayFacilies[$i]
                ]);
            }
        }
        if (!empty($request->categories)) {
            $cornerID = Corner::latest()->first();
            $arrayCategories = $request->categories;
            for ($i = 0; $i < count($arrayCategories); $i++) {
                CornerCategories::create([
                    'corner_id' => $cornerID->id,
                    'category_id' => $arrayCategories[$i]
                ]);
            }
        }

        if ($request->hasFile('gambar')) {
            $i = 0;
            foreach($request->file('gambar') as $file) {
                $fileName = time() . $i . '.' . $file->getClientOriginalExtension();
                $i++;
                $file->move(public_path('images'), $fileName);
                $asset = new Image();
                $asset->path = '/images/'.$fileName;
                $asset->corner_id = $corner->id;
                $asset->save();
            }
        }

        return redirect('admin/corner');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $corner = Corner::with(['facilities', 'categories', 'images'])->where('id', $id)->latest()->first();
        return response()->json([
            'status' => 200,
            'data' => $corner
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        $corner = Corner::findOrFail($id);
        $facilities = Facility::all();
        $categories = Category::all();
        return view('admin.corner.update', ['corner'=>$corner, 'facilities'=>$facilities, 'categories'=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCornerRequest $request, string $id)
    {
        $corner = Corner::findOrFail($id);

        $corner->update([
            'location' => $request->location,
            'name' => $request->name,
            'detail' => $request->detail,
            'jam_buka' => $request->jam_buka,
            'jam_tutup' => $request->jam_tutup,
            'hari_buka' => $request->days,
            'harga_min' => $request->harga_min,
            'harga_max' => $request->harga_max,
        ]);

        CornerFacilities::where('corner_id', $id)->delete();
        if (!empty($request->facilities)) {
            $arrayFacilies = $request->facilities;
            for ($i = 0; $i < count($arrayFacilies); $i++) {
                CornerFacilities::create([
                    'corner_id' => $corner->id,
                    'facility_id' => $arrayFacilies[$i]
                ]);
            }
        }

        CornerCategories::where('corner_id', $id)->delete();
        if (!empty($request->categories)) {
            $arrayCategories = $request->categories;
            for ($i = 0; $i < count($arrayCategories); $i++) {
                CornerCategories::create([
                    'corner_id' => $corner->id,
                    'category_id' => $arrayCategories[$i]
                ]);
            }
        }

        if ($request->hasFile('gambar')) {
            // Delete old images
            Image::where('corner_id', $id)->delete();

            $i = 0;
            foreach ($request->file('gambar') as $file) {
                $fileName = time() . $i . '.' . $file->getClientOriginalExtension();
                $i++;
                $file->move(public_path('images'), $fileName);
                $asset = new Image();
                $asset->path = '/images/' . $fileName;
                $asset->corner_id = $corner->id;
                $asset->save();
            }
        }

        

        return redirect('admin/corner');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Corner $corner)
    {
        if (!$corner) {
            return response()->json([
                'status' => 404,
                'message' => 'Data not found'
            ]);
        }
        $corner->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Successfully delete corner'
        ]);
    }
}
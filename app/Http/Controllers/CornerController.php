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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCornerRequest $request)
    {
        Corner::create([
            'location' => $request->location,
            'name' => $request->name,
            'detail' => $request->detail
        ]);

        if (!empty($request->facilities)) {
            $cornerID = Corner::latest()->first();
            $arrayFacilies = explode(',', $request->facilities);
            for ($i = 0; $i < count($arrayFacilies); $i++) {
                CornerFacilities::create([
                    'corner_id' => $cornerID->id,
                    'facility_id' => $arrayFacilies[$i]
                ]);
            }
        }
        if (!empty($request->categories)) {
            $cornerID = Corner::latest()->first();
            $arrayCategories = explode(',', $request->categories);
            for ($i = 0; $i < count($arrayCategories); $i++) {
                CornerCategories::create([
                    'corner_id' => $cornerID->id,
                    'category_id' => $arrayCategories[$i]
                ]);
            }
        }

        return response()->json([
            'status' => 200,
            'message' => 'Successfully add corner.'
        ]);
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
    public function edit(Corner $corner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCornerRequest $request, string $id)
    {
        $corner = Corner::where('id', $id);
        $currentCategories = CornerCategories::where('corner_id', $corner->first()->id)->get();
        $currentFacilities = CornerFacilities::where('corner_id', $corner->first()->id)->get();
        $corner->update([
            'location' => $request->location,
            'name' => $request->name,
            'detail' => $request->detail
        ]);

        if (!empty($request->facilities)) {
            $arrayFacilities = explode(',', $request->facilities);

            $currentFacilityId = [];
            foreach ($currentFacilities as $value) {
                $currentFacilityId[] = $value->facility_id;
            }

            // Cari kategori yang harus dihapus
            $categoriesToDelete = array_diff($currentFacilityId, $arrayFacilities);

            // Hapus kategori yang tidak ada di request
            CornerFacilities::where('corner_id', $corner->first()->id)
                ->whereIn('facility_id', $categoriesToDelete)
                ->delete();

            for ($i = 0; $i < count($arrayFacilities); $i++) {
                CornerFacilities::updateOrCreate([
                    'corner_id' => $corner->first()->id,
                    'facility_id' => $arrayFacilities[$i]
                ]);
            }
        }
        if (!empty($request->categories)) {
            $arrayCategories = explode(',', $request->categories);

            $currentCategoryIds = [];
            foreach ($currentCategories as $category) {
                $currentCategoryIds[] = $category->category_id;
            }
            // Cari kategori yang harus dihapus
            $categoriesToDelete = array_diff($currentCategoryIds, $arrayCategories);

            // Hapus kategori yang tidak ada di request
            CornerCategories::where('corner_id', $corner->first()->id)
                ->whereIn('category_id', $categoriesToDelete)
                ->delete();

            for ($i = 0; $i < count($arrayCategories); $i++) {
                CornerCategories::updateOrCreate([
                    'corner_id' => $corner->first()->id,
                    'category_id' => $arrayCategories[$i]
                ]);
            }
        }
        return response()->json([
            'status' => 200,
            'message' => 'Successfully update corner.',
            'data_id' => $corner->first()->id
        ]);
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
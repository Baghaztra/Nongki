<?php

namespace App\Imports;

use App\Models\Corner;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CornerImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // dd($row);
        // return response()->json($row);
        return new Corner([
            'name' => $row['nama'],
            'location' => $row['lokasi'],
            'detail' => $row['detail']
        ]);
    }
}
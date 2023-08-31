<?php

namespace App\Imports;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class CategoriesImport implements ToModel, WithStartRow
{
    /**
     * @param array $row
     *
     * @return Model|null
     */
    public function model(array $row)
    {
        return Category::create([
            'id' => $row[0],
            'name' => $row[1],
            'category_id' => $row[2],
            'image_url' => $row[3] != 0 ? $row[3] : null
        ]);
    }

    public function startRow(): int
    {
        return 2;
    }
}

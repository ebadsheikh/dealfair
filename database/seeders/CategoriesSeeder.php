<?php

namespace Database\Seeders;

use App\Helpers\GlobalHelper;
use App\Imports\CategoriesImport;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;

class CategoriesSeeder extends Seeder
{
    public function run(): void
    {
        $filePath = storage_path('CSVFilesForImportData/category_data.csv');
        Excel::import(new CategoriesImport(), $filePath);
        GlobalHelper::preFetchLeafCategories();
    }

    public function chunkSize(): int
    {
        return 300;
    }
}

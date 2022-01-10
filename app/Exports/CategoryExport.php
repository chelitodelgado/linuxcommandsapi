<?php

namespace App\Exports;

use App\Models\Category;
use Maatwebsite\Excel\Concerns\FromCollection;

class CategoryExport implements FromCollection
{
    public function collection()
    {
        $result = Category::select('name')->get();
        return $result;
    }
}

<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\General\GeneralController;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CategoryExport;

class UploadFileController extends GeneralController
{
    public function exportCategorys()
    {
        $categoryAll = new CategoryExport;
        $categoryAll->collection();
        return Excel::download($categoryAll, 'Lista de categorias.xlsx');
    }
}

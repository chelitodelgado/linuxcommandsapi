<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\General\GeneralController;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CategoryExport;
use App\Exports\CommandExport;

class UploadFileController extends GeneralController
{
    public function exportCategorys()
    {
        $categoryAll = new CategoryExport;
        $categoryAll->collection();
        return Excel::download($categoryAll, 'Lista de categorias.xlsx');
    }

    public function exportCommands()
    {
        $commandsAll = new CommandExport;
        $commandsAll->collection();
        return Excel::download($commandsAll, 'Lista de comandos.xlsx');
    }
}

<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;

class CommandExport implements FromCollection
{
    public function collection()
    {
        $result = DB::table('commands')
            ->join('categorys', 'commands.category_id', '=', 'categorys.id')
            ->select('commands.command', 'commands.description', 'categorys.id')
            ->get();
        return $result;
    }
}

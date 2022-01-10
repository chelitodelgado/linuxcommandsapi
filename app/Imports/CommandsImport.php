<?php

namespace App\Imports;

use App\Models\Command;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class CommandsImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row)
        {
            Command::create([
                'command'     => $row[0],
                'description' => $row[1],
                'category_id' => $row[2],
            ]);
        }
    }
}

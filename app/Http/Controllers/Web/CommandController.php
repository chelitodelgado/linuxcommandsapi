<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\General\GeneralController;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommandController extends GeneralController
{
    public function showCategorys()
    {
        try {
            $result = Category::select('name')->get();
            return $this->sendResponse($result, 'List of categorys.');
        } catch (\Throwable $th) {
            //throw $th;
            return $this->sendError('Error ', 'Error displaying categories!.');
        }
    }

    public function showNameCategory($category) {
        try {
            // $result = Category::orWhere('name', 'like', '%' ,$name, '%')->get();
            $result = Category::where('name', '=', $category)->get();;
            return $this->sendResponse($result, 'Show category');
        } catch (\Throwable $th) {
            //throw $th;
            return $this->sendError('Category error', 'Error displaying category!.');
        }
    }

    public function showCommands()
    {
        try {
            $result = DB::table('commands')
            ->join('categorys', 'commands.category_id', '=', 'categorys.id')
            ->select('commands.command', 'commands.description', 'categorys.name as category')
            ->orderBy('categorys.id')
            ->get();
            return $this->sendResponse($result, 'List of commands.');
        } catch (\Throwable $th) {
            //throw $th;
            return $this->sendError('Error ', 'Error displaying commands!.');
        }
    }

    public function showCommandByCategoria() {
        try {

            $result = DB::table('commands')
            ->join('categorys', 'commands.category_id', '=', 'categorys.id')
            ->select('commands.command', 'commands.description')
            ->orderBy('categorys.id')
            ->get();

            $data['category'] = 'Categoria';
            $data['commands'] = $result;
            $data2 = $data;
            $data3 = $data;
            $data4 = $data3;

            return $this->sendResponse($data4, 'List of commands by categoria.');

        } catch (\Throwable $th) {
            return $this->sendError('Error ', 'Error displaying commands!.');
        }
    }

}

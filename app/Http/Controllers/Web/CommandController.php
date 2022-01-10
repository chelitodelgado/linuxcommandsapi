<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\General\GeneralController;
use App\Models\Category;
use App\Models\Command;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommandController extends GeneralController
{
    public function showCategorys()
    {
        try {
            $result = Category::select('name')->get();
            if (count($result) > 0) {
                return $this->sendResponse($result, 'List of categorys.');
            }else {
                return $this->sendError('Error ', 'Error displaying categories!.');
            }
        } catch (\Throwable $th) {
            //throw $th;
            return $this->sendError('Error ', 'Error displaying categories!.');
        }
    }

    public function showNameCategory($category) {
        try {
            // $result = Category::orWhere('name', 'like', '%' ,$name, '%')->get();
            $result = Category::where('name', '=', $category)->get();
            if (count($result) > 0) {
                return $this->sendResponse($result, 'Show category');
            } else {
                return $this->sendError('Category error', 'Error displaying category!.');
            }

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
            if (count($result) > 0) {
                return $this->sendResponse($result, 'List of commands.');
            } else {
                return $this->sendError('Error ', 'Error displaying commands!.');
            }

        } catch (\Throwable $th) {
            //throw $th;
            return $this->sendError('Error ', 'Error displaying commands!.');
        }
    }

    public function showNameCommand($command) {
        try {
            // $result = Category::orWhere('name', 'like', '%' ,$name, '%')->get();
            $result = DB::table('commands')
            ->join('categorys', 'commands.category_id', '=', 'categorys.id')
            ->select('commands.command', 'commands.description', 'categorys.name as category')
            ->where('command', '=', $command)
            ->get();
            if(count($result) > 0){
                return $this->sendResponse($result, 'Show command.');
            }else {
                return $this->sendError('Command error', 'Error displaying command!.');
            }
        } catch (\Throwable $th) {
            //throw $th;
            return $this->sendError('Command error', 'Error displaying command!.');
        }
    }

    public function showCommandByCategoria($category) {
        try {

            $result = DB::table('commands')
            ->join('categorys', 'commands.category_id', '=', 'categorys.id')
            ->select('commands.command', 'commands.description', 'categorys.name as category')
            ->where('categorys.name', '=', $category)
            ->get();

            return $this->sendResponse($result, 'List of commands by categoria.');

        } catch (\Throwable $th) {
            return $this->sendError('Error ', 'Error displaying commands!.');
        }
    }

}

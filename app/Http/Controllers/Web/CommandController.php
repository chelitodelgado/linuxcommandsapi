<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\General\GeneralController;
use App\Models\Category;
use App\Models\Command;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommandController extends GeneralController
{
    public function showCategorys($lang)
    {
        try {
            $result = Category::select('id', 'name', 'ico')
            ->where('lang', '=', $lang)->orderBy('id', 'desc') ->get();
            if (count($result) > 0) {
                $retVal = ($lang == 'en') ? 'List of categorys.' : 'Lista de categorias' ;
                return $this->sendResponse($result, $retVal);
            }else {
                $retVal = ($lang == 'en') ? 'Error displaying categories!.' : 'No se encontraron categorias' ;
                return $this->sendError($retVal);
            }
        } catch (\Throwable $th) {
            //throw $th;
            $retVal = ($lang == 'en') ? 'Error displaying categories!.' : 'Error al mostrar categorias!.' ;
            return $this->sendError('Error ', $retVal);
        }
    }

    public function showNameCategory($lang, $category) {
        try {
            // $result = Category::orWhere('name', 'like', '%' ,$name, '%')->get();
            $result = Category::where('id', 'name', 'like', '%'.$category.'%')
            ->select('name')
            ->where('lang', '=', $lang)
            ->get();
            if (count($result) > 0) {
                $retVal = ($lang == 'en') ? 'Show category' : 'Mostrar categoria' ;
                return $this->sendResponse($result, $retVal);
            } else {
                $retVal = ($lang == 'en') ? 'Category not found!.' : 'No se encontra la categoria' ;
                return $this->sendError($retVal);
            }

        } catch (\Throwable $th) {
            //throw $th;
            $retVal = ($lang == 'en') ? 'Category not found!.' : 'No se encontra la categoria' ;
            return $this->sendError($retVal);
        }
    }

    public function showCommands($lang)
    {
        try {
            $result = DB::table('commands')
            ->join('categorys', 'commands.category_id', '=', 'categorys.id')
            ->select('commands.command', 'commands.description', 'categorys.name as category')
            ->orderBy('categorys.id')
            ->where('commands.lang', '=', $lang)
            ->paginate(20);
            $retVal = ($lang == 'en') ? 'List of commands.' : 'Lista de comandos' ;
            return $this->sendResponse($result, $retVal);
            // if (count($result) > 0) {
            //     return $this->sendResponse($result, 'List of commands.');
            // } else {
            //     return $this->sendError('Error ', 'Error displaying commands!.');
            // }

        } catch (\Throwable $th) {
            //throw $th;
            $retVal = ($lang == 'en') ? 'Error displaying commands!.' : 'Error al mostrar comandos' ;
            return $this->sendError($retVal);
        }
    }

    public function showNameCommand($lang, $command) {
        try {
            // $result = Category::orWhere('name', 'like', '%' ,$name, '%')->get();
            $result = DB::table('commands')
            ->join('categorys', 'categorys.id', '=', 'commands.category_id')
            ->select('commands.command', 'commands.description', 'categorys.name as category')
            ->where('commands.command', 'like', $command.'%')
            ->where('commands.lang', '=', $lang)
            ->get();
            if(count($result) > 0){
                $retVal = ($lang == 'en') ? 'Show command.' : 'Mostrar comando' ;
                return $this->sendResponse($result, $retVal);
            }else {
                $retVal = ($lang == 'en') ? 'Error displaying command!.' : 'Error al mostrar comando' ;
                return $this->sendError($retVal);
            }
        } catch (\Throwable $th) {
            //throw $th;
            $retVal = ($lang == 'en') ? 'Error displaying command!.' : 'Error al mostrar comando' ;
            return $this->sendError($retVal);
        }
    }

    public function showCommandByCategoria($lang, $category) {
        try {

            $result = DB::table('commands')
            ->join('categorys', 'commands.category_id', '=', 'categorys.id')
            ->select('commands.id','commands.command', 'commands.description', 'categorys.name as category')
            ->where('categorys.name', 'like', $category.'%')
            ->where('commands.lang', '=', $lang)
            ->get();
            if(count($result) > 0){
                $retVal = ($lang == 'en') ? 'List of commands by categoria.' : 'Lista de comandos por categoria' ;
                return $this->sendResponse($result, $retVal);
            }else {
                $retVal = ($lang == 'en') ? 'Error displaying commands!.' : 'Error al mostrar comandos' ;
                return $this->sendError($retVal);
            }

        } catch (\Throwable $th) {
            $retVal = ($lang == 'en') ? 'Error displaying commands!.' : 'Error al mostrar comando' ;
            return $this->sendError($retVal);
        }
    }

    public function searchcommand($lang, $description) {

        try {

            $result = DB::table('commands')
            ->join('categorys', 'commands.category_id', '=', 'categorys.id')
            ->select('commands.command', 'commands.description', 'categorys.name as category')
            ->where('commands.description', 'like', '%'.$description.'%')
            ->where('categorys.lang', '=', $lang)
            ->get();

            return $this->sendResponse($result, 'List of commands references.');

        } catch (\Throwable $th) {
            return $this->sendError('Error ', 'Error displaying commands!.');
        }
    }

}

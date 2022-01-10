<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\General\GeneralController;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use App\Imports\CommandsImport;
use Illuminate\Http\Request;
use App\Models\Command;

class CommandController extends GeneralController
{
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'command'     => 'required|string|max:255',
                'description' => 'required|string|max:255',
                'category_id' => 'required|integer',
            ]);

            $result = Command::create([
                'command'     => $validatedData['command'],
                'description' => $validatedData['description'],
                'category_id' => $validatedData['category_id'],
            ]);

            return $this->sendResponse($result, 'Command add with success.');
        } catch (\Throwable $th) {
            //throw $th;
            return $this->sendError('Command add error', 'Error to add command');
        }

    }

    public function edit(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'id' => 'required|integer',
            ]);

            $result = Command::findOrFail([
                'id' => $validatedData['id']
            ]);
            return $this->sendResponse($result, 'Edit command');
        } catch (\Throwable $th) {
            //throw $th;
            return $this->sendError('Command edit error', 'Error to edit command');
        }

    }

    public function show(Request $request) {

        try {

            $validatedData = $request->validate([
                'id_user' => 'required|integer',
            ]);

            $validarUsuario = $this->validarUsuario($validatedData['id_user']);

            if($validarUsuario) {
                $result = DB::table('commands')
                ->join('categorys', 'categorys.id', '=', 'commands.category_id')
                ->select('commands.id', 'commands.command', 'commands.description', 'commands.created_at as fecha', 'categorys.name as category')
                ->get();
                return $this->sendResponse($result, 'Mostrar comandos');
            }else {
                return $this->sendError('Usuario no autorizado.', null);
            }

        } catch (\Throwable $th) {
            //throw $th;
            return $this->sendError('Valida parametros requeridos.', null);
        }

    }

    public function update(Request $request)
    {

        try {
            $form_data = array(
                'command'     => ($request->command) ? $request->command : '' ,
                'description' => ($request->description)  ? $request->description : '' ,
                'category_id' => ($request->category_id)  ? $request->category_id : '' ,
            );
            $result = Command::whereId($request->id)->update($form_data);

            return $this->sendResponse($result, 'Update command');
        } catch (\Throwable $th) {
            return $this->sendError('Command update error', 'Error to update command');
        }

    }

    public function destroy(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'id' => 'required|integer',
            ]);

            $result = Command::findOrFail($validatedData['id']);
            $result->delete();
            return $this->sendResponse($result, 'Destroy command');
        } catch (\Throwable $th) {
            //throw $th;
            return $this->sendError('Command destroy error', 'Error to destroy command');
        }

    }

    public function commandsImport(Request $request)
    {
        $result = Excel::import(new CommandsImport, request()->file('commands'));

        return $this->sendResponse($result, 'Import categorys');
    }

    public function cifrasTorales() {

        $categorias = DB::table('categorys')->count();
        $comandos   = DB::table('commands')->count();
        $elementosCargados = DB::table('commands')
            ->join('categorys', 'categorys.id', '=', 'commands.category_id')
            ->select('categorys.name')
            ->groupBy('categorys.id')
            ->get();

        $result['categoriasTotales'] = $categorias;
        $result['comandosTotales']   = $comandos;
        $result['elementosCargados']   = $elementosCargados;
        return $this->sendResponse($result, 'Cifras totales');
    }
}




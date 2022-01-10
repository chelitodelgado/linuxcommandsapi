<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\General\GeneralController;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use App\Exports\CategoryExport;
use App\Imports\CategorysImport;
use Illuminate\Http\Request;
use App\Models\Category;
use App\User;

class CategoryController extends GeneralController
{
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name'    => 'required|string|max:255',
            ]);

            $result = Category::create([
                'name'    => $validatedData['name']
            ]);
            return $this->sendResponse($result, 'Category add with success.');
        } catch (\Throwable $th) {
            //throw $th;
            return $this->sendError('Category add error', 'Error to add category');
        }
    }

    public function edit(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'id' => 'required|integer',
            ]);

            $result = Category::findOrFail([
                'id' => $validatedData['id']
            ]);
            return $this->sendResponse($result, 'Edit category');
        } catch (\Throwable $th) {
            //throw $th;
            return $this->sendError('Category edit error', 'Error to edit category');
        }
    }

    public function show(Request $request) {

        try {

            $validatedData = $request->validate([
                'id_user' => 'required|integer|max:11',
            ]);

            $validarUsuario = $this->validarUsuario($validatedData['id_user']);

            if($validarUsuario) {
                // $result = DB::table('categorys')->select('id', 'name', "date_format(created_at,'%Y-%m-%d) as fecha")->get();
                $result = DB::table('categorys')->select('id', 'name', "created_at as fecha")->get();
                return $this->sendResponse($result, 'Edit command');
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
            $validatedData = $request->validate([
                'name' => 'required|string|max:150',
                'id'   => 'required|integer',
            ]);

            $form_data = array(
                'name' => $validatedData['name'],
            );

            $result = Category::whereId($validatedData['id'])->update($form_data);
            return $this->sendResponse($result, 'Update category');
        } catch (\Throwable $th) {
            //throw $th;
            return $this->sendError('Category update error', 'Error to update category');
        }

    }

    public function destroy(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'id' => 'required|integer',
            ]);

            $result = Category::findOrFail($validatedData['id']);
            $result->delete();
            return $this->sendResponse($result, 'Update category');
        } catch (\Throwable $th) {
            //throw $th;
            return $this->sendError('Category update error', 'Error to update category');
        }
    }

    public function categoryImport(Request $request)
    {
        $result = Excel::import(new CategorysImport, request()->file('categorys'));

        return $this->sendResponse($result, 'Update category');
    }
}

@extends('layouts.app')
@section('title', 'Administrar categorias')
@section('sidebar')
    @parent
@endsection
@section('content')

<style>
    #export {
        margin-left: 5px;
        float: right;
    }
</style>

<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Administracion</a></li>
                    <li class="breadcrumb-item active">Categorias</li>
                </ol>
            </div>
            <h4 class="page-title">Categorias</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col col-xl-12">
        <div class="card">
            <div class="card-header">
                <h4>Administracion categorias</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <form method="POST" id="form_category" class="needs-validation" novalidate enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <label for="mes">Agregar categoria</label>
                                                    <input type="text" class="form-control" id="name" name="name"
                                                        placeholder="Categoria" required>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <label for="mes">Seleccionar lenguaje</label>
                                                    <select name="lang" id="lang" class="form-control" required>
                                                        <option>Seleccionar....</option>
                                                        <option value="es">Espanol</option>
                                                        <option value="en">Ingles</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-4">
                                                <div class="form-group">
                                                    <input type="hidden" id="id_category" name="id" value="">
                                                    <input type="submit" id="guardar" class="btn btn-block btn-primary" value="Guardar">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group">
                                    <form method="POST" id="import_category" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="form-group">
                                                    <label for="mes">Selecciona el archivo</label>
                                                    <input type="file" name="categorys" id="categorys" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-xl-4">
                                                <div class="form-group">
                                                    <input type="hidden" id="id_category" name="id" value="">
                                                    <input type="submit" id="importar" class="btn btn-block btn-success" value="Importar">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="form-group">
                                    <form method="POST" id="import_image_category" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <label for="ico">Importar imagenes a categorias</label>
                                                    <input type="text" name="image" id="image" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <label for="mes">Seleccionar categoria</label>
                                                    <select name="id_categorys" id="id_categorys" class="form-control">

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-12">
                                                <div class="form-group">
                                                    <input type="hidden" id="id_category" name="id" value="">
                                                    <input type="submit" id="agregar" class="btn btn-warning" value="Agregar">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="table-responsive">
                            <a href="{{ route('export-category') }}" id="export" class="btn btn-sm btn-success"> <i class="mdi mdi-file-download"></i> Descargar </a>
                            <table id="categoryTable" class="table dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Icono</th>
                                        <th>Categoria</th>
                                        <th>Lenguaje</th>
                                        <th>Fecha</th>
                                        <th>Accion</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/category.js') }}"></script>
@endsection

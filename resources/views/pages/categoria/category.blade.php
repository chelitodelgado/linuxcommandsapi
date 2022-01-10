@extends('layouts.app')
@section('title', 'Administrar categorias')
@section('sidebar')
    @parent
@endsection
@section('content')

<style>
    .scrolling{
        height: 500px;
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
                    <div class="col-xl-6">
                        <div class="form-group">
                            <form method="POST" id="form_category" class="needs-validation" novalidate enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="mes">Selecciona mes</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Categoria" required>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" id="id_category" name="id" value="">
                                    <input type="submit" id="guardar" class="btn btn-primary" value="Guardar">
                                </div>
                            </form>
                        </div>
                        <hr>
                        <div class="form-group">
                            <form method="POST" id="import_category" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="mes">Selecciona el archivo</label>
                                    <input type="file" name="categorys" id="categorys" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" id="id_category" name="id" value="">
                                    <input type="submit" id="importar" class="btn btn-success" value="Importar">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="table-responsive">
                            <a href="{{ route('export-category') }}" class="btn btn-sm btn-success"> <i class="mdi mdi-file-download"></i> Descargar </a>
                            <div class="scrolling">
                                <table id="category_table" class="table table-centered table-borderless mb-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Categoria</th>
                                            <th>Fecha de registro</th>
                                            <th>Accion</th>
                                        </tr>
                                    </thead>
                                    <tbody id="table_category"></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/category.js') }}"></script>
@endsection

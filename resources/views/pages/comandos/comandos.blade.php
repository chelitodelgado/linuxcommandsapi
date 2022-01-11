@extends('layouts.app')
@section('title', 'Administrar categorias')
@section('sidebar')
    @parent
@endsection
@section('content')

<style>
    .scrolling {
        height: 600px;
        overflow: scroll;
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
                <h4>Administracion Comandos</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-5">
                        <form id="form_command" method="POST" class="needs-validation" novalidate enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-xl-5">
                                    <div class="form-group">
                                        <label for="mes">Comando</label>
                                        <input type="text" name="command" id="command" class="form-control" placeholder="Escribe un comando" required>
                                    </div>
                                </div>
                                <div class="col-xl-7">
                                    <div class="form-group">
                                        <label for="mes">Categoria</label>
                                        <select name="category_id" id="category_id" class="form-control" required></select>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label for="mes">Descripcion</label>
                                        <textarea name="description" id="description" class="form-control" placeholder="Descripcion general" required></textarea>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <input type="submit" id="guardar" class="btn btn-info btn-lg" value="Guardar">
                                        <input type="hidden" name="comand_id" id="comand_id" value="">
                                    </div>
                                </div>
                            </div>
                        </form>
                        <hr>
                        <form id="import_commands">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label for="mes">Selecciona el archivo a subir</label>
                                        <input type="file" name="commands" id="commands" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <input type="submit" id="import" class="btn btn-success btn-lg" value="Importar">
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="card widget-inline">
                            <div class="card-body p-0">
                                <div class="row no-gutters">
                                    <div class="col-sm-6 col-xl-3">
                                        <div class="card shadow-none m-0 border-left">
                                            <div class="card-body text-center">
                                                <i class="dripicons-checklist text-muted" style="font-size: 24px;"></i>
                                                <h3><span id="total_categorias"></span></h3>
                                                <p class="text-muted font-15 mb-0">Total Categorias</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-xl-3">
                                        <div class="card shadow-none m-0 border-left">
                                            <div class="card-body text-center">
                                                <i class="dripicons-checklist text-muted" style="font-size: 24px;"></i>
                                                <h3><span id="total_comandos"></span></h3>
                                                <p class="text-muted font-15 mb-0">Total Comandos</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-xl-12">
                                        <div class="card">
                                                <div class="card-body">
                                                    <h4 class="header-title mt-1">Lista de categorias cargadas</h4>
                                                    <div class="table-responsive">
                                                        <table class="table table-sm table-centered mb-0 font-14">
                                                            <thead class="thead-light">
                                                                <tr>
                                                                    <th>Categoria</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="listCategorys"></tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7">
                        <div class="table-responsive">
                            <div class="scrolling">
                                <table class="table table-centered table-borderless mb-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Categoria</th>
                                            <th>Comando</th>
                                            <th>Descripcion</th>
                                            <th>Fecha de registro</th>
                                            <th>Accion</th>
                                        </tr>
                                    </thead>
                                    <tbody id="table_command"></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/commands.js') }}"></script>
@endsection
@extends('layouts.app')
@section('title', 'Administrar consultas GET')
@section('sidebar')
    @parent
@endsection
@section('content')

<style>
    pre {outline: 1px solid #ccc; padding: 5px; margin: 5px; }
    .string { color: green; }
   .number { color: darkorange; }
    .boolean { color: blue; }
    .null { color: magenta; }
    .key { color: red; }

</style>

<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Administracion</a></li>
                    <li class="breadcrumb-item active">Consultas</li>
                </ol>
            </div>
            <h4 class="page-title">Consultas</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col col-xl-12">
        <div class="card">
            <div class="card-header">
                <h4>Administracion de consultas GET</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="form-group">
                            <div class="accordion custom-accordion" id="custom-accordion-one">
                                <div class="card mb-0">
                                    <div class="card-header" id="headingFour">
                                        <h5 class="m-0">
                                            <a class="custom-accordion-title d-block py-1"
                                                data-toggle="collapse" href="#collapseFour"
                                                aria-expanded="true" aria-controls="collapseFour">
                                                <small>https://commandslinuxapi.herokuapp.com/api/{es | en}/categorys</small>
                                                <i class="mdi mdi-chevron-down accordion-arrow"></i>
                                            </a>
                                        </h5>
                                    </div>

                                    <div id="collapseFour" class="collapse show"
                                        aria-labelledby="headingFour"
                                        data-parent="#custom-accordion-one">
                                        <div class="card-body">
                                            Mostrar un listado de todas la categorias existentes.
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-0">
                                    <div class="card-header" id="headingFive">
                                        <h5 class="m-0">
                                            <a class="custom-accordion-title collapsed d-block py-1"
                                                data-toggle="collapse" href="#collapseFive"
                                                aria-expanded="false" aria-controls="collapseFive">
                                                <small>https://commandslinuxapi.herokuapp.com/api/{es | en}/categorys/{nombre de la categoria}</small>
                                                <i class="mdi mdi-chevron-down accordion-arrow"></i>
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapseFive" class="collapse"
                                        aria-labelledby="headingFive"
                                        data-parent="#custom-accordion-one">
                                        <div class="card-body">
                                            Filtrar por categoria a buscar
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-0">
                                    <div class="card-header" id="headingSix">
                                        <h5 class="m-0">
                                            <a class="custom-accordion-title collapsed d-block py-1"
                                                data-toggle="collapse" href="#collapseSix"
                                                aria-expanded="false" aria-controls="collapseSix">
                                                <small>https://commandslinuxapi.herokuapp.com/api/{es | en}/commands</small>
                                                <i class="mdi mdi-chevron-down accordion-arrow"></i>
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapseSix" class="collapse" aria-labelledby="headingSix"
                                        data-parent="#custom-accordion-one">
                                        <div class="card-body">
                                            Mostrar listado de comandos, (comando, descripcion y categoria).
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-0">
                                    <div class="card-header" id="headingSeven">
                                        <h5 class="m-0">
                                            <a class="custom-accordion-title collapsed d-block py-1"
                                                data-toggle="collapse" href="#collapseSeven"
                                                aria-expanded="false" aria-controls="collapseSeven">
                                                <small>https://commandslinuxapi.herokuapp.com/api/{es | en}/commandsByCategory</small>
                                                <i class="mdi mdi-chevron-down accordion-arrow"></i>
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapseSeven" class="collapse"
                                        aria-labelledby="headingSeven"
                                        data-parent="#custom-accordion-one">
                                        <div class="card-body">
                                            Buscar comandos seccionados por categorias
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <form method="GET" id="form_api" class="needs-validation" novalidate enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>API</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">https://commandslinuxapi.herokuapp.com/api/{es | en}</span>
                                        </div>
                                        <input type="text" class="form-control" name="api" id="api"
                                            placeholder="api"
                                            aria-describedby="basic-addon1">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="submit" id="consultar" class="btn btn-primary" value="Consultar">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <pre id="result"></pre>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/api.js') }}"></script>
@endsection

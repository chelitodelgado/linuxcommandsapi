@extends('layouts.app')
@section('title', 'Dashboard')
@section('sidebar')
    @parent
@endsection
@section('content')

<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                    <li class="breadcrumb-item active">Interacciones</li>
                </ol>
            </div>
            <h4 class="page-title">Dashboard</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col col-xl-12">
        <div class="card">
            <div class="card-header">
                <h4>Ingresos a la documentacion</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-6">
                        <form id="form-graficas">
                            <div class="form-group">
                                <label for="mes">Selecciona mes</label>
                                <select name="mes" id="mes" class="form-control" required>
                                    <option value="0">Todos</option>
                                    <option value="1">Enero</option>
                                    <option value="2">Febrero</option>
                                    <option value="3">Marzo</option>
                                    <option value="4">Abril</option>
                                    <option value="5">Mayo</option>
                                    <option value="6">Junio</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="col-xl-6">
                        <canvas id="interacciones" width="500" height="400"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/dashboard.js') }}" type="text/javascript"></script>
@endsection


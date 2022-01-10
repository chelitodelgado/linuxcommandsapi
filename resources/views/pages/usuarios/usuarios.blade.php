@extends('layouts.app')
@section('title', 'Administrar usuarios')
@section('sidebar')
    @parent
@endsection
@section('content')

<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Administracion</a></li>
                    <li class="breadcrumb-item active">Usuarios</li>
                </ol>
            </div>
            <h4 class="page-title">Usuarios</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col col-xl-12">
        <div class="card">
            <div class="card-header">
                <h4>Administracion de usuarios</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <!-- Profile -->
                        <div class="card bg-primary">
                            <div class="card-body profile-user-box">

                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="media">
                                            <span class="float-left m-2 mr-4"><img src="assets/images/users/avatar-2.jpg" style="height: 100px;" alt="" class="rounded-circle img-thumbnail"></span>
                                            <div class="media-body">

                                                <h4 class="mt-1 mb-1 text-white">Michael Franklin</h4>
                                                <p class="font-13 text-white-50"> Authorised Brand Seller</p>

                                            </div> <!-- end media-body-->
                                        </div>
                                    </div> <!-- end col-->

                                    <div class="col-sm-4">
                                        <div class="text-center mt-sm-0 mt-3 text-sm-right">
                                            <button type="button" class="btn btn-light">
                                                <i class="mdi mdi-account-edit mr-1"></i> Edit Profile
                                            </button>
                                        </div>
                                    </div> <!-- end col-->
                                </div> <!-- end row -->

                            </div> <!-- end card-body/ profile-user-box-->
                        </div><!--end profile/ card -->
                    </div>
                    <div class="col-xl-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-centered mb-0">
                                <thead>
                                    <tr>
                                        <th>Usuario</th>
                                        <th>Email</th>
                                        <th>Rol</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="table_usuarios">
                                    <tr>
                                        <td class="table-user">
                                            <img src="assets/images/users/avatar-6.jpg" alt="table-user" class="mr-2 rounded-circle" />
                                            Risa D. Pearson
                                        </td>
                                        <td>AC336 508 2157</td>
                                        <td>July 24, 1950</td>
                                        <td class="table-action text-center">
                                            <a href="javascript: void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/usuarios.js') }}"></script>
@endsection


























































































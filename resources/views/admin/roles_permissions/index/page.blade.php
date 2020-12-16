@extends('admin.base')

@section('extras_style')
    @parent
    <style>
        .badge-block{
            display: initial!important;
        }
    </style>
@endsection

@section('main-content')
    @include('flash')
    <div id="v-app" class="container-fluid mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="h4 mb-4">Gestion des rôles et permissions</div>
                <hr>
            </div>
            <div class="col-md-12">
                @include('admin.roles_permissions.index.roles')
            </div>
            <div class="col-md-12">
                @include('admin.roles_permissions.index.permissions')
            </div>
        </div>
        <div>
            @include('admin.roles_permissions.index.extras')
        </div>
    </div>
@endsection

@section('scripts')
    @parent
    @include('admin.roles_permissions.scripts.roles_script')
@endsection

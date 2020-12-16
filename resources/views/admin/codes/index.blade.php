@extends('admin.base')

@section('extras_style')

@endsection


@section('main-content')

@include('flash')

<div>
    <div id="v-table" class="mt-3 container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="h4 mb-4">Codes et comptes</div>
                <hr>
            </div>
            <div class="col-sm-12 mb-4">
                <div class="d-flex">
                    <div class="resac-linkedin-shadow bg-white p-2 pl-3 resac-w-200">
                        <div class="h6 text-muted font-weight-bold"><span class="" v-html="pubs_counter">{{ count($users) }}</span> Codes</div>
                    </div>
                </div>
                <div class="mt-3 bg-white p-2 pl-3 pt-3 pr-3 resac-linkedin-shadow">
                    <form action="" class="d-flex justify-content-between align-items-center ">
                        <div>
                            <div class="form-group">
                                <select type="text" class="form-control" name="type" id="type">
                                    <option value="">----</option>
                                    @foreach($basic_roles as $key => $value)
                                        @foreach($basic_roles[$key]['types'] as $key => $role_type)
                                            <option 
                                                value="{{ $role_type['name'] }}"
                                                @if($role_type['name'] == $type_selected)
                                                    selected
                                                @endif
                                            >
                                                {{ $role_type['label'] }}
                                            </option>
                                        @endforeach
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="mr-2">
                                <button type="submit" class="btn btn-primary">Afficher</button>
                            </div>
                            <div>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <button class="btn btn-primary" type="submit" id="button-addon1">Générer</button>
                                    </div>
                                    <input type="number" class="form-control" placeholder="Quantité" name="n">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-12">
                <table class="table bg-white table-hover table-responsive-sm resac-linkedin-shadow">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Code de connexion</th>
                        <th scope="col">Code de tombola</th>
                        <th scope="col">Date de création</th>
                    </tr>
                    </thead>
                    <tbody id="v-table-row">
                        @foreach($users as $key => $u)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $u->login_code }}</td>
                                <td>{{ $u->login_code }}</td>
                                <td>{{ $u->created_at }}</td>
                            </tr>  
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
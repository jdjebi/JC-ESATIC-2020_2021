@push('styles')
<link rel="stylesheet" href="{{ cdn_asset('asset/css/resac/admin/roles-permissions.css') }}">
<style>
    .role-badge{
        padding: 10px 15px;
        border-radius: 25px;
        font-weight: 700;
        font-size: 12px;
        color: #3277ae;
        background: #c7edff;
        margin-right: 5px;
        margin-bottom: 5px;
        display: inline-flex;
    }
    .role-badge:hover{
      cursor: pointer;
    }
    .permission-badge{
        background: #c7edff;
        padding: 5px 10px;
        border-radius: 25px;
        font-weight: 700;
        font-size: 10px;
        color: #3277ae;
        margin-right: 5px;
        margin-bottom: 5px;
        display: inline-flex;
    }
    .role-badge-light{
        background: #F5F5F5;
        color: #636364;
    }
    .role-badge-success{
        color: #1B5E20;
        background: #E8F5E9;
    }
</style>
@endpush

<div class="resac-account-module">
    <div class="module-card">
        <div class="module-header">
            <div class="d-flex justify-content-between">
                <div>Rôles</div>
            </div>
        </div>
        <div class="module-body">
            <form action="{{ route('backend.admin.roles.update') }}" method="POST">
                @csrf
                <input type="hidden" value="{{ $user->id }}" name="id">
                <div class="form-group">
                    <label for="staff_role">Rôle</label>
                    <select type="text" class="form-control" name="staff_role" id="staff_role">
                        <option>----</option>
                        @foreach($basic_roles as $key => $value)
                            <option 
                            value="{{ $basic_roles[$key]['role']['name'] }}"
                            @if($basic_roles[$key]['role']['label'] == $user->staff_role)
                                selected
                            @endif
                            >
                                {{ $basic_roles[$key]['role']['label'] }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="user_type">Type</label>
                    <select type="text" class="form-control" name="user_type" id="user_type">
                        <option>----</option>
                        @foreach($basic_roles as $key => $value)
                            @foreach($basic_roles[$key]['types'] as $key => $role_type)
                                <option 
                                    value="{{ $role_type['name'] }}"
                                    @if($role_type['name'] == $user->user_type)
                                        selected
                                    @endif
                                >
                                    {{ $role_type['label'] }}
                                </option>
                            @endforeach
                        @endforeach
                    </select>           
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
            </form>

        </div>
    </div>
</div>
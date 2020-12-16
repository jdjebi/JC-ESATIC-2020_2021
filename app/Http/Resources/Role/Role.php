<?php

namespace App\Http\Resources\Role;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Resac\Core\Security\RolesFactory;

class Role extends JsonResource
{ 
    public function toArray($request)
    {
        $label = RolesFactory::GetLabel($this->name);

        $role = $this;
        $permissions = $role->getAllPermissions();

        return  [
            "id" => $role->id,
            "name" => $role->name,
            "label" => ($label == "" ? $role->name : $label),
            "is_permission_system" => ($label == "" ? false : true),
            "permissions" => $permissions,
            "url" => route('admin.roles.show',$role->id),
        ];
    }
}

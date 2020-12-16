<?php

namespace App\Http\Resources\Role;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Resac\Core\Security\RolesFactory;


use App\Http\Resources\Role\Role as RoleJson;


class RoleCollection extends ResourceCollection
{ 
    public function toArray($request)
    {
        $roles_tmp = $this->collection;

        $roles = [];

        foreach ($roles_tmp as $role) {

            $roles[] = new RoleJson($role);
            
        }

        return $roles;

    }
}

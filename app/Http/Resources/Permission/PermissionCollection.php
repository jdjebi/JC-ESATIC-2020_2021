<?php

namespace App\Http\Resources\Permission;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PermissionCollection extends ResourceCollection
{ 
    public function toArray($request)
    {
        $permissions_tmp = $this->collection;

        $permissions = [];

        foreach ($permissions_tmp as $permission) {

            $permissions[] = [
                "id" => $permission->id,
                "name" => $permission->name
            ];
        }

        return $permissions;

    }
}

<?php

namespace App\RESAC\Core\Security;

class RolesFactory{
    const ROLES_DATABASE = [
        "superadmin" => [
            "name" => "superadmin",
            "label" => "Super Administrateur",
            "level" => 5,
        ],
        "admin" => [
            "name" => "admin",
            "label" => "Administrateur",
            "level" => 4,
        ],
        "developer" => [
            "name" => "developer",
            "label" => "Développeur",
            "level" => 3,
        ],
        "moderator" => [
            "name" => "moderator",
            "label" => "Modérateur",
            "level" => 2,
        ],
        "member" => [
            "name" => "member",
            "label" => "Membre",
            "level" => 1,
        ],

        // JC
        "accueil" => [
            "name" => "accueil",
            "label" => "Accueil",
            "level" => 2,
        ],
        "juge" => [
            "name" => "juge",
            "label" => "Juge",
            "level" => 1,
        ],
        "etudiant" => [
            "name" => "etudiant",
            "label" => "Etudiant",
            "level" => 1,
        ],
        "invite" => [
            "name" => "invite",
            "label" => "Invité",
            "level" => 1,
        ],
        "parrain" => [
            "name" => "parrain",
            "label" => "Parrain",
            "level" => 1,
        ],
    ];

    static function GetLabel($name){
        if(array_key_exists($name,RolesFactory::ROLES_DATABASE))
            return RolesFactory::ROLES_DATABASE[$name]["label"];
        else
            return "";
    }

    static function GetName($name){
        if(array_key_exists($name,RolesFactory::ROLES_DATABASE))
            return RolesFactory::ROLES_DATABASE[$name]["name"];
        else
            return "";
    }

    static function GetRole($name){
        return RolesFactory::ROLES_DATABASE[$name];
    }

    static function is_admin_roles_in($roles_name){
        foreach ($roles_name as $role_name) {
            $role = RolesFactory::GetRole($role_name);
        }
    }

    static function GetBasicRoles(){
        return [
            "admin" => [
                "role" => RolesFactory::ROLES_DATABASE["admin"],
                "types" => [
                    RolesFactory::ROLES_DATABASE["accueil"],
                    RolesFactory::ROLES_DATABASE["admin"],
                ]
            ],
            "member" => [
                "role" => RolesFactory::ROLES_DATABASE["member"],
                "types" => [
                    RolesFactory::ROLES_DATABASE["etudiant"],
                    RolesFactory::ROLES_DATABASE["invite"],
                    RolesFactory::ROLES_DATABASE["juge"],
                    RolesFactory::ROLES_DATABASE["parrain"]
                ]
            ],
        ];
    }

    static function GetBasicRolesName(){
        return [
            RolesFactory::ROLES_DATABASE["admin"]["name"],
            RolesFactory::ROLES_DATABASE["member"]["name"]
        ];
    }

    static function GetBasicRolesType(){
        return [
            RolesFactory::ROLES_DATABASE["etudiant"]["name"],
            RolesFactory::ROLES_DATABASE["invite"]["name"],
            RolesFactory::ROLES_DATABASE["juge"]["name"],
            RolesFactory::ROLES_DATABASE["accueil"]["name"],
            RolesFactory::ROLES_DATABASE["parrain"]["name"],
            RolesFactory::ROLES_DATABASE["admin"]["name"]

        ];
    }

    static function GetRoleByType($t){
        $roles = RolesFactory::GetBasicRoles();
        foreach ($roles as $i => $role) {
            $types = $role["types"];
            foreach ($types as $j => $type) {
                if($type['name'] == $t)
                    return $role['role']['name'];
            }
        }
    }
}


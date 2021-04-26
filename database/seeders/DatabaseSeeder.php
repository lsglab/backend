<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Subject;
use App\Models\Attribute;

//Seeder to create default subjects

class DatabaseSeeder extends Seeder{

    public function run(){
        $users = Subject::create([
            'displayName' => 'Benutzer',
            'type' => 'auth',
            'authenticatable' => true,
            'editable' => false,
            'model' => 'User',
        ]);

        $permissions = Subject::create([
            'displayName' => 'Permissions',
            'type' => 'auth',
            'model' => 'Permission',
            'editable' => false
        ]);

        $roles = Subject::create([
            'displayName' => 'Rollen',
            'model' => 'Role',
            'editable' => false,
            'type' => 'auth',
        ]);

        $content = Subject::create([
            'displayName' => 'Content Manager',
            'type' => 'subject',
            'editable' => false,
            'model' => 'Subject',
        ]);

        //Attributes for user

        Attribute::create([
            'name' => 'name',
            'type' => 'string',
            'subject_id' => $users->id
        ]);

        Attribute::create([
            'name' => 'email',
            'type' => 'email',
            'unique' => true,
            'subject_id' => $users->id
        ]);

        Attribute::create([
            'name' => 'password',
            'type' => 'password',
            'subject_id' => $users->id
        ]);

        Attribute::create([
            'name' => 'role_id',
            'type' => 'relation',
            'relation' => $roles->id,
            'relation_type' => 'belongsTo',
            'subject_id' => $users->id
        ]);

        Attribute::create([
            'name' => 'rememberToken',
            'type' => 'rememberToken',
            'subject_id' => $users->id,
            'required' => false,
        ]);

        //Attributes of role

        Attribute::create([
            'name' => 'name',
            'type' => 'string',
            'subject_id' => $roles->id
        ]);

        Attribute::create([
            'name' => 'description',
            'required' => false,
            'type' => 'string',
            'subject_id' => $roles->id
        ]);

        Attribute::create([
            'name' => 'admin',
            'default' => "false",
            'type' => 'boolean',
            'subject_id' => $roles->id
        ]);

        Attribute::create([
            'name' => 'permissions',
            'type' => 'relation',
            'relation' => $permissions->id,
            'relation_type' => 'hasMany',
            'subject_id' => $roles->id
        ]);

        Attribute::create([
            'name' => 'role_id',
            'type' => 'relation',
            'relation' => $users->id,
            'relation_type' => 'hasMany',
            'subject_id' => $roles->id
        ]);

        //Attributes of permission

        Attribute::create([
            'name' => 'action',
            'type' => 'enum',
            'enum' => 'read,read-self,edit,edit-self,delete,delete-self,create',
            'identifier' => true,
            'subject_id' => $permissions->id
        ]);

        Attribute::create([
            'name' => 'role_id',
            'type' => 'relation',
            'relation' => $roles->id,
            'relation_type' => 'belongsTo',
            'identifier' => true,
            'subject_id' => $permissions->id
        ]);

        Attribute::create([
            'name' => 'subject_id',
            'type' => 'relation',
            'identifier' => true,
            'relation' => $content->id,
            'relation_type' => 'belongsTo',
            'subject_id' => $permissions->id
        ]);
    }
}


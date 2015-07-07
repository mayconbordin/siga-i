<?php

use Illuminate\Database\Seeder;
use App\Utils\CsvReader;
use App\Models\Permission;
use App\Models\Role;

class RolePermissionTablesSeeder extends Seeder {
    public function run()
    {
        DB::table('role_user')->truncate();
        DB::table('permission_role')->truncate();
        DB::table('usuarios')->truncate();
        DB::table('roles')->truncate();
        DB::table('permissions')->truncate();

        $csv = new CsvReader(base_path() . "/fixtures/roles.csv", true, ',');

        while (($row = $csv->nextRow()) !== NULL) {
            $owner = new Role();
            $owner->name         = $row['name'];
            $owner->display_name = array_get($row, 'display_name', null);
            $owner->description  = array_get($row, 'description', null);
            $owner->save();
        }


        $csv = new CsvReader(base_path() . "/fixtures/permissions.csv", true, ',');

        $role = [];

        while (($row = $csv->nextRow()) !== NULL) {
            $name  = $row['name'];
            $roles = explode(',', $row['roles']);

            $p = new Permission();
            $p->name = $name;
            $p->save();

            foreach ($roles as $name) {
                try{
                    $role[$name] = array_get($role, $name, Role::where('name', $name)->first());
                    $role[$name]->attachPermission($p);
                }catch(\Exception $e) {
                    echo $name."\n";
                    exit;
                }
            }
        }
    }
}
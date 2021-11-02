<?php

use Illuminate\Database\Seeder;
use  Illuminate\Support\Facades\DB;

class CreateAdmin_Roles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin_roles')->insert([
            ['id_admin_roles'=>,'admin_admin_id'=>,'roles_id_roles']
        ]);
    }
}

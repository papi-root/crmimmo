<?php

use Illuminate\Database\Seeder;
use App\Tiers; 
use App\Bien; 
use App\Acquisition; 

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        /*
            $this->call([
                PermissionsTableSeeder::class,
                RolesTableSeeder::class,
                PermissionRoleTableSeeder::class,
                UsersTableSeeder::class,
                RoleUserTableSeeder::class,
            ]);
        */
        //Bien::factory(10)->for(Tier::factory())->create(); 
        Tiers::factory(1)->create(); 
        //Acquisition::factory(10)->for(Bien::factory())->for(Tiers::factory())->create(2); 
    }
}

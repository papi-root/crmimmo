<?php

use Illuminate\Database\Seeder;
use App\Tier; 
use App\Bien; 
use App\Acquisition; 
use App\Espace; 

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

        Bien::factory(80)->create(); 
        Tier::factory(100)->create(); 
        Acquisition::factory(65)->create(); 
        Espace::factory(102)->create();
        
        //Acquisition::factory(10)->for(Bien::factory())->for(Tiers::factory())->create(2); 
    }
}

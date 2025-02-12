<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 4; $i++) {
            DB::table('posts')->insert([
                'text' => Str::random(100),
            ]);
        }

        $data = new Role();
        $data->name = 'Admin';
        $data->slug = config('products.role');
        $data->save();

        $data = new Permission();
        $data->name = 'Create Products';
        $data->slug = 'create-products';
        $data->save();

        $developer = Role::where('slug',config('products.role'))->first();
        $createProds = Permission::where('slug','create-products')->first();

        $user1 = new User();
        $user1->name = 'test';
        $user1->email = 'testadmin@test.com';
        $user1->password = bcrypt('secret');
        $user1->save();
        $user1->roles()->attach($developer);
        // $user1->permissions()->attach($createProds);
    }
}

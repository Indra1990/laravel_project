<?php
use App\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('users')->insert([
            [
            'name' => 'Marketing',
            'email' => 'admin@merchandise.com',
            'sales' => 'Marketing',
            'role' => '2',
        	'password' => bcrypt('admin123'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'name' => 'Mananger',
            'email' => 'mananger@merchandise.com',
            'sales' => 'Mananger',
            'role' => '2',
            'password' => bcrypt('mananger123'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
            'name' => 'indra',
            'email' => 'indra@gmail.com',
            'sales' => 'B2B',
            'role' => '1',
            'password' => bcrypt('123456'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
            'name' => 'luki',
            'email' => 'luki@gmail.com',
            'sales' => 'B2C',
            'role' => '1',
            'password' => bcrypt('123456'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
            'name' => 'john',
            'email' => 'john@gmail.com',
            'sales' => 'B2B',
            'role' => '1',
            'password' => bcrypt('123456'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ],

            [
            'name' => 'boy',
            'email' => 'boy@gmail.com',
            'sales' => 'B2C',
            'role' => '1',
            'password' => bcrypt('123456'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            ]


        ]);
    }
}

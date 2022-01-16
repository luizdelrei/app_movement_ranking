<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user')->insert(
            [
                'id' => 1,
                'name' => 'Joao'
            ]
        );
        DB::table('user')->insert(
            [
                'id' => 2,
                'name' => 'Jose'
            ]
        );
        DB::table('user')->insert(
            [
                'id' => 3,
                'name' => 'Paulo'
            ]
        );
    }
}

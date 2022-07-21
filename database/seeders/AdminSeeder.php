<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert(
            [
                [
                    'name'      => 'Admin 1',
                    'email'     => 'admin1@gmail.com',
                    'password'  => Hash::make('passwordAdmin1'),
                ],
                [
                    'name'      => 'Admin 2',
                    'email'     => 'admin2@gmail.com',
                    'password'  => Hash::make('passwordAdmin2'),
                ],
                [
                    'name'      => 'Admin 3',
                    'email'     => 'admin3@gmail.com',
                    'password'  => Hash::make('passwordAdmin3'),
                ],
                [
                    'name'      => 'Admin4',
                    'email'     => 'admin4@gmail.com',
                    'password'  => Hash::make('passwordAdmin4'),
                ],
            ]

        );
    }
}

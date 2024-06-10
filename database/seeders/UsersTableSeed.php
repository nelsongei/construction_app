<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $user_types = [
            [
                'name'=>'Admin',
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'name'=>'Vendor',
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'name'=>'User',
                'created_at'=>now(),
                'updated_at'=>now()
            ]
        ];
        UserType::insert($user_types);
        $users = [
            [
                'first_name'=>'Nelson',
                'last_name'=>'Sammy',
                'email'=>'nelson@cms.com',
                'phone'=>'254719405904',
                'password'=>Hash::make('secret'),
                'user_type_id'=>1,
                'created_at'=>now(),
                'updated_at'=>now()
            ]
        ];
        User::insert($users);
    }
}

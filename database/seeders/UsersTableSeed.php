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
                'id_no'=>'32367696',
                'phone'=>'254719405904',
                'password'=>Hash::make('secret'),
                'user_type_id'=>1,
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'first_name'=>'Jane',
                'last_name'=>'Doe',
                'email'=>'jane@cms.com',
                'id_no'=>'31367696',
                'phone'=>'254712345678',
                'password'=>Hash::make('secret'),
                'user_type_id'=>2,
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'first_name'=>'John',
                'last_name'=>'Doe',
                'email'=>'john@cms.com',
                'id_no'=>'12345678',
                'phone'=>'2547123456781',
                'password'=>Hash::make('secret'),
                'user_type_id'=>3,
                'created_at'=>now(),
                'updated_at'=>now()
            ],
        ];
        User::insert($users);
    }
}

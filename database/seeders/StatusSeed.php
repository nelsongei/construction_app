<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $statuses = [
            [
                'name'=>'Booked',
                'color'=>'#686663',
                'notify_customer'=>false,
            ],
            [
                'name'=>'Pending',
                'color'=>'#f0ad4e',
                'notify_customer'=>false,
            ],
            [
                'name'=>'Delivery',
                'color'=>'#00a65a',
                'notify_customer'=>false,
            ],
            [
                'name'=>'Confirmed',
                'color'=>'#00a65a',
                'notify_customer'=>false,
            ],
            [
                'name'=>'Canceled',
                'color'=>'#dd4b39',
                'notify_customer'=>false,
            ],
        ];
        Status::insert($statuses);
    }
}

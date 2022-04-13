<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\plan;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plans = [
            ['id'=>1,'name'=>'Basic','plan_id'=>27009,'price'=>5],
            ['id'=>2,'name'=>'Advance','plan_id'=>27010,'price'=>10],
            ['id'=>3,'name'=>'Bussiness','plan_id'=>27011,'price'=>15],
        ];
        foreach ($plans as $item) {
            Plan::create($item);
        }
    }
}

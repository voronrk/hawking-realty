<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Condition;

class ConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['value' => 'Евроремонт'],
            ['value' => 'Отличное'],
            ['value' => 'Хорошее'],
            ['value' => 'Среднее'],
            ['value' => 'Стройвариант'],
            ['value' => 'Требует косм. ремонта'],
            ['value' => 'Требует кап. ремонта'],
        ];
        foreach($data as $item) {
            Condition::create(['value' => $item['value']]);
        };
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['value' => 'Новостройка'],
            ['value' => 'Вторичка'],
        ];
        foreach($data as $item) {
            Type::create(['value' => $item['value']]);
        };
    }
}

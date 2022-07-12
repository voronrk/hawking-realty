<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Wallmaterial;

class WallmaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['value' => 'Кирпич'],
            ['value' => 'Панель'],
            ['value' => 'Блок'],
            ['value' => 'Монолит'],
            ['value' => 'Дерево'],
            ['value' => 'Каркасно-монолитный'],
            ['value' => 'Кирпич, монолит'],
            ['value' => 'Кирпич, каркасно-монолитный'],
            ['value' => 'Каркасно-монолитный, дерево'],
            ['value' => 'Панель, блок'],
        ];
        foreach($data as $item) {
            Wallmaterial::create(['value' => $item['value']]);
        };
    }
}

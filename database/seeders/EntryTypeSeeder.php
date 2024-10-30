<?php

namespace Database\Seeders;

use App\Models\EntryType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EntryTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $entryTypes = [
            ['name' => 'PIX', 'description' => 'Entradas no caixa feitas por PIX'],
            ['name' => 'Dinheiro', 'description' => 'Entradas no caixa feitas por Dinheiro'],
            ['name' => 'Cartão', 'description' => 'Entradas no caixa feitas por Cartão'],
        ];

        foreach ($entryTypes as $entryType) {
            $entryTypeAlreadyExists = EntryType::where('name', $entryType['name']);
            if (!$entryTypeAlreadyExists->exists()) {
                EntryType::create($entryType);
            }
        }
    }
}

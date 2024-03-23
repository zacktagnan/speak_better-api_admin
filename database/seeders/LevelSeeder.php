<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    protected $levelsDefault;

    public function __construct()
    {
        $this->levelsDefault = [
            [
                'name' => 'A1',
            ],
            [
                'name' => 'A2',
            ],
            [
                'name' => 'B1',
            ],
            [
                'name' => 'B2',
            ],
            [
                'name' => 'C1',
            ],
            [
                'name' => 'C2',
            ],
        ];
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->levelsDefault as $row) {
            \App\Models\Level::create([
                'name' => $row['name'],
            ]);
        }
    }
}

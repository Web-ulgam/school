<?php

use App\Subject;
use App\Teacher;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
            [
                'name' => 'Matematika',
                'slug' => 'matematika',
                'description' => 'Matematika',
            ],
            [
                'name' => 'Iňlis dili',
                'slug' => Str::slug('Iňlis dili'),
                'description' => 'Iňlis dili',
            ],
            [
                'name' => 'Rus dili',
                'slug' => Str::slug('Rus dili'),
                'description' => 'Rus dili',
            ],
            [
                'name' => 'Edebiýat',
                'slug' => Str::slug('Edebiýat'),
                'description' => 'Edebiýat',
            ],
            [
                'name' => 'Türkmen dili',
                'slug' => Str::slug('Türkmen dili'),
                'description' => 'Türkmen dili',
            ],
            [
                'name' => 'Fizika',
                'slug' => Str::slug('Fizika'),
                'description' => 'Fizika',
            ],
            [
                'name' => 'Geagrafiýa',
                'slug' => Str::slug('Geagrafiýa'),
                'description' => 'Geagrafiýa',
            ],
            [
                'name' => 'Zähmet',
                'slug' => Str::slug('Zähmet'),
                'description' => 'Zähmet',
            ],
            [
                'name' => 'Taryh',
                'slug' => Str::slug('Taryh'),
                'description' => 'Taryh',
            ],
        ];

        foreach ($datas as $data) {
            Subject::create($data);
        }
    }
}

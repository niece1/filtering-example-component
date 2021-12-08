<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Subject;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subjects = [
            [
                'name' => 'Programming',
                'slug' => 'programming',
                'created_at' => '2021-02-24 22:34:18',
                'updated_at' => '2021-02-24 22:34:18',
            ],
            [
                'name' => 'Ezoterics',
                'slug' => 'ezoterics',
                'created_at' => '2021-02-24 22:34:18',
                'updated_at' => '2021-02-24 22:34:18',
            ],
            [
                'name' => 'Economics',
                'slug' => 'economics',
                'created_at' => '2021-02-24 22:34:18',
                'updated_at' => '2021-02-24 22:34:18',
            ],
        ];
        Subject::insert($subjects);
    }
}

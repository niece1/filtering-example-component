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
                'name' => 'My life',
                'slug' => 'my-life',
                'created_at' => '2021-02-24 22:34:18',
                'updated_at' => '2021-02-24 22:34:18',
            ],
            [
                'name' => 'My wife',
                'slug' => 'my-wife',
                'created_at' => '2021-02-24 22:34:18',
                'updated_at' => '2021-02-24 22:34:18',
            ],
            [
                'name' => 'Envisage',
                'slug' => 'envisage',
                'created_at' => '2021-02-24 22:34:18',
                'updated_at' => '2021-02-24 22:34:18',
            ],
        ];
        Subject::insert($subjects);
    }
}

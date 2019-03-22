<?php

use Illuminate\Database\Seeder;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $grades = [
            'A' => [
                'start' => 70,
                'end' => 100,
            ],
            'B' => [
                'start' => 60,
                'end' => 69,
            ],
            'C' => [
                'start' => 50,
                'end' => 59,
            ],
            'D' => [
                'start' => 40,
                'end' => 49,
            ],
            'F' => [
                'start' => 0,
                'end' => 39,
            ]
        ];

        \DB::table('grades')->delete();

        \DB::table('grades')->insert(array (
            0 =>
                array (
                    'id' => 1,
                    'grade_name' => 'Support',
                    'grades' => json_encode($grades),
                    'created_at' => '2019-03-04 13:42:19',
                    'updated_at' => '2019-03-04 13:42:19',
                )
        ));
    }
}

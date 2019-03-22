<?php

use Illuminate\Database\Seeder;

class CombinedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('combined_subjects')->delete();

        \DB::table('combined_subjects')->insert(array (
            0 =>
                array (
                    'id' => 1,
                    'combined_name' => 'Support',
                    'created_at' => '2019-03-04 13:42:19',
                    'updated_at' => '2019-03-04 13:42:19',
                ),
            1 =>
                array (
                    'id' => 2,
                    'combined_name' => 'General Science',
                    'created_at' => '2019-03-04 13:42:19',
                    'updated_at' => '2019-03-04 13:42:19',
                ),
        ));
    }
}

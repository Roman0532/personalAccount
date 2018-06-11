<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TeacherTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teachers')->insert([
            'full_name' => 'Глинчиков К.Е',
            'name' => 'admin',
            'password' => Hash::make('admin'),
            'isAdmin' => 1,
        ]);

        DB::table('courses')->insert(['title' => '1']);
        DB::table('courses')->insert(['title' => '2']);
        DB::table('courses')->insert(['title' => '3']);
        DB::table('courses')->insert(['title' => '4']);
    }
}

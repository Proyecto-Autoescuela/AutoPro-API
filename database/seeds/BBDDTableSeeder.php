<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class BBDDTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'ADMIN',
            'email' => 'superadmin@cev.com',
            'password' => Hash::make('admin123'),
            'api_token' => 'c2356069e9d1e79ca924378153cfbbfb4d4416b1f99d41a2940bfdb66c5319db',
        ]);

        DB::table('teachers')->insert([
            'id' => '1',
            'name' => 'TEACHER',
            'email' => 'teacher@cev.com',
            'password' => Hash::make('teacher123'),
        ]);
        
        DB::table('students')->insert([
            'name' => 'STUDENT',
            'email' => 'student@cev.com',
            'password' => Hash::make('student123'),
            'teacher_id' => '1',
            'license' => 'B',
        ]);
    }
}

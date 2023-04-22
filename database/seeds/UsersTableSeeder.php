<?php

use App\Grade;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name'          => 'Admin',
            'email'         => 'admin@admin.com',
            'password'      => bcrypt('12345678'),
            'created_at'    => date("Y-m-d H:i:s")
        ]);
        $user->assignRole('Admin');

        $user2 = User::create([
            'name'          => 'Mugallym',
            'email'         => 'mugallym@admin.com',
            'password'      => bcrypt('12345678'),
            'created_at'    => date("Y-m-d H:i:s")
        ]);
        $user2->assignRole('mugallym');

        $user3 = User::create([
            'name'          => 'Ene-ata',
            'email'         => 'ene-ata@admin.com',
            'password'      => bcrypt('12345678'),
            'created_at'    => date("Y-m-d H:i:s")
        ]);
        $user3->assignRole('ene_ata');

        $user4 = User::create([
            'name'          => 'Okuwcy',
            'email'         => 'okuwcy@admin.com',
            'password'      => bcrypt('12345678'),
            'created_at'    => date("Y-m-d H:i:s")
        ]);
        $user4->assignRole('okuwcy');


        DB::table('teachers')->insert([
            [
                'user_id'           => $user2->id,
                'gender'            => 'male',
                'phone'             => '+993 65 800000',
                'dateofbirth'       => '1993-04-11',
                'current_address'   => 'Aşgabat şäheri, jaý 80 öý 10',
                'permanent_address' => 'Aşgabat şäheri, jaý 80 öý 10',
                'created_at'        => date("Y-m-d H:i:s")
            ]
        ]);

        DB::table('parents')->insert([
            [
                'user_id'           => $user3->id,
                'gender'            => 'male',
                'phone'             => '+993 65 800000',
                'current_address'   => 'Aşgabat şäheri, jaý 80 öý 10',
                'permanent_address' => 'Aşgabat şäheri, jaý 80 öý 10',
                'created_at'        => date("Y-m-d H:i:s")
            ]
        ]);

        $this->gradesTable();

        DB::table('students')->insert([
            [
                'user_id'           => $user4->id,
                'parent_id'         => 1,
                'class_id'          => 1,
                'roll_number'       => 1,
                'gender'            => 'male',
                'phone'             => '+993 65 800000',
                'dateofbirth'       => '2010-04-11',
                'current_address'   => 'Aşgabat şäheri, jaý 59 öý 12',
                'permanent_address' => 'Aşgabat şäheri, jaý 59 öý 12',
                'created_at'        => date("Y-m-d H:i:s")
            ]
        ]);
    }

    public function gradesTable() 
    {
        $grades = [
            [
            'teacher_id'        => 1,
            'class_numeric'     => 1,
            'class_name'        => '1-A',
            'class_description' => '1 klas'
            ], [
                'teacher_id'        => 1,
                'class_numeric'     => 1,
                'class_name'        => '1-B',
                'class_description' => '1 klas'
            ], [
                'teacher_id'        => 1,
                'class_numeric'     => 1,
                'class_name'        => '1-C',
                'class_description' => '1 klas'
            ], [
                'teacher_id'        => 1,
                'class_numeric'     => 1,
                'class_name'        => '2-A',
                'class_description' => '1 klas'
            ], [
                'teacher_id'        => 1,
                'class_numeric'     => 1,
                'class_name'        => '2-B',
                'class_description' => '1 klas'
            ], [
                'teacher_id'        => 1,
                'class_numeric'     => 1,
                'class_name'        => '2-C',
                'class_description' => '1 klas'
            ], [
                'teacher_id'        => 1,
                'class_numeric'     => 1,
                'class_name'        => '3-A',
                'class_description' => '1 klas'
            ], [
                'teacher_id'        => 1,
                'class_numeric'     => 1,
                'class_name'        => '3-B',
                'class_description' => '1 klas'
            ], [
                'teacher_id'        => 1,
                'class_numeric'     => 1,
                'class_name'        => '3-C',
                'class_description' => '1 klas'
            ], [
                'teacher_id'        => 1,
                'class_numeric'     => 1,
                'class_name'        => '4-A',
                'class_description' => '1 klas'
            ], [
                'teacher_id'        => 1,
                'class_numeric'     => 1,
                'class_name'        => '4-B',
                'class_description' => '1 klas'
            ], [
                'teacher_id'        => 1,
                'class_numeric'     => 1,
                'class_name'        => '4-C',
                'class_description' => '1 klas'
            ], [
                'teacher_id'        => 1,
                'class_numeric'     => 1,
                'class_name'        => '5-A',
                'class_description' => '1 klas'
            ], [
                'teacher_id'        => 1,
                'class_numeric'     => 1,
                'class_name'        => '5-B',
                'class_description' => '1 klas'
            ], [
                'teacher_id'        => 1,
                'class_numeric'     => 1,
                'class_name'        => '5-C',
                'class_description' => '1 klas'
            ], [
                'teacher_id'        => 1,
                'class_numeric'     => 1,
                'class_name'        => '6-A',
                'class_description' => '1 klas'
            ], [
                'teacher_id'        => 1,
                'class_numeric'     => 1,
                'class_name'        => '6-B',
                'class_description' => '1 klas'
            ], [
                'teacher_id'        => 1,
                'class_numeric'     => 1,
                'class_name'        => '6-C',
                'class_description' => '1 klas'
            ], [
                'teacher_id'        => 1,
                'class_numeric'     => 1,
                'class_name'        => '7-A',
                'class_description' => '1 klas'
            ], [
                'teacher_id'        => 1,
                'class_numeric'     => 1,
                'class_name'        => '7-B',
                'class_description' => '1 klas'
            ], [
                'teacher_id'        => 1,
                'class_numeric'     => 1,
                'class_name'        => '7-C',
                'class_description' => '1 klas'
            ], [
                'teacher_id'        => 1,
                'class_numeric'     => 1,
                'class_name'        => '8-A',
                'class_description' => '1 klas'
            ], [
                'teacher_id'        => 1,
                'class_numeric'     => 1,
                'class_name'        => '8-B',
                'class_description' => '1 klas'
            ], [
                'teacher_id'        => 1,
                'class_numeric'     => 1,
                'class_name'        => '8-C',
                'class_description' => '1 klas'
            ], [
                'teacher_id'        => 1,
                'class_numeric'     => 1,
                'class_name'        => '9-A',
                'class_description' => '1 klas'
            ], [
                'teacher_id'        => 1,
                'class_numeric'     => 1,
                'class_name'        => '9-B',
                'class_description' => '1 klas'
            ], [
                'teacher_id'        => 1,
                'class_numeric'     => 1,
                'class_name'        => '9-C',
                'class_description' => '1 klas'
            ], [
                'teacher_id'        => 1,
                'class_numeric'     => 1,
                'class_name'        => '10-A',
                'class_description' => '1 klas'
            ], [
                'teacher_id'        => 1,
                'class_numeric'     => 1,
                'class_name'        => '10-B',
                'class_description' => '1 klas'
            ], [
                'teacher_id'        => 1,
                'class_numeric'     => 1,
                'class_name'        => '10-C',
                'class_description' => '1 klas'
            ], [
                'teacher_id'        => 1,
                'class_numeric'     => 1,
                'class_name'        => '11-A',
                'class_description' => '1 klas'
            ], [
                'teacher_id'        => 1,
                'class_numeric'     => 1,
                'class_name'        => '11-B',
                'class_description' => '1 klas'
            ], [
                'teacher_id'        => 1,
                'class_numeric'     => 1,
                'class_name'        => '11-C',
                'class_description' => '1 klas'
            ]
        ];
        
        foreach ($grades as $grade) {
            Grade::create($grade);
        }
    }
}

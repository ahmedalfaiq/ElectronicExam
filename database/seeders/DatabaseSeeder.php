<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Departments;
use App\Models\Exams;
use App\Models\Level;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create(['id'=>1,'name'=>'ahmed','email'=>'ahmed@gmail.com','password'=>'11111111','role'=>'admin']);
        User::create(['id'=>2,'name'=>'ali','email'=>'ali@gmail.com','password'=>'11111111','role'=>'student']);
        Departments::create(['id' =>1,'name' =>'IT',]);
        Departments::create(['id' =>2,'name' =>'Computer',]);
        Level::create(['id' =>  1,'name' =>'Level1',]);
        Level::create(['id' =>  2,'name' =>'Level2',]);

            // $table->string('title');
            // $table->foreignId('dept_id')->constrained('departments')->cascadeOnDelete();
            // $table->foreignId('level_id')->constrained('levels')->cascadeOnDelete();
            // $table->foreignId('instructor_id')->constrained('users');
            // $table->string('subject');
            // $table->text('description');
            // $table->string('duration');
            // $table->string('image');
            // $table->date('start_datetime');
            // $table->date('end_datetime');
        Exams::create(['id' =>  1,'title' =>'Final','dept_id' =>1,
        'level_id' =>1,
        'instructor_id' =>1,
        'subject' =>'C++',
        'description' =>'Final Cpp',
        'duration' =>'1:30',
        'image' =>'1701874297.jpeg',
        'start_datetime' =>'2023-12-06',
        'end_datetime' =>'2023-12-09',

    ]);

    }
}

<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Room;
use App\Models\Tamu;
use App\Models\Time;
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

        Tamu::create([
            'name' => 'bayu1',
            'email' => 'bayu@gmail.com',
            'nohp' => '089764567746',
            'gender' => 'L'
        ]);

        Room::create([
            'Pintu' => 5,
            'RuangTamuDepan' => 5,
            'RuangMakan' => 5,
            'HalamanDepan' => 5,
            'Lantai2' => 5,
            'Balkon' => 5,
            'Kamar' => 5,
            'Toilet' => 5
        ]);

        Room::create([
            'Pintu' => 5,
            'RuangTamuDepan' => 5,
            'RuangMakan' => 5,
            'HalamanDepan' => 5,
            'Lantai2' => 5,
            'Balkon' => 5,
            'Kamar' => 5,
            'Toilet' => 5
        ]);
        // Time::create([
        //     'Pintu'=> 3600,
        //     'RuangTamuDepan'=> 3600,
        //     'RuangMakan'=> 3600,
        //     'HalamanDepan'=> 3600,
        //     'Lantai2'=> 3600,
        //     'Balkon'=> 3600,
        //     'Kamar'=> 3600,
        //     'Toilet'=> 3600
        // ]);
        Tamu::create([
            'name' => 'danny1',
            'email' => 'danny@gmail.com',
            'nohp' => '089764567746',
            'gender' => 'L'
        ]);
        Tamu::create([
            'name' => 'fito1',
            'email' => 'fito@gmail.com',
            'nohp' => '089764567746',
            'gender' => 'L'
        ]);
        Tamu::create([
            'name' => 'murran1',
            'email' => 'murran@gmail.com',
            'nohp' => '089764567746',
            'gender' => 'L'
        ]);
        Tamu::create([
            'name' => 'bayu2',
            'email' => 'bayu@gmail.com',
            'nohp' => '089764567746',
            'gender' => 'L'
        ]);
        Tamu::create([
            'name' => 'danny2',
            'email' => 'danny@gmail.com',
            'nohp' => '089764567746',
            'gender' => 'L'
        ]);
        Tamu::create([
            'name' => 'fito2',
            'email' => 'fito@gmail.com',
            'nohp' => '089764567746',
            'gender' => 'L'
        ]);
        Tamu::create([
            'name' => 'murran2',
            'email' => 'murran@gmail.com',
            'nohp' => '089764567746',
            'gender' => 'L'
        ]);
        Tamu::create([
            'name' => 'bayu3',
            'email' => 'bayu@gmail.com',
            'nohp' => '089764567746',
            'gender' => 'L'
        ]);
        Tamu::create([
            'name' => 'danny3',
            'email' => 'danny@gmail.com',
            'nohp' => '089764567746',
            'gender' => 'L'
        ]);
        Tamu::create([
            'name' => 'fito3',
            'email' => 'fito@gmail.com',
            'nohp' => '089764567746',
            'gender' => 'L'
        ]);
        Tamu::create([
            'name' => 'murran3',
            'email' => 'murran@gmail.com',
            'nohp' => '089764567746',
            'gender' => 'L'
        ]);
        Tamu::create([
            'name' => 'bayu4',
            'email' => 'bayu@gmail.com',
            'nohp' => '089764567746',
            'gender' => 'L'
        ]);
        Tamu::create([
            'name' => 'danny4',
            'email' => 'danny@gmail.com',
            'nohp' => '089764567746',
            'gender' => 'L'
        ]);
        Tamu::create([
            'name' => 'fito4',
            'email' => 'fito@gmail.com',
            'nohp' => '089764567746',
            'gender' => 'L'
        ]);
        Tamu::create([
            'name' => 'murran4',
            'email' => 'murran@gmail.com',
            'nohp' => '089764567746',
            'gender' => 'L'
        ]);

        User::create([
            'name' => 'summarecon',
            'email' => 'admin@gmail.com',
            'username' => 'admin',
            'password' => bcrypt('admin')
        ]);
    }
}

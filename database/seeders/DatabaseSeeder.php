<?php

namespace Database\Seeders;

use App\Models\Horoscope;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $juan_user = User::where('email', "=", "desarrollador@example.com");

        if(!$juan_user->exists()){
            User::create([
                'name' => 'desarrollador',
                'email' => 'desarrollador@example.com',
                'password' => Hash::make('desarrollador')
            ]);
        }

        foreach(Horoscope::all() as $h){
            $h->delete();
        }

        Horoscope::create([
            'title' => "Cáncer y capricornio",
            'content' => 'La sinceridad de Sagitario es rechazada entre los nacidos bajo el signo de Cáncer. Sus personalidades chocan y no son compatibles. Quiero que tenga eso cuenta para crear una imagen.',
            'image' => '',
            'published' => true
        ]);
    }
}

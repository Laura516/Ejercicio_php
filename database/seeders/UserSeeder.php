<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        //vamos a crear un registro
        //cuando corra los seeder el siempre va a crear este usuario por defecto

        user::create([
            
            "name"=>'SENA',
            "email"=>'laurafuneme19@gmail.com',
            "password"=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);
    }
}

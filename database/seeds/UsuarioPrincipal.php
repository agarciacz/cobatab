<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class UsuarioPrincipal extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Alvaro Gilberto',
            'paterno' => 'Garcia',
            'materno' => 'Cruz',
            'user' => 'agarcia',
            'email' => 'alvaro.gcruz@gmail.com',
            'password' => Hash::make('administrador'),
            'category' => 'A',
        ]);

        $this->command->info('Usuario principal creado');
    }
}

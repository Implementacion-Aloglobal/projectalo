<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class FilamentUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'fbarraes@aloglobal.com',
            'email' => 'fbarraes@aloglobal.com',
            'password' => Hash::make('fbarraes2025'),
            
        ]);

        User::create([
            'name' => 'rdopazo@aloglobal.com',
            'email' => 'rdopazo@aloglobal.com',
            'password' => Hash::make('rdopazo2025'),
        ]);

        User::create([
            'name' => 'aserbian@aloglobal.com',
            'email' => 'aserbian@aloglobal.com',
            'password' => Hash::make('aserbian2025'),
        ]);

        User::create([
            'name' => 'cpiedrahita@aloglobal.com',
            'email' => 'cpiedrahita@aloglobal.com',
            'password' => Hash::make('cpiedrahita2025'),
        ]);

        User::create([
            'name' => 'ihernandez@aloglobal.com',
            'email' => 'ihernandez@aloglobal.com',
            'password' => Hash::make('ihernandez2025'),
        ]);

        User::create([
            'name' => 'ogalaviz@aloglobal.com',
            'email' => 'ogalaviz@aloglobal.com',
            'password' => Hash::make('ogalaviz2025'),
        ]);


        User::create([
            'name' => 'lfvargas@aloglobal.com',
            'email' => 'lfvargas@aloglobal.com',
            'password' => Hash::make('lfvargas2025'),
        ]);




        User::create([
            'name' => 'mavila@aloglobal.com',
            'email' => 'mavila@aloglobal.com',
            'password' => Hash::make('mavila2025'),
        ]);

        User::create([
            'name' => 'hpereira@aloglobal.com ',
            'email' => 'hpereira@aloglobal.com',
            'password' => Hash::make('hpereira2025'),
        ]);


        
    }
}

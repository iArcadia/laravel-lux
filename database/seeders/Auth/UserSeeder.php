<?php

namespace Database\Seeders\Auth;

use App\Models\Auth\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder {
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void {
        $config_unique_user = lux_config('auth.unique_user');

        $data = [
            [
                'name' => 'Admin',
                'email' => 'admin@laravel-lux.com',
                'email_verified_at' => new Carbon,
                'password' => Hash::make('azerty')
            ]
        ];

        if (!$config_unique_user) {
            $data = array_merge($data, [
                [
                    'name' => 'Admin 2',
                    'email' => 'admin2@laravel-lux.com',
                    'email_verified_at' => new Carbon,
                    'password' => Hash::make('azerty')
                ]
            ]);
        }

        foreach ($data as $item) {
            User::create($item);
        }
    }
}

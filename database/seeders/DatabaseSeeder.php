<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['client', 'company', 'admin'];
        foreach ($roles as $role){
            \App\Models\Role::create(['name' => $role]);
        }

        \App\Models\User::factory(1)->create();
        \App\Models\User::create([
            'name' => 'company',
            'email' => 'company@email.net',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'phone' => '+7 (222) 22-22-222',
            'contact_face' => 'Иван',
            'company' => 'ООО Ромашка',
            'bin' => 11111,
            'year' => 2018,
            'requisites' => 'requisites',
            'tenge_account' => '12345',
            'usd_account' => '12345',
            'role_id' => 2,
            'confirm' => 0,
        ]);

        \App\Models\User::create([
            'name' => 'client',
            'email' => 'client@email.net',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'phone' => '+7 (333) 33-33-333',
            'role_id' => 1,
            'confirm' => 1,
        ]);


        $cities = [ 'Алматы',
                    'Нур-Султан',
                    'Шымкент',
                    'Актобе',
                    'Караганда',
                    'Атырау',
                    'Тараз',
                    'Павлодар',
                    'Семей',
                    'Усть-Каменогорск',
                    'Кызылорда',
                    'Уральск',
                    'Костанай',
                    'Петропавловск',
                    'Актау',
                    'Темиртау',
                    'Туркестан',
                    'Талдыкорган',
                    'Кокшетау',
                    'Жанаозен',
                    'Экибастуз',
                    'Рудный',

                    'Shanghai-Шанхай',
                    'Guangzhou-Гуанчжоу',
                    'Yiwu- Иу (Цзиньхуа)',
                    "Xi'an -Сиань",
                    'Tianjin-Тяньцзинь',
                    'Shenzhen-Шэньчжэнь',
                    'Ningbo- Нинбо',
                    'Урумчи –  Wūlǔmùqí – административный центр Синьцзян-Уйгурского автономного района'
                ];

        foreach ($cities as $city) {
            \App\Models\City::create(['name' => $city]);
        }

        $types = ['Авто', 'ЖД'];

        foreach ($types as $type){
            \App\Models\Type::create(['name' => $type]);
        }

        $statuses = ['Загружается', 'В пути', 'Завершенно', 'Отменен'];

        foreach ($statuses as $status){
            \App\Models\Status::create(['name' => $status]);
        }
    }
}

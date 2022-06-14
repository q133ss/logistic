<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['user', 'company', 'admin'];
        foreach ($roles as $role){
            \App\Models\Role::create(['name' => $role]);
        }

        \App\Models\User::factory(1)->create();

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

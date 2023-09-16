<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\Instructor::factory(15)->create();
        // \App\Models\Category::factory(15)->create();
        // \App\Models\SubCategory::factory(25)->create();

        // \App\Models\SubCategory::factory()->for(\App\Models\Category::factory())->count(15)->create();
        // \App\Models\ChildCategory::factory(50)->create();
        // \App\Models\Category::factory()->has(\App\Models\SubCategory::factory()->count(10))->create();
        // \App\Models\Category::factory()->hasSub_categories(5)->create();

//        $world = public_path('sql/countries.sql');
//        $sql = file_get_contents($world);
//        DB::unprepared($sql);

//        $cities = public_path('sql/cities.sql');
//        $sql = file_get_contents($cities);
//        DB::unprepared($sql);

        \App\Models\User::create([
            'name' => 'Admin User',
            'phone' => '01516148428',
            'email' => 'admin@admin.com',
            'password' => '12345678',
            'role' => 'admin',
            'remember_token' => Str::random(10),
        ]);

//        \App\Models\User::factory(2)->create();

    }
}

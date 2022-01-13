<?php

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
        \Illuminate\Support\Facades\DB::statement("SET FOREIGN_KEY_CHECKS=0;");
        $this->call(TiketTableSeeder::class);
        \Illuminate\Support\Facades\DB::statement("SET FOREIGN_KEY_CHECKS=1;");

    }
}

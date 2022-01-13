<?php

use Illuminate\Database\Seeder;

class TiketTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Model\Tiket::truncate();

        $tiket1 = new \App\Model\Tiket();
        $tiket1->tiket = "Peserta";
        $tiket1->harga = 10000;
        $tiket1->save();

        $tiket2 = new \App\Model\Tiket();
        $tiket2->tiket = "Penyeminar";
        $tiket2->harga = 20000;
        $tiket2->save();

    }
}

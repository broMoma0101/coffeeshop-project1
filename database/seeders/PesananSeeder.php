<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pesanan;

class PesananSeeder extends Seeder
{
    public function run()
    {
        Pesanan::truncate();

        Pesanan::factory()->count(300)->create();
    }
}
<?php

namespace Database\Factories;

use App\Models\Pesanan;
use Illuminate\Database\Eloquent\Factories\Factory;

class PesananFactory extends Factory
{
    protected $model = Pesanan::class;

    public function definition()
    {
        $menuAcak = ['Americano', 'Cappuccino', 'Cafe Latte', 'Espresso', 'Mochaccino', 'Caramel Macchiato', 'Cold Brew', 'Affogato', 'V60 Manual Brew'];
        
        $jumlah1 = rand(1, 3);
        $pesananTeks = $jumlah1 . 'x ' . $this->faker->randomElement($menuAcak);
        
        if (rand(0, 1)) {
            $jumlah2 = rand(1, 2);
            $pesananTeks .= ', ' . $jumlah2 . 'x ' . $this->faker->randomElement($menuAcak);
        }

        return [
            'nama' => $this->faker->name('id_ID'), 
            'nomor_hp' => $this->faker->numerify('08##########'), 
            'pesanan' => $pesananTeks,
            'total_harga' => $this->faker->numberBetween(15, 150) * 1000, 
            'status' => $this->faker->randomElement(['Belum Bayar', 'Sudah Bayar']),
            'created_at' => $this->faker->dateTimeBetween('-1 month', 'now'), 
            'updated_at' => function (array $attributes) {
                return $attributes['created_at'];
            },
        ];
    }
}
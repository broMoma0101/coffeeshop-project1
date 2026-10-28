<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    public function run()
    {
        Menu::truncate(); 

        Menu::insert([
            ['nama' => 'Americano', 'deskripsi' => 'Perpaduan espresso pekat dan air mineral hangat.', 'harga' => 30000, 'gambar' => 'assets/americano.jpg'],
            ['nama' => 'Cappuccino', 'deskripsi' => 'Keseimbangan espresso, susu panas, dan busa tebal.', 'harga' => 28000, 'gambar' => 'assets/capucino.jpg'],
            ['nama' => 'Cafe Latte', 'deskripsi' => 'Paduan espresso dan susu steamed yang lembut dan creamy.', 'harga' => 20000, 'gambar' => 'assets/latte.jpg'],
            ['nama' => 'Espresso', 'deskripsi' => 'Ekstrak kopi murni yang pekat, kuat, dan kaya rasa.', 'harga' => 15000, 'gambar' => 'assets/espresso.jpg'],
            ['nama' => 'Mocha', 'deskripsi' => 'Kombinasi sempurna antara espresso, susu, dan sirup cokelat.', 'harga' => 32000, 'gambar' => 'assets/mocha.jpg'],
            ['nama' => 'Caramel Macchiato', 'deskripsi' => 'Susu vanilla, espresso, dengan siraman saus karamel di atasnya.', 'harga' => 35000, 'gambar' => 'assets/Caramel-Macchiato.jpg'],
            ['nama' => 'Flat White', 'deskripsi' => 'Mirip latte namun dengan takaran kopi yang lebih dominan.', 'harga' => 28000, 'gambar' => 'assets/flatwhite.jpg'],
            ['nama' => 'Cold Brew', 'deskripsi' => 'Kopi yang diseduh dengan air dingin selama 12 jam, halus dan rendah asam.', 'harga' => 30000, 'gambar' => 'assets/coldbrew.jpg'],
            ['nama' => 'Affogato', 'deskripsi' => 'Satu scoop es krim vanilla yang disiram dengan segelas espresso panas.', 'harga' => 25000, 'gambar' => 'assets/affogato.jpg'],
            ['nama' => 'V60 Manual Brew', 'deskripsi' => 'Kopi hitam manual brew dengan karakter rasa buah dan bunga (fruity/floral).', 'harga' => 35000, 'gambar' => 'assets/v60.jpg'],
        ]);
    }
}

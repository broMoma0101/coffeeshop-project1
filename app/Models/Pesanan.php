<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Pesanan extends Model
{
    protected $table = 'pesanan';
    use HasFactory;
    protected $fillable = ['nama', 'nomor_hp', 'pesanan', 'total_harga', 'status']; //pesan yang dapat di isi
}
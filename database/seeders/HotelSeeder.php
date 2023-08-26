<?php

namespace Database\Seeders;

use App\Models\Hotel;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

/**
 * Summary of HotelSeeder
 */
class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Hotel::create([
            'tipe' => 'Standar',
            'harga' => 500000,
            'fasilitas' => 'Kamar standar adalah pilihan yang ekonomis dan nyaman untuk penginapan. Dilengkapi dengan fasilitas dasar seperti tempat tidur nyaman, kamar mandi pribadi, dan area bersantai.',
            'gambar' => 'https://www.satoriahotel.com/wp-content/uploads/2022/04/E.-Deluxe-Room-1-scaled-e1651111459463.jpg',
            'video' => 'https://www.youtube.com/embed/ZKTMLNBjJAs?si=4xwRXyOVPjAvAji0',

        ]);

        Hotel::create([
            'tipe' => 'Deluxe',
            'harga' => 700000,
            'fasilitas' => 'Kamar deluxe menawarkan kenyamanan tambahan dengan ruang yang lebih luas dan fasilitas tambahan. Terdapat tempat tidur berkualitas tinggi, TV layar datar, area duduk tambahan, dan mungkin pemandangan yang menakjubkan.',
            'gambar' => 'https://cdn-5df39a54f911cb0cdc3f7221.closte.com/wp-content/uploads/2019/11/feature-superior-elite.jpg',
            'video' => 'https://www.youtube.com/embed/dV4PqM7UQrI?si=RwRyYGT77eIFp5x9',
        ]);

        Hotel::create([
            'tipe' => 'Executive',
            'harga' => 1000000,
            'fasilitas' => 'Kamar executive dirancang untuk tamu yang mencari kemewahan dan kenyamanan tingkat tinggi. Fasilitas meliputi ruang tidur yang luas, area kerja, fasilitas kebugaran pribadi, akses ke lounge eksklusif, dan layanan kamar 24 jam.',
            'gambar' => 'https://asset-a.grid.id/crop/0x0:0x0/x/photo/2018/12/03/3030800391.jpg',
            'video' => 'https://www.youtube.com/embed/5PY1XAuNSbQ?si=y4cso0Ea6GYAm_Ek',
        ]);
    }
}

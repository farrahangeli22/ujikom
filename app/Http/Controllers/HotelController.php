<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    //menampilkan daftar hotel
    function viewHome()
    {
        $hotel = Hotel::get();
        
        return view('hotel.home', ['hotel'=> $hotel]);
    }

    //menampilkan daftar harga
    function viewDaftarHarga()
    {
        $hotel = Hotel::get();
        
        return view('hotel.daftar-harga', ['hotel'=> $hotel]);
    }

    //menampilkan tentang kami
    function viewTentangKami()
    {
        return view('hotel.tentang-kami');
    }
}

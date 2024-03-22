<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use Illuminate\Http\Request;
use Illuminate\Support\Env;
use Illuminate\Support\Facades\Http;

class AppController extends Controller
{
    public function index()
    {
        $data['title'] = 'Home';

        return view('home', compact('data'));
    }

    public function getSurah()
    {
        try {
            $response = Surat::listSurat();
            return response()->json($response);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function baca($nomor)
    {
        try {
            $response = Surat::detailSurat($nomor);
            $data['surah'] = $response;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return view('baca', compact('data'));
    }
}

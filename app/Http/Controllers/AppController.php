<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AppController extends Controller
{
    public function index()
    {
        $data['title'] = 'Home';

        try{
            $response = Http::get('https://equran.id/api/surat');
            $data['surah'] = $response->json();

        }catch(\Exception $e){
            return $e->getMessage();
        }
        return view('home', compact('data'));

    }
}

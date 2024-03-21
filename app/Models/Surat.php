<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Surat extends Model
{
    public static function listSurat()
    {
        try{
            $response = Http::get(env('BASE_API').'/surat');
            return $response->json();
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public static function detailSurat($no)
    {
        try{
            $response = Http::get(env('BASE_API').'/surat/'.$no);
            return $response->json();
        }catch(\Exception $e){
            return $e->getMessage();
        }
    }
}

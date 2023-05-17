<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboneModel;
use App\Models\formAboneler;

class Abone extends Controller
{
    public function aboneKaydet(Request $request)
    {

        $data = [
            'email' => $request->aboneEmail
        ];
        $kaydet = AboneModel::create($data);

        if ($kaydet) {
            return redirect()->back()->with('success', 'Abone kaydınız başarıyla gerçekleşti.');
        } else {
            return redirect()->back()->with('error', 'Abone kaydınız gerçekleştirilemedi.');
        }

    }

    public function formKaydet(Request $request)
    {
        $data = $request->all();
        $kaydet = formAboneler::create($data);

        if ($kaydet) {
            return redirect()->back()->with('success', 'Formunuz gönderme başarıyla gerçekleşti.');
        } else {
            return redirect()->back()->with('error', 'Form gönderiminiz gerçekleştirilemedi.');
        }

    }



}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Modul;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ModulController extends Controller
{
    /**
     * Show the form for creating the resource.
     */
    public function create(): never
    {
        abort(404);
    }

    /**
     * Store the newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'modul_adi' => 'required|max:255',
            'modul_aciklama' => 'required',
            'modul_resmi' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'modul_fiyati' => 'required',
        ]);

        $modul = new Modul;
        $modul->modul_name = $request->modul_adi;
        $modul->modul_aciklama = $request->modul_aciklama;
        $modul->modul_fiyat = $request->modul_fiyati;

        if ($request->hasFile('modul_resmi')) {
            $image = $request->file('modul_resmi');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/adminassets/upload/modul');
            $image->move($destinationPath, $name);
            $modul->modul_resim = $name;
        }

        $modul->save();

        return redirect()->route('ilavemodullerim')->with('success', 'Modül başarıyla eklendi!');
    }

    /**
     * Display the resource.
     */
    public function show(Request $request)
    {

        $modul_id = $request->modul_id;
        $id = $request->user_id;
        $userInfo = User::find($id);
        $product = Modul::find($modul_id);
        echo json_encode($product);
        echo json_encode($userInfo);
    }

    public function modulShow($id)
    {
        $product = Modul::find($id);
        return view('panel.modul.showModalBody', compact('product'));
    }

    /**
     * Show the form for editing the resource.
     */
    public function edit($id)
    {
        $modul = Modul::find($id);
        $user = User::find(Auth::user()->id);
        return view('panel.editModul', compact('modul', 'user'));
    }

    /**
     * Update the resource in storage.
     */
    public function update(Request $request, $id)
    {
        $modul = Modul::findOrFail($id);

        $validatedData = $request->validate([
            'modul_adi' => 'required|max:255',
            'modul_aciklama' => 'required',
            'modul_resmi' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'modul_fiyati' => 'required',
        ]);

        $modul->modul_name = $validatedData['modul_adi'];
        $modul->modul_aciklama = $validatedData['modul_aciklama'];
        $modul->modul_fiyat = $validatedData['modul_fiyati'];
        // diğer alanlar  

        if ($request->hasFile('modul_resmi')) {
            $image = $request->file('modul_resmi');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/adminassets/upload/modul');
            $image->move($destinationPath, $name);
            $oldName = $modul->modul_resim;
            $modul->modul_resim = $name;
            unlink($destinationPath . "/" . $oldName);
        }


        $modul->save();
        return redirect()->route('ilavemodullerim')->with('success', 'Modül başarıyla güncellendi!');
    }

    /**
     * Remove the resource from storage.
     */
    public function destroy($id)
    {
        $modul = Modul::findOrFail($id);
        $filePath = public_path("adminasset/upload/modul/" . $modul->modul_resim); // Dosya yolu
        if (file_exists($filePath)) {
            unlink($filePath); // Dosyayı sil
        }
        $modul->delete(); // Veritabanından modülü sil
        return redirect()->route('ilavemodullerim')->with('success', 'Modul silindi!');
    }

    public function truncateTable()
    {
        DB::table('moduls')->truncate();
        return redirect()->back()->with('success', 'Tablo başarıyla temizlendi!');
    }

}
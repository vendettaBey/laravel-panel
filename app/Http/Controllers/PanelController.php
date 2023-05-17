<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\DomainModel;
use App\Models\AboneModel;
use App\Models\Ayarlar;
use App\Models\formAboneler;
use App\Models\Modul;
use App\Models\Role;
use App\Models\Code;
use App\Models\Musteriler;
use Illuminate\Support\Facades\Redirect;



class PanelController extends Controller
{
    /**
     * Show the form for creating the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function create(): never
    {
        abort(404);
    }

    public function sanalpos()
    {
        return view('panel.sanalpos');
    }

    public function index()
    {
        $user = Auth::user();
        $user = User::find($user->id);

        $user->syncRoles('admin');

        if ($user->hasRole('admin')) {
            $domains = DomainModel::where('user_id', $user->id)->get();
            return view('panel.admin', compact('user', 'domains'));
        } else {
            $domains = DomainModel::where('user_id', $user->id)->get();
            return view('panel.index', compact('user', 'domains'));
        }
    }

    public function eticaretpaketleri()
    {
        $user = User::find(Auth::user()->id);
        return view('panel.eticaretpaketleri', compact('user'));
    }

    public function ilavemodullerim()
    {
        $user = User::find(Auth::user()->id);
        $moduller = Modul::all();
        return view('panel.ilavemodullerim', compact('user', 'moduller'));
    }

    public function pazaryeripaketlerim()
    {
        $user = User::find(Auth::user()->id);
        return view('panel.pazaryeripaketlerim', compact('user'));
    }

    public function eticaretpaketlerim()
    {
        $user = User::find(Auth::user()->id);
        return view('panel.eticaretpaketlerim', compact('user'));
    }

    public function pazaryeripaketleri()
    {
        return view('panel.pazaryeri');
    }
    public function sizeozelcozumler()
    {
        $site = Ayarlar::find(1);
        $user = Auth::user();
        $user = User::find($user->id);
        return view('front.size-ozel-cozumler', compact('site', 'user'));
    }

    public function eticaretpaketial()
    {
        return view('panel.eticaretpaketial');
    }


    public function iletisim()
    {
        $user = Auth::user();
        $user = User::find($user->id);
        $forms = formAboneler::all();
        $aboneler = AboneModel::all();

        return view('panel.iletisim', compact('user', 'aboneler', 'forms'));
    }

    public function musteriler()
    {
        $musteriler = Musteriler::all();
        $user = User::find(Auth::user()->id);
        return view('panel.musteriler.musteriList', compact('user', 'musteriler'));
    }


    public function userModuller()
    {
        $user = Auth::user();
        $user = User::find($user->id);
        $moduller = Modul::all();
        return view('panel.modul.userModuller', compact('user', 'moduller'));
    }


    public function kodEkle()
    {
        $user = Auth::user();
        $user = User::find($user->id);
        $kod = Code::first();
        return view('panel.kod.kodEkle', compact('user', 'kod'));
    }

    public function kodKaydet(Request $request)
    {

        $data = $request->all();



        $existingCode = Code::first();
        if ($existingCode) {
            // Eğer bir satır varsa, onu güncelle
            $existingCode->update($data);
            $message = 'Kod başarıyla güncellendi.';
        } else {
            // Eğer bir satır yoksa, yeni bir satır oluştur
            Code::create($data);
            $message = 'Kod başarıyla eklendi.';
        }
        return Redirect::route('kodEkle')->with('successCode', $message);
    }

    public function kodSil($id)
    {
        $kod = Code::find($id);
        $kod->delete();
        return Redirect::route('kodEkle')->with('deleteCode', 'Kod başarıyla silindi.');
    }



    /**
     * Store the newly created resource in storage.
     */
    public function store(Request $request): never
    {
        abort(404);
    }

    /**
     * Display the resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the resource in storage.
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the resource from storage.
     */
    public function destroy(): never
    {
        abort(404);
    }
}
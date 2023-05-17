<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\DomainController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\Abone;
use App\Http\Controllers\ModulController;
use App\Http\Controllers\BlogController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('anasayfa');

Route::any('/hakkimizda', [HomeController::class, 'hakkimizda'])->name('hakkimizda');
Route::get('/kariyer_imkanlari', [HomeController::class, 'kariyer_imkanlari'])->name('kariyer_imkanlari');
Route::get('/is_cozum_ortakligi', [HomeController::class, 'is_cozum_ortakligi'])->name('is_cozum_ortakligi');
Route::get('/blog', [HomeController::class, 'blog'])->name('blog');
Route::get('/kampanyalar', [HomeController::class, 'kampanyalar'])->name('kampanyalar');
Route::get('/yazilim-gelistirmeleri', [HomeController::class, 'yazilim_gelistirmeleri'])->name('yazilim_gelistirmeleri');
Route::get('/odeme-entegrasyonlari', [HomeController::class, 'odeme_entegrasyonlari'])->name('odeme-entegrasyonlari');
Route::get('/pazaryeri-entegrasyonlari', [HomeController::class, 'pazaryeri_entegrasyonlari'])->name('pazaryeri-entegrasyonlari');
Route::get('/e-very-farkini-kesfedin', [HomeController::class, 'e_very_farkini_kesfedin'])->name('e-very-farkini-kesfedin');
Route::get('/arama-motoru-optimizasyonu', [HomeController::class, 'arama_motoru_optimizasyonu'])->name('arama-motoru-optimizasyonu');
Route::get('/e-fatura-cozumleri', [HomeController::class, 'e_fatura_cozumleri'])->name('e-fatura-cozumleri');
Route::get('/abonelik-ile-satis-cozumu', [HomeController::class, 'abonelik_ile_satis_cozumu'])->name('abonelik-ile-satis-cozumu');
Route::get('/kampanya-yonetimi', [HomeController::class, 'kampanya_yonetimi'])->name('kampanya-yonetimi');
Route::get('/coklu-dil-ve-para-cozumu', [HomeController::class, 'coklu_dil_ve_para_cozumu'])->name('coklu-dil-ve-para-cozumu');
Route::get('/b2b-cozumleri', [HomeController::class, 'b2b_cozumleri'])->name('b2b-cozumleri');
Route::any('/profesyonel-e-ticaret-paketlerimiz', [HomeController::class, 'profesyonel_e_ticaret_paketlerimiz'])->name('profesyonel-e-ticaret-paketlerimiz');
Route::get('/ilave-moduller', [HomeController::class, 'ilave_moduller'])->name('ilave-moduller');
Route::get('/size-ozel-cozumler', [HomeController::class, 'size_ozel_cozumler'])->name('size-ozel-cozumler');
Route::get('/referanslar', [HomeController::class, 'referanslar'])->name('referanslar');
Route::get('/e-ticaret-siteni-ac', [HomeController::class, 'e_ticaret_siteni_ac'])->name('e-ticaret-siteni-ac');

Route::get('/index', [HomeController::class, 'index'])->name('index');

Route::get('logout', function () {
    auth()->logout();
    Session()->flush();
    return Redirect::to('/');
})->name('logout');

Route::get('/sanalpos', [PanelController::class, 'sanalpos'])->name('sanalpos');

Route::get('/panel', [PanelController::class, 'index'])->middleware(['auth', 'verified'])->name('panel.index');


Route::post('/redirectEticaret', [HomeController::class, 'redirectEticaret'])->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class])->name('redirectEticaret');
Route::post('/redirectEticaretPaket', [HomeController::class, 'redirectEticaretPaket'])->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class])->name('redirectEticaretPaket');
Route::post('/redirectPazaryeri', [HomeController::class, 'redirectPazaryeri'])->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class])->name('redirectPazaryeri');


//! USer ürünler , Satış
Route::post('getUserInfo', [HomeController::class, 'getUserInfo'])->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class])->name('getUserInfo');
Route::post('formUserUrun', [HomeController::class, 'formUserUrun'])->name('formUserUrun');


Route::get('/domainlerim', [DomainController::class, 'domainlerim'])->middleware(['auth', 'verified'])->name('domainlerim');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/domainRegister', [DomainController::class, 'domainRegister'])->name('domainRegister');

Route::get('/eticaretpaketlerim', [PanelController::class, 'eticaretpaketlerim'])->name('eticaretpaketlerim');
Route::get('/ilavemodullerim', [PanelController::class, 'ilavemodullerim'])->name('ilavemodullerim');
Route::get('/pazaryeripaketlerim', [PanelController::class, 'pazaryeripaketlerim'])->name('pazaryeripaketlerim');
Route::any('/eticaretpaketleri', [PanelController::class, 'eticaretpaketleri'])->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class])->name('eticaretpaketleri');
Route::get('/pazaryeripaketleri', [PanelController::class, 'pazaryeripaketleri'])->name('pazaryeripaketleri');
Route::get('/sizeozelcozumler', [PanelController::class, 'sizeozelcozumler'])->name('sizeozelcozumler');

Route::get('/panel/iletisim', [PanelController::class, 'iletisim'])->name('panel.iletisim');


Route::post('/smsApi', [AjaxController::class, 'smsApi'])->name('smsApi');
Route::post('/smsCheck', [AjaxController::class, 'smsCheck'])->name('smsCheck');
Route::post('/musteriEkle', [AjaxController::class, 'musteriEkle'])->name('musteriEkle');
Route::post('/yeniSitem', [AjaxController::class, 'yeniSitem'])->name('yeniSitem');
Route::post('/ssl', [AjaxController::class, 'ssl'])->name('ssl');
Route::post('/extractZip', [AjaxController::class, 'extractZip'])->name('extractZip');

Route::post('/saveDomainDb', [AjaxController::class, 'saveDomainDb'])->name('saveDomainDb');
Route::post('/domainUcret', [AjaxController::class, 'domainUcret'])->name('domainUcret');
Route::post('/domainSatinAl', [AjaxController::class, 'domainSatinAl'])->name('domainSatinAl');

Route::post('/domainAl', [AjaxController::class, 'domainAl'])->name('domainAl');

Route::get('/domainSatinAl', function () {
    $result = $_GET['result'];
    return view('panel.domainSatinAl', ['result' => $result]);
});

Route::post('/buyDomain', [AjaxController::class, 'buyDomain'])->name('buyDomain');
Route::post('/paketSatinAl', [AjaxController::class, 'paketSatinAl'])->name('paketSatinAl');
Route::post('/eticaretPaketSatinAl', [AjaxController::class, 'eticaretPaketSatinAl'])->name('eticaretPaketSatinAl');


Route::any('/eticaretpaketial/{parametre}', function ($parametre) {
    $user = Auth::user();
    return view('panel.eticaretpaketial', ['parametre' => $parametre, 'user' => $user]);
})->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class])->name('eticaretpaketial');


Route::post('/aboneOl', [Abone::class, 'aboneKaydet'])->name('aboneOl');
Route::post('/formKaydet', [Abone::class, 'formKaydet'])->name('formKaydet');


Route::fallback(
    function () {
        $site = \App\Models\Ayarlar::find(1);
        return view('front.404', compact('site'));
    }
);

//! Moduller
Route::post('/moduls.store', [ModulController::class, 'store'])->name('moduls.store');
Route::delete('/moduls/{id}', [ModulController::class, 'destroy'])->name('moduls.destroy');
Route::get('/moduls/{id}/edit', [ModulController::class, 'edit'])->name('moduls.edit');
Route::put('/moduls/{id}', [ModulController::class, 'update'])->name('moduls.update');
Route::get('/truncateTable', [ModulController::class, 'truncateTable'])->name('truncateTable');

//? User Modüller
Route::get('/moduller', [PanelController::class, 'userModuller'])->name('moduller');
Route::get('/modul/{id}', [ModulController::class, 'modulShow']);
Route::post('/modulSatinAl', [AjaxController::class, 'modulSatinAl'])->name('modulSatinAl');
Route::any('/redirectModul', [HomeController::class, 'redirectModul'])
    ->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class])
    ->name('redirectModul');
Route::any('/modulKaydet', [ModulController::class, 'show']);

//! Pazaryeri Satin AL


Route::post('/pazaryeriSatinAl', [AjaxController::class, 'pazaryeriSatinAl'])->name('pazaryeriSatinAl');
Route::get('/musteriler', [PanelController::class, 'musteriler'])->name('musteriler');

//! Bloglar

Route::get('/blogEkle', [BlogController::class, 'blogEkle'])->name('blogEkle');
Route::get('/blogKategoriEkle', [BlogController::class, 'blogKategoriEkle'])->name('blogKategoriEkle');
Route::get('/bloglar', [BlogController::class, 'bloglar'])->name('bloglar');
Route::any('/blogKaydet', [BlogController::class, 'blogKaydet'])->name('blogKaydet');
Route::any('/blogKategoriKaydet', [BlogController::class, 'blogKategoriKaydet'])->name('blogKategoriKaydet');
Route::get('/blogDuzenleForm/{id}', [BlogController::class, 'blogDuzenleForm'])->name('blogDuzenleForm');
Route::any('/blogDuzenleKaydet', [BlogController::class, 'blogDuzenleKaydet'])->name('blogDuzenleKaydet');
Route::any('/blogSil/{id}', [BlogController::class, 'blogSil'])->name('blogSil');
Route::any('/blogDetay/{id}', [BlogController::class, 'blogDetay'])->name('blogDetay');

//! Kodlar
Route::any('kodEkle', [PanelController::class, 'kodEkle'])->name('kodEkle');
Route::post('kodKaydet', [PanelController::class, 'kodKaydet'])->name('kodKaydet');
Route::any('/kodSil/{id}', [PanelController::class, 'kodSil'])->name('kodSil');

require __DIR__ . '/auth.php';
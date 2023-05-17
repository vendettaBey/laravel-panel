<div class="row">
    <div class="container p-4">
        <div class="max-w-md mx-auto bg-white rounded-lg shadow-md overflow-hidden">
            <div class="p-6">
                <h2 class="text-xl font-semibold mb-2">{{ $product->modul_name }}</h2>
                <p class="text-gray-700 mb-4">{{ $product->modul_aciklama }}</p>
                <div class="flex items-center justify-between">
                    <span class="text-lg font-semibold text-gray-900">Fiyat: {{ $product->modul_fiyat }} &nbsp; TL</span>
                </div>
            </div>
        </div>
    </div>
</div>
<input type="hidden" name="tutar" value="{{ $product->modul_fiyat }}">
<input type="hidden" name="modulId" value="{{ $product->id }}">
<input type="hidden" name="userId" value="{{ Auth::user()->id }}">

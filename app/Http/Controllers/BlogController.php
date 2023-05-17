<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\BlogCategory;
use App\Helpers\CustomHelper;
use Illuminate\Support\Facades\Validator;
use App\Models\Ayarlar;

class BlogController extends Controller
{
    public function blogEkle()
    {
        $user = Auth::user();
        $blogKategorileri = BlogCategory::all();
        return view('panel.blog.blogEkle', compact('user', 'blogKategorileri'));
    }

    public function blogKaydet(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($request->all(), [
            'baslik' => 'required',
            'icerik' => 'required',
            'category' => 'required',
            'blogResim' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $blog = new Blog();

        $blog->baslik = $data['baslik'];
        $blog->slug = CustomHelper::seoUyumlu($data['baslik']);
        $blog->icerik = $data['icerik'];
        $blog->kategori = $data['category'];
        $blog->tag = $data['tags'];
        $blog->sira = $data['order'];
        $blog->seoBaslik = CustomHelper::seoUyumlu($data['baslik']);
        $blog->seoAciklama = CustomHelper::seoUyumlu($data['icerik']);
        $blog->seoImage = CustomHelper::seoUyumlu($data['baslik']);
        $blog->created_at = date('Y-m-d H:i:s');
        $blog->goruntulenme = 0;
        $blog->etiket = $data['tags'];
        $blog->durum = 1;

        if ($request->hasFile('blogResim')) {
            $image = $request->file('blogResim');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/adminassets/upload/blog');
            $image->move($destinationPath, $name);
            $blog->image = $name;
        }

        $blog->save();

        return redirect()->route('bloglar')->with('successBlog', 'Blog başarıyla eklendi!');


    }

    public function blogDuzenleForm($id)
    {
        $user = Auth::user();
        $blog = Blog::find($id);
        $blogKategorileri = BlogCategory::all();
        return view('panel.blog.blogDuzenle', compact('user', 'blog', 'blogKategorileri'));
    }

    public function blogKategoriKaydet(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'baslik' => 'required',
            'sira' => 'required|numeric',
            'menu' => 'required',
            'seoBaslik' => 'required',
            'seoAciklama' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $request->all();

        $blogKategori = new BlogCategory();
        $blogKategori->kategoriAdi = $data['baslik'];
        $blogKategori->slug = CustomHelper::seoUyumlu($data['baslik']);
        $blogKategori->sira = $data['sira'];
        $blogKategori->durum = 1;
        $blogKategori->menu = $data['menu'];
        $blogKategori->created_at = date('Y-m-d H:i:s');
        $blogKategori->seoAciklama = CustomHelper::seoUyumlu($data['seoAciklama']);
        $blogKategori->seoBaslik = $data['seoBaslik'];

        $blogKategori->save();

        return redirect()->route('blogKategoriEkle')->with('successKategori', 'Blog Kategori başarıyla eklendi!');

    }

    public function blogDuzenleKaydet(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'baslik' => 'required',
            'icerik' => 'required',
            'category' => 'required',
            'blogResim' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $data = $request->all();

        $blog = Blog::find($data['blog_id']);

        $blog->baslik = $data['baslik'];
        $blog->slug = CustomHelper::seoUyumlu($data['baslik']);
        $blog->icerik = $data['icerik'];
        $blog->kategori = $data['category'];
        $blog->tag = $data['tags'];
        $blog->sira = $data['order'];
        $blog->seoBaslik = CustomHelper::seoUyumlu($data['baslik']);
        $blog->seoAciklama = CustomHelper::seoUyumlu($data['icerik']);
        $blog->seoImage = CustomHelper::seoUyumlu($data['baslik']);
        $blog->created_at = date('Y-m-d H:i:s');
        $blog->goruntulenme = 0;
        $blog->etiket = $data['tags'];
        $blog->durum = 1;

        if ($request->hasFile('blogResim')) {
            $image = $request->file('blogResim');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/adminassets/upload/blog');
            $image->move($destinationPath, $name);
            $blog->image = $name;
        }

        $blog->save();

        return redirect()->route('bloglar')->with('successBlogUpdate', 'Blog başarıyla güncellendi!');
    }

    public function blogDetay($id)
    {
        $user = Auth::user();
        $site = Ayarlar::find(1);
        $blog = Blog::find($id);
        return view('front.blog-detay', compact('site', 'user', 'blog'));
    }

    public function bloglar()
    {
        $user = Auth::user();
        $bloglar = (new Blog())->getBlogs();
        return view('panel.blog.bloglar', compact('user', 'bloglar'));
    }

    public function blogKategoriEkle()
    {
        $user = Auth::user();
        $blogKategoriler = BlogCategory::all();
        return view('panel.blog.blogKategoriEkle', compact('user', 'blogKategoriler'));
    }

    public function blogSil($id)
    {
        $blog = Blog::find($id);
        $blog->delete();
        return redirect()->route('bloglar')->with('successBlogDelete', 'Blog başarıyla silindi!');
    }

}
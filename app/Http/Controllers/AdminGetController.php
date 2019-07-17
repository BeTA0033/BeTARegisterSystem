<?php

namespace App\Http\Controllers;
use App\Haberler;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\KimlikBilgileri;


class AdminGetController extends Controller
{

   public function __construct()
    {
        $this->middleware('auth');
    }

    public function get_cikis(){
       Auth::logout();
       return redirect('login');
    }

    public function get_anasayfa(){
        $haberler = DB::TABLE('users')
            ->SELECT('*')
            ->JOIN('tb_haberler', 'users.id', '=', 'tb_haberler.kullanici_id')
            ->GET();
        return View::make('site.index')->with('haberler',$haberler);
    }

    public function get_profil(){
        $kullanicilar = DB::TABLE('tb_kimlik_bilgileri')
            ->SELECT('*')
            ->JOIN('users', 'tb_kimlik_bilgileri.id', '=', 'users.kimlik_id')
            ->GET();
        return View::make('site.profil')->with('kullanicilar', $kullanicilar);
    }

    public function get_kullanici(){
        $kimlikler = DB::TABLE('tb_kimlik_bilgileri')
            ->SELECT('id', 'no')
            ->GET();

        return View::make('site.tanimlamalar.kullanici')->with('kimlikler', $kimlikler);
    }

    public function get_kimlik(){
        return View::make('site.tanimlamalar.kimlik');
    }

    public function get_kullanicitab(){

        $kullanicilar = DB::TABLE('tb_kimlik_bilgileri')
            ->SELECT('*')
            ->JOIN('users', 'tb_kimlik_bilgileri.id', '=', 'users.kimlik_id')
            ->GET();
        //dd($kullanicilar);
        return View::make('site.kayitlar.kullanicitab')->with('kullanicilar', $kullanicilar);
    }

    public function get_kimliktab(){
        $kimlikler = DB::TABLE('tb_kimlik_bilgileri')
            ->SELECT('*')
            ->GET();
        return View::make('site.kayitlar.kimliktab')->with('kimlikler', $kimlikler);
    }


    public function get_kullanicitabduzenle($id){
        $kullanicilar = DB::TABLE('users')
            ->SELECT('*')
            ->WHERE('users.id',$id)
            ->GET();

        $kimlikler = DB::TABLE('tb_kimlik_bilgileri')
            ->SELECT('id', 'no')
            ->GET();

        $yetkilendirme=DB::TABLE('roles')
            ->SELECT('*')
            ->GET();
        return View::make('site.kayitlar.kullanicitab-duzenle')->with('kullanicilar', $kullanicilar)->with('kimlikler',$kimlikler)->with('yetkilendirme',$yetkilendirme);
    }

    public function get_kimliktabduzenle($id){
        $kimlikbilgi=KimlikBilgileri::where('id',$id)->first();
        return view('site.kayitlar.kimliktab-duzenle')->with('kimlikbilgi',$kimlikbilgi);
    }

    public function get_haberekle(){
        return View::make('site.haberler.haberekle');
    }

    public function get_habertab(){
        $haberler = DB::TABLE('users')
            ->SELECT('*')
            ->JOIN('tb_haberler', 'users.id', '=', 'tb_haberler.kullanici_id')
            ->GET();
        return View::make('site.haberler.habertab')->with('haberler',$haberler);
    }

    public function get_habertabduzenle($id){
        $haberbilgi=Haberler::where('id',$id)->first();
        return view('site.haberler.habertab-duzenle')->with('haberbilgi',$haberbilgi);
    }
    public function get_yetkisiz(){
       return View::make('site.yetkisiz');
    }
}

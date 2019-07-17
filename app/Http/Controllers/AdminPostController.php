<?php

namespace App\Http\Controllers;

use App\Haberler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\KimlikBilgileri;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;

class AdminPostController extends Controller
{

    public function post_kullanici(Request $request)
    {
        try {
            User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'kimlik_id'=>$request['kimlik_id'],
                'rol_id'=>$request['rol_id'],

            ]);
            return response(['baslik' => 'Başarılı', 'icerik' => 'Kayıt Başarı İle Eklendi.', 'durum' => 'success']);
        } catch (\Exception $a) {
            return response(['baslik' => 'Hatalı', 'icerik' => 'Kayıt Eklenemedi.', 'durum' => 'error']);
        }
    }

    public function post_kimlik(Request $request)
    {
        try {
            KimlikBilgileri::create($request->all());
            return response(['baslik' => 'Başarılı', 'icerik' => 'Kayıt Başarı İle Eklendi.', 'durum' => 'success']);
        } catch (\Exception $a) {
            return response(['baslik' => 'Hatalı', 'icerik' => 'Kayıt Eklenemedi.', 'durum' => 'error']);
        }
    }

    public function post_kullanicitab(Request $request)
    {
        try {
            User::where('id', $request->id)->delete();
            return response(['baslik' => 'Başarılı', 'icerik' => 'Kayıt Başarı İle Silindi.', 'durum' => 'success']);
        } catch (\Exception $e) {
            return response(['baslik' => 'Hatalı', 'icerik' => 'Kayıt Silinemedi.', 'durum' => 'error', 'hata' => $e]);
        }
    }

    public function post_kimliktab(Request $request)
    {
        try {
            KimlikBilgileri::where('id', $request->id)->delete();
            return response(['baslik' => 'Başarılı', 'icerik' => 'Kayıt Başarı İle Silindi.', 'durum' => 'success']);
        } catch (\Exception $a) {
            return response(['baslik' => 'Hatalı', 'icerik' => 'Kayıt Silinemedi.', 'durum' => 'error', 'hata' => $a]);
        }
    }

    public function post_kullanicitabduzenle(Request $request){
        if (isset($_POST['form1'])) {
        try {
            User::where('id', $request->id)->update(['kimlik_id'=>$request->kimlik_id,'name'=>$request->name,'email'=>$request->email,'rol_id'=>$request->rol_id]);
            return response(['baslik' => 'Başarılı', 'icerik' => 'Kayıt Başarı İle Güncellendi.', 'durum' => 'success']);
        } catch (\Exception $e) {
            return response(['baslik' => 'Hatalı', 'icerik' => 'Kayıt Güncellenemedi.', 'durum' => 'error']);
        }}
        if (isset($_POST['form2'])) {
            try {
                User::where('id', $request->id)->update(['password'=> Hash::make($request['password'])]);
                return response(['baslik' => 'Başarılı', 'icerik' => 'Parola Başarı İle Güncellendi.', 'durum' => 'success']);
            } catch (\Exception $e) {
                return response(['baslik' => 'Hatalı', 'icerik' => 'Parola Güncellenemedi.', 'durum' => 'error']);
            }
        }
    }

    public function post_kimliktabduzenle(Request $request){
        try {
            KimlikBilgileri::where('id', $request->id)->update(['no'=> $request->no,'ad'=>$request->ad,'soyad'=>$request->soyad,'telefon'=>$request->telefon,'adres'=>$request->adres]);
            return response(['baslik' => 'Başarılı', 'icerik' => 'Kayıt Başarı İle Güncellendi.', 'durum' => 'success']);
        } catch (\Exception $a) {
            return response(['baslik' => 'Hatalı', 'icerik' => 'Kullanıcı Güncellenemedi.', 'durum' => 'error', 'hata' => $a]);
        }
    }

    public function post_haberekle(Request $request){
        try {
            Haberler::create($request->all());
            return response(['baslik' => 'Başarılı', 'icerik' => 'Kayıt Başarı İle Eklendi.', 'durum' => 'success']);
        } catch (\Exception $a) {
            return response(['baslik' => 'Hatalı', 'icerik' => 'Kayıt Eklenemedi.', 'durum' => 'error']);
        }
    }

    public function post_habertab(Request $request){
        try {
            Haberler::where('id', $request->id)->delete();
            return response(['baslik' => 'Başarılı', 'icerik' => 'Kayıt Başarı İle Silindi.', 'durum' => 'success']);
        } catch (\Exception $a) {
            return response(['baslik' => 'Hatalı', 'icerik' => 'Kayıt Silinemedi.', 'durum' => 'error', 'hata' => $a]);
        }
    }

    public function post_habertabduzenle(Request $request){
        try {
            Haberler::where('id', $request->id)->update(['icerik'=>$request->icerik,'baslik'=>$request->baslik,'kullanici_id'=>$request->kullanici_id]);
            return response(['baslik' => 'Başarılı', 'icerik' => 'Haber Başarı İle Güncellendi.', 'durum' => 'success']);
        } catch (\Exception $e) {
            return response(['baslik' => 'Hatalı', 'icerik' => 'Haber Güncellenemedi.', 'durum' => 'error']);
        }
    }
}
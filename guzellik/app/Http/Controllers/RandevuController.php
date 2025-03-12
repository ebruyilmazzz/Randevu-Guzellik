<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Randevu;
use App\Models\Musteri;

class RandevuController extends Controller
{
    // Randevuları listele
    public function index()
    {
        $randevular = Randevu::all();
        return view('admin.randevular', compact('randevular'));
    }

    // Yeni randevu oluşturma formunu göster
    public function create()
    {
        $musteriler = Musteri::all();
        return view('admin.randevu_ekle', compact('musteriler'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tarih' => 'required|date',
        ]);
        
        $tarihSaat = strtotime($request->tarih);
        $tarih = date('Y-m-d', $tarihSaat); // Sadece tarih kısmını al
        $saat = date('H:i', $tarihSaat); // Sadece saat kısmını al
        
        Randevu::create([
            'musteriID' => Auth::id(),
            'tarih' => $tarih,
            'saat' => $saat, 
        ]);
    
        return redirect()->route('randevular.index')->with('success', 'Randevu başarıyla oluşturuldu.');
    }

    // Randevu düzenleme formunu göster
    public function edit($id)
    {
        $randevu = Randevu::findOrFail($id);
        $musteriler = Musteri::all();
        return view('admin.randevu_duzenle', compact('randevu', 'musteriler'));
    }

    // Randevuyu güncelle
    public function update(Request $request, $id)
    {
        $request->validate([
            'tarih' => 'required|date',
            'saat' => 'required|date_format:H:i',
        ]);

        $randevu = Randevu::findOrFail($id);
        $randevu->update($request->all());

        return redirect()->route('randevular.index')->with('success', 'Randevu başarıyla güncellendi.');
    }

    public function getRandevularByEmail($email)
{
    $randevular = Randevu::where('email', $email)
        ->orderBy('tarih', 'desc')
        ->orderBy('saat', 'desc')
        ->get();

    return view('admin.randevular', compact('randevular'));
}
    // Randevuyu sil
    public function destroy($id)
    {
        Randevu::findOrFail($id)->delete();
        return redirect()->route('randevular.index')->with('success', 'Randevu başarıyla silindi.');
    }
}

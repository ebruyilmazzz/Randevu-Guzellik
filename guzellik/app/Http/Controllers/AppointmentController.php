<?php

namespace App\Http\Controllers;

use App\Models\Randevu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }

    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('message', 'Randevu alabilmek için lütfen giriş yapın.');
        }

        $randevular = Randevu::where('email', Auth::user()->email)
            ->orderBy('tarih', 'desc')
            ->get();

        return view('appointment.index', compact('randevular'));
    }

    public function create()
    {
        return view('appointment.create');
    }

    public function store(Request $request)
    {
        try {
            $randevu = new Randevu();
            $randevu->email = Auth::user()->email;
            $randevu->tarih = $request->tarih;
            $randevu->durum = 'Aktif';
            $randevu->save();

            return redirect()->route('appointment.index')
                ->with('success', 'Randevu başarıyla oluşturuldu.');
        } catch (\Exception $e) {
            return redirect()->route('appointment.index')
                ->with('error', 'Randevu oluşturulurken bir hata oluştu.');
        }
    }

    public function show($id)
    {
        try {
            $randevu = Randevu::where('email', Auth::user()->email)
                ->where('id', $id)
                ->firstOrFail();

            return view('appointment.show', compact('randevu'));
        } catch (\Exception $e) {
            return redirect()->route('appointment.index')
                ->with('error', 'Randevu bulunamadı.');
        }
    }

    public function edit($id)
    {
        try {
            $randevu = Randevu::where('email', Auth::user()->email)
                ->where('id', $id)
                ->firstOrFail();

            return view('appointment.edit', compact('randevu'));
        } catch (\Exception $e) {
            return redirect()->route('appointment.index')
                ->with('error', 'Randevu bulunamadı.');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tarih' => 'required|date',
        ]);

        try {
            $randevu = Randevu::where('email', Auth::user()->email)
                ->where('id', $id)
                ->firstOrFail();

            $randevu->tarih = $request->tarih;
            $randevu->save();

            return redirect()->route('appointment.index')
                ->with('success', 'Randevu başarıyla güncellendi.');
        } catch (\Exception $e) {
            return redirect()->route('appointment.index')
                ->with('error', 'Randevu güncellenirken bir hata oluştu.');
        }
    }

    public function destroy($id)
    {
        try {
            $randevu = Randevu::where('email', Auth::user()->email)
                ->where('id', $id)
                ->firstOrFail();

            $randevu->delete();

            return redirect()->route('appointment.index')
                ->with('success', 'Randevu başarıyla iptal edildi.');
        } catch (\Exception $e) {
            return redirect()->route('appointment.index')
                ->with('error', 'Randevu silinirken bir hata oluştu.');
        }
    }
}

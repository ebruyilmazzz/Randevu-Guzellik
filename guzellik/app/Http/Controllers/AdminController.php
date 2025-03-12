<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Randevu;
use App\Models\User;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function dashboard()
    {
        $today = Carbon::today();
        
        $statistics = [
            'total_appointments' => Randevu::count(),
            'today_appointments' => Randevu::whereDate('tarih', $today)->count(),
            'active_appointments' => Randevu::where('durum', 'Aktif')->count(),
            'upcoming_appointments' => Randevu::where('tarih', '>', now())->count(),
        ];
        
        $latest_appointments = Randevu::with('user')
            ->orderBy('tarih', 'desc')
            ->take(5)
            ->get();
            
        return view('admin.dashboard', compact('statistics', 'latest_appointments'));
    }

    public function loginForm()
    {
        if (Auth::check() && Auth::user()->is_admin) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->is_admin) {
                $request->session()->regenerate();
                return redirect()->intended(route('admin.dashboard'));
            }
            Auth::logout();
            return back()->withErrors([
                'email' => 'Bu panele erişim yetkiniz bulunmamaktadır.',
            ])->onlyInput('email');
        }

        return back()->withErrors([
            'email' => 'Girdiğiniz bilgiler hatalı.',
        ])->onlyInput('email');
    }

    public function appointments(Request $request)
    {
        $query = Randevu::with('user')->orderBy('tarih', 'desc');

        // Apply filters
        if ($request->filled('durum')) {
            $query->where('durum', $request->durum);
        }

        if ($request->filled('date')) {
            $query->whereDate('tarih', $request->date);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->whereHas('user', function($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%");
                })->orWhere('email', 'like', "%{$search}%");
            });
        }

        $appointments = $query->paginate(10);
        
        return view('admin.appointments.index', compact('appointments'));
    }

    public function editAppointment($id)
    {
        $appointment = Randevu::with('user')->findOrFail($id);
        return view('admin.appointments.edit', compact('appointment'));
    }

    public function updateAppointment(Request $request, $id)
    {
        $request->validate([
            'tarih' => 'required|date',
            'durum' => 'required|in:Aktif,İptal,Tamamlandı',
            'email' => 'required|email'
        ]);

        $appointment = Randevu::findOrFail($id);
        $appointment->update([
            'tarih' => Carbon::parse($request->tarih),
            'durum' => $request->durum,
            'email' => $request->email
        ]);

        return redirect()->route('admin.appointments.index')
            ->with('success', 'Randevu başarıyla güncellendi.');
    }

    public function destroyAppointment($id)
    {
        $appointment = Randevu::findOrFail($id);
        $appointment->delete();

        return redirect()->route('admin.appointments.index')
            ->with('success', 'Randevu başarıyla silindi.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        Session::flush();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/');
    }
}

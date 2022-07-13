<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\{User, Meet, Skdp};
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function login(){
        return view('auth.login');
    }
    public function auth(Request $req){
        $credentials = $req->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials)) {
            $req->session()->regenerate();
            return redirect()->route('dashboard');
        }
        return back()->withErrors([
            'name' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    public function index(){
        $meets = DB::select('select count(id) as total, date_format(waktu, "%M") as bulan from meets where year(waktu) = year(now()) group by month(waktu)');
        $topskdps = DB::select('select count(meets.id) as skdpmeet, skdps.nama as nama from meets inner join skdps on meets.skdp_id = skdps.id group by meets.skdp_id order by count(meets.id) DESC');
        // return $topskdps;
        return view('admin.index', compact('meets','topskdps'));
    }
    public function logout(Request $request){
        Auth::logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}

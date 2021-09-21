<?php

namespace App\Http\Controllers;

use App\Models\Born;
use App\Models\Cormer;
use App\Models\Death;
use App\Models\FamilyCard;
use App\Models\Move;
use App\Models\Resident;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function home(){
        $resident = Resident::where('status','Hidup')->count();
        $family =   FamilyCard::get()->count();
        $move =   Move::get()->count();
        $cormer =  Cormer::get()->count();
        $born =  Cormer::get()->count();
        $death =  Death::get()->count();
        $age = Resident::first();
       
        $age = [
        'age1' => Resident::all()->whereBetween('age',[0,10])->count(),
        'age2' => Resident::all()->whereBetween('age',[11,20])->count(),
        'age3' => Resident::all()->whereBetween('age',[21,30])->count(),
        'age4' => Resident::all()->whereBetween('age',[31,40])->count(),
        'age5' => Resident::all()->whereBetween('age',[41,50])->count(),
        'age6' => Resident::all()->whereBetween('age',[51,60])->count(),
        'age7' => Resident::all()->whereBetween('age',[61,70])->count(),
        ];

        $move = Move::all()->count();
        $cormer = Cormer::all()->count();
        $death = Death::all()->count();
        $born = Born::all()->count();
       
        $label  = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
        $labelAgama  = ["Islam","Kristen","Buddha","Hindu","Dll"];
        $labelUmur  = ["1-10 Tahun","11-20 Tahun","21-30 Tahun","31-40 Tahun","41-50 Tahun","51-60 Tahun", "61-70 Tahun"];

         for($bulan=1;$bulan < 13;$bulan++){
            $chartDeath     = Death::whereMonth('created_at', $bulan)->count();
            $chartBorn     = Born::whereMonth('created_at', $bulan)->count();
            $chartMove     = Move::whereMonth('created_at', $bulan)->count();
            $chartCormer    = Cormer::whereMonth('created_at', $bulan)->count();

            $jumlah_death[] = $chartDeath;
            $jumlah_born[] = $chartBorn;
            $jumlah_come[] = $chartCormer;
            $jumlah_move[] = $chartMove;
        }
        
        
        $pie = [
            'pria' => Resident::where('gender','Pria')->count(),
            'wanita' => Resident::where('gender','Wanita')->count(),           
        ];
        
        $status = [
            'Nikah' => Resident::where('marital_status','Nikah')->count(),
            'Single' => Resident::where('marital_status','Single')->count(),           
            'Janda' => Resident::where('marital_status','Janda')->count(),
            'Duda' => Resident::where('marital_status','Duda')->count(),           
        ];

        $religion = [
            'Islam' => Resident::where('status','Hidup')->where('religion','Islam')->count(),
            'Kristen' => Resident::where('status','Hidup')->where('religion','Kristen')->count(),
            'Buddha' => Resident::where('status','Hidup')->where('religion','Buddha')->count(),
            'Hindu' => Resident::where('status','Hidup')->where('religion','Hindu')->count(),
            'Dll' => Resident::where('status','Hidup')->where('religion','Dll')->count(),
          
        ];
        // dd($religion);

        return view('Admin.Dashboard')->with([
            'resident' => $resident , 'family' => $family , 'move' => $move , 'cormer' => $cormer , 'born' => $born , 'death' => $death , 'pie' => $pie , 'status' => $status , 'religion' => $religion , 'age' => $age , 'move' => $move , 'cormer' => $cormer , 'label' => $label , 'labelAgama' => $labelAgama , 'labelUmur' => $labelUmur , 'jumlah_death' => $jumlah_death , 'jumlah_born' => $jumlah_born , 'jumlah_come' => $jumlah_come , 'jumlah_move' => $jumlah_move
          
        ]);
    }
    
    public function login(){
        
        return view('login');
    }

    public function authenticate(Request $request )
    {
        $credentials = request()->only(['email','password']);
        if(Auth::attempt($credentials)){
            
            $request->session()->regenerate();
            
            return redirect()->intended('/home');
        }

        return back()->with([
            'error' => 'gagal login'
        ]);
    }
    
    public function logout()
    {
        Auth::logout();

        return redirect()->intended('/login');
    }
}

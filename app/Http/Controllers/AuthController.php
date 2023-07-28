<?php

namespace App\Http\Controllers;

use App\Models\hotel;
use App\Models\role;
use App\Models\User;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function tampil()
    {
        $datauser = User::with('hotel')->with('role')->get();
        $datahotel = hotel::all();
        $datarole = role::all();
        return view('auth/index',compact('datauser','datahotel','datarole'));
    }
    public function register()
    {
        $datahotel = hotel::all();
        $datarole = role::all();
        return view('auth/register',compact('datahotel','datarole'));
    }

    public function registerSimpan(Request $request)
    {
        Validator::make($request->all(),[
            'role' => 'required',
            'hotel' => 'required',
            'nama' => 'required',
            'nohp' => 'required',
            'email' => 'required',
            'username' => 'required',
            'password' => 'required|confirmed',
        ])->validate();

        User::create([
            'id_role' => $request->role,
            'id_hotel' => $request->hotel,
            'nama' => $request->nama,
            'nohp' => $request->nohp,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            // 'level' => 'Admin'
        ]);
        
        return redirect('manajemenakun')->with('toast_success','Berhasil Tambah Akun');

    }
    public function tambahhotel()
    {
        return view('auth/tambah_hotel');
    }
    public function tambahhotelSimpan(Request $request)
    {
        hotel::create([
            'nama_hotel'=>$request->nama,
            'alamat_hotel'=>$request->alamat,
            'nohp_hotel'=>$request->nohp,
            'email_hotel'=>$request->email
        ]);
        return redirect('manajemenakun')->with('toast_success','Berhasil Tambah Hotel');
    }

    public function hoteledit($id)
    {
        $datahotel = hotel::findorfail($id);
        return view('auth/edit_hotel',compact('datahotel'));
    }

    public function hotelupdate(Request $request, $id)
    {
        // dd($request->all());
        $datahoteledit = hotel::findorfail($id);
        $datahoteledit->update($request->all());
        return redirect('manajemenakun')->with('toast_success','Data Berhasil Update');
    }
    public function hotelhapus($id)
    {
        $hpsdatahotel= hotel::findorfail($id);
        $hpsdatahotel->delete();
        return redirect('manajemenakun')->with('info','Data Berhasil Dihapus');
    }

    public function tambahrole()
    {
        // $datahotel = hotel::all();
        return view('auth/tambah_role');
    }
    public function tambahroleSimpan(Request $request)
    {
        role::create([
            // 'id_hotel'=>$request->id_hotel,
            'nama'=>$request->nama_role
        ]);
        return redirect('manajemenakun')->with('toast_success','Berhasil Role Hotel');
    }
    public function roleedit($id)
    {
        $datarole = role::findorfail($id);
        // $datahotel = hotel::all();
        return view('auth/edit_role',compact('datarole'));
    }
    public function roleupdate(Request $request, $id)
    {
        $dataroleedit = role::findorfail($id);
        $dataroleedit->update($request->all());
        return redirect('manajemenakun')->with('toast_success','Data Berhasil Update');
    }
    public function rolehapus($id)
    {
        $hpsdatarole= role::findorfail($id);
        $hpsdatarole->delete();
        return redirect('manajemenakun')->with('info','Data Berhasil Dihapus');
    }

    public function useredit($id)
    {
        $datahotel = hotel::all();
        $datarole = role::all();
        $datauser = user::with('hotel')->with('role')->findorfail($id);
        return view('auth/edit_user',compact('datauser','datahotel','datarole'));
    }

    public function userupdate(Request $request, $id)
    {
        // dd($request->all());
        $datauseredit = user::findorfail($id);
        $datauseredit->update($request->all());
        return redirect('manajemenakun')->with('toast_success','Data Berhasil Update');
    }
    public function userhapus($id)
    {
        $hpsdatauser= user::findorfail($id);
        $hpsdatauser->delete();
        return redirect('manajemenakun')->with('info','Data Berhasil Dihapus');
    }
    public function login()
    {
        return view ('auth/login');
    }
    public function loginAksi(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // Check if the provided login field is an email or username
        $loginField = filter_var($credentials['email'], FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $credentials[$loginField] = $credentials['email'];
        unset($credentials['email']);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            // Authentication passed...
            return redirect('dashboard'); // Change this to the desired redirect path after successful login
        }

        throw ValidationException::withMessages([
            'email' => trans('auth.failed'),
        ]);

    }
    // public function loginAksi(Request $request)
    // {
    //     Validator::make($request->all(),[
    //         'email'=>'required|email',
    //         'email'=>'required|email',
    //         'password'=>'required'
    //     ])->validate();

    //     if(!Auth::attempt($request->only('email','username'), $request->boolean('remember'))){
    //         throw ValidationException::withMessages([
    //             'email'=>trans('auth.failed')
    //         ]);
    //     }

    //     $request->session()->regenerate();

    //     return redirect()->route('dashboard');
    // }

    public function logout(request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        
        return redirect('/');
    }

    protected function credentials(Request $request)
    {
        $field = filter_var($request->get($this->username()), 
        FILTER_VALIDATE_EMAIL)? $this->username()
        : 'username';
        return[
            $field =>$request->get($this->username()),
            'password' =>$request->password,

        ];
    }
}

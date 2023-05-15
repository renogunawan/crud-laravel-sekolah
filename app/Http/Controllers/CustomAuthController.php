<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
 
class CustomAuthController extends Controller
{
    public function home()
    {
        return view('homepage');
    } 
 
    public function index()
    {
        return view('login');
    }  
       
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ],[
'email.required'=>'email tidak boleh kosong',
'password.required'=>'password tidak boleh kosong',
        ]);
    
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                        ->with('message', 'Signed in!');
        }
   
        return redirect('/login')->with('message', 'Username atau password tidak valid!');
    }
 
    public function signup()
    {
        return view('registration');
    }
       
    public function signupsave(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ],[
            'email.unique'=>'email sudah di gunakan',
'name.required'=>'ussername tidak boleh kosong',
'email.required'=>'email tidak boleh kosong',
'password.required'=>'password tidak boleh kosong'
        ]);
            
        $data = $request->all();
        $check = $this->create($data);
          
        return redirect("login")->with('success', 'registrasi berhasil!');
    }
 
    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }    
     
    public function dashboard()
    {
        if(Auth::check()){
            return view('dashboard');
        }
        return redirect('/login');
    }
     
    public function signOut() {
        Session::flush();
        Auth::logout();
   
        return redirect('/login');
    }
}
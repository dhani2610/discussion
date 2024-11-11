<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\JawabPertanyaan;
use App\Models\Materi;
use App\Models\Pertanyaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class BerandaController extends Controller
{
    public function index(){
        $data['page_title'] = 'Beranda';
        $data['materi_more'] = Materi::orderBy('created_at','desc')->where('status',1)->get()->take(5);
        $data['materi'] = Materi::orderBy('created_at', 'desc')->where('status',1)->get();
        return view('frontend.beranda.index', $data);
    }
    public function detail($slug){
        $data['materi'] = Materi::where('slug',$slug)->first();
        $data['page_title'] = 'Materi | '.$data['materi']->judul;
        $data['materi_more'] = Materi::whereNotIn('slug',[$slug])->where('status',1)->orderBy('created_at','desc')->get()->take(5);
        $data['materi_more_limit'] = Materi::whereNotIn('slug',[$slug])->where('status',1)->orderBy('created_at','desc')->get()->take(5);
        $data['pertanyaan'] = Pertanyaan::where('id_materi',$data['materi']->id)->orderBy('created_at','asc')->get();
        return view('frontend.beranda.detail', $data);
    }
    public function jawab($slug,$id){
        $data['materi'] = Materi::where('slug',$slug)->first();
        $data['page_title'] = 'Materi | '.$data['materi']->judul;
        $data['materi_more'] = Materi::whereNotIn('slug',[$slug])->where('status',1)->orderBy('created_at','desc')->get()->take(5);
        $data['materi_more_limit'] = Materi::whereNotIn('slug',[$slug])->where('status',1)->orderBy('created_at','desc')->get()->take(5);
        $data['pertanyaan'] = Pertanyaan::find($id);
        $data['jawaban'] = JawabPertanyaan::where('id_pertanyaan',$id)->orderBy('created_at','desc')->get();
        return view('frontend.beranda.jawab', $data);
    }

    public function store(Request $request)
    {
        try {
            $data = new JawabPertanyaan();
            $data->id_user = Auth::guard('admin')->user()->id;
            $data->jawaban = $request->jawaban;
            $data->id_pertanyaan = $request->id_pertanyaan;
            $data->save();

            return response()->json(['success' => true]);
        } catch (\Throwable $th) {
            return response()->json(
                ['success' => false, 'message' => $th->getMessage()]);
        }
    }

    public function update(Request $request,$id)
    {
        try {
            $data = JawabPertanyaan::find($id);
            $data->id_user = Auth::guard('admin')->user()->id;
            $data->jawaban = $request->jawaban;
            $data->id_pertanyaan = $request->id_pertanyaan;
            $data->save();

            return response()->json(['success' => true]);
            return redirect()->back();
        } catch (\Throwable $th) {
            return response()->json(
                ['success' => false, 'message' => $th->getMessage()]);
        }
    }

    public function register(){
        $data['page_title'] = 'Register';
        return view('backend.auth.register', $data);
    }

    public function registerStore(Request $request){
         try {
            $request->validate([
               'name' => 'required|max:50',
               'email' => 'required|max:100|email|unique:admins',
               'username' => 'required|max:100|unique:admins',
               'password' => 'required|min:6',
           ]);
   
           // Create New Admin
           $admin = new Admin();
           $admin->name = $request->name;
           $admin->username = $request->username;
           $admin->email = $request->email;
           $admin->password = Hash::make($request->password);
           $admin->save();
   
           if ($request->roles) {
               $admin->assignRole('user');
           }
   
           session()->flash('success', 'Register berhasil.');
           return redirect('admin/login');
         } catch (\Throwable $th) {
            session()->flash('failed', $th->getMessage());
            return redirect('admin/register');
         }
    }
}

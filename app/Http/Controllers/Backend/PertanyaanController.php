<?php

namespace App\Http\Controllers\Backend;

use App\Models\Pertanyaan;
use App\Http\Controllers\Controller;
use App\Models\Materi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PertanyaanController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }

    public function index($id)
    {
        $data['page_title'] = 'Pertanyaan';
        $data['materi'] = Materi::find($id);
        $data['pertanyaan'] = Pertanyaan::where('id_materi',$id)->orderBy('created_at', 'desc')->get();
        
        return view('backend.pages.pertanyaan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $data['page_title'] = 'Pertanyaan';
        $data['materi'] = Materi::find($id);
        
        return view('backend.pages.pertanyaan.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,$id)
    {
        try {
            $data = new Pertanyaan();
            $data->id_user = Auth::guard('admin')->user()->id;
            $data->id_materi = $id;
            $data->pertanyaan = $request->pertanyaan;
            $data->save();

            session()->flash('success', 'Data Berhasil Disimpan!');
            return redirect()->route('pertanyaan',$id);
        } catch (\Throwable $th) {
            session()->flash('failed', $th->getMessage());
            return redirect()->route('pertanyaan',$id);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Pertanyaan $pertanyaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id,$id_materi)
    {
        $data['page_title'] = 'Pertanyaan';
        $data['materi'] = Materi::find($id_materi);
        $data['pertanyaan'] = Pertanyaan::find($id);
        
        return view('backend.pages.pertanyaan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id,$id_materi)
    {
        try {
            $data = Pertanyaan::find($id);
            $data->id_materi = $id_materi;
            $data->pertanyaan = $request->pertanyaan;
            $data->save();

            session()->flash('success', 'Data Berhasil Disimpan!');
            return redirect()->route('pertanyaan',$id_materi);
        } catch (\Throwable $th) {
            session()->flash('failed', $th->getMessage());
            return redirect()->route('pertanyaan',$id_materi);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id,$id_materi)
    {
        try {
            $data = Pertanyaan::find($id);
            $data->delete();

            session()->flash('success', 'Data Berhasil Disimpan!');
            return redirect()->route('pertanyaan',$id_materi);
        } catch (\Throwable $th) {
            session()->flash('failed', $th->getMessage());
            return redirect()->route('pertanyaan',$id_materi);
        }
    }
}

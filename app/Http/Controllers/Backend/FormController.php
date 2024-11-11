<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Form;
use App\Exports\DataExport;
use App\Exports\DataExportPHBS;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class FormController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }

    public function index(Request $request)
    {
        $data['page_title'] = 'Monitoring';
        $userRole = Auth::guard('admin')->user()->getRoleNames()->first(); // Get the first role name
        $id_user = $this->user->id;

        $desa_kelurahan = $request->desa_kelurahan;
        $id_petugas = $request->petugas_id;
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        
        if ($id_petugas != null) {
            $data['monitoring'] = Form::orderBy('tanggal_monitoring', 'desc')
                ->where(function ($query) use ($userRole,$id_user,$id_petugas,$start_date,$end_date,$desa_kelurahan) {
                    if ($id_petugas != null) {
                        if ($id_petugas != 'all') {
                            $query->where('id_user',$id_petugas);
                        }
                    }else{
                        if ($userRole != 'superadmin') {
                            $query->where('id_user',$id_user);
                        }
                    }
                    if ($desa_kelurahan != null) {
                        if ($desa_kelurahan != 'all') {
                            $query->where('desa_kelurahan',$desa_kelurahan);
                        }
                    }

                    // if (!empty($start_date) && !empty($end_date)) {
                    //     $query->whereBetween('tanggal_monitoring', [$start_date, $end_date]);
                    // }
                })->get();
    
        }else{
            $data['monitoring'] = [];
        }

        
        $data['user'] = Admin::where(function ($query) use ($userRole,$id_user) {
            if ($userRole != 'superadmin') {
                $query->where('id',$id_user);
            }
        })->where('name','!=','Super Admin')->get();

        return view('backend.pages.monitoring.index', $data);
    }

    public function phbs(Request $request)
    {
        $data['page_title'] = 'Monitoring';
        $userRole = Auth::guard('admin')->user()->getRoleNames()->first(); // Get the first role name
        $id_user = $this->user->id;

        $desa_kelurahan = $request->desa_kelurahan;
        $id_petugas = $request->petugas_id;
        $dusun_posyandu = $request->dusun_posyandu;
        $rt = $request->rt;
        
        if ($id_petugas != null) {
            $data['monitoring'] = Form::orderBy('tanggal_monitoring', 'desc')
                ->where(function ($query) use ($userRole,$id_user,$id_petugas,$dusun_posyandu,$rt,$desa_kelurahan) {
                    if ($id_petugas != null) {
                        if ($id_petugas != 'all') {
                            $query->where('id_user',$id_petugas);
                        }
                    }else{
                        if ($userRole != 'superadmin') {
                            $query->where('id_user',$id_user);
                        }
                    }
                    if ($desa_kelurahan != null) {
                        if ($desa_kelurahan != 'all') {
                            $query->where('desa_kelurahan',$desa_kelurahan);
                        }
                    }

                    // if ($dusun_posyandu != null) {
                    //     $query->where('dusun_posyandu',$dusun_posyandu);
                    // }
                    // if ($dusun_posyandu != null) {
                    //     $query->where('rt',$rt);
                    // }

                })->get();
    
        }else{
            $data['monitoring'] = [];
        }

        
        $data['user'] = Admin::where(function ($query) use ($userRole,$id_user) {
            if ($userRole != 'superadmin') {
                $query->where('id',$id_user);
            }
        })->where('name','!=','Super Admin')->get();

        return view('backend.pages.monitoring.phbs', $data);
    }

    public function tablehtml(){
        $data['monitoring'] = Form::orderBy('created_at', 'desc')->get();
        return view('backend.pages.monitoring.tablehtml',$data);
    }
    public function tablehtmlPhbs(){
        $data['monitoring'] = Form::orderBy('created_at', 'desc')->get();
        return view('backend.pages.monitoring.tablehtmlPhbs',$data);
    }

    public function export(Request $request)
    {
        $data['page_title'] = 'Monitoring';
        $userRole = Auth::guard('admin')->user()->getRoleNames()->first(); // Get the first role name
        $id_user = $this->user->id;

        $desa_kelurahan = $request->desa_kelurahan;
        $id_petugas = $request->petugas_id;
        $start_date = $request->start_date;
        $end_date = $request->end_date;

        $monitoring = Form::orderBy('tanggal_monitoring', 'desc')
        ->where(function ($query) use ($userRole,$id_user,$id_petugas,$start_date,$end_date,$desa_kelurahan) {
            if ($id_petugas != null) {
                if ($id_petugas != 'all') {
                    $query->where('id_user',$id_petugas);
                }
            }else{
                if ($userRole != 'superadmin') {
                    $query->where('id_user',$id_user);
                }
            }

            if ($desa_kelurahan != null) {
                if ($desa_kelurahan != 'all') {
                    $query->where('desa_kelurahan',$desa_kelurahan);
                }
            }

            // if (!empty($start_date) && !empty($end_date)) {
            //     $query->whereBetween('tanggal_monitoring', [$start_date, $end_date]);
            // }
        })->get();

        $data['user'] = Admin::where(function ($query) use ($userRole,$id_user) {
            if ($userRole != 'superadmin') {
                $query->where('id',$id_user);
            }
        })->get();

        $name = 'Report Monitoring - '.date('d-m-y H:i:s').'.xlsx';
        return Excel::download(new DataExport($monitoring), $name);
    }

    public function exportPhbs(Request $request)
    {
        $data['page_title'] = 'Monitoring';
        $userRole = Auth::guard('admin')->user()->getRoleNames()->first(); // Get the first role name
        $id_user = $this->user->id;

        $desa_kelurahan = $request->desa_kelurahan;
        $id_petugas = $request->petugas_id;
        $dusun_posyandu = $request->dusun_posyandu;
        $rt = $request->rt;
        
        if ($id_petugas != null) {
            $monitoring = Form::orderBy('tanggal_monitoring', 'desc')
                ->where(function ($query) use ($userRole,$id_user,$id_petugas,$dusun_posyandu,$rt,$desa_kelurahan) {
                    if ($id_petugas != null) {
                        if ($id_petugas != 'all') {
                            $query->where('id_user',$id_petugas);
                        }
                    }else{
                        if ($userRole != 'superadmin') {
                            $query->where('id_user',$id_user);
                        }
                    }
                    if ($desa_kelurahan != null) {
                        if ($desa_kelurahan != 'all') {
                            $query->where('desa_kelurahan',$desa_kelurahan);
                        }
                    }

                    // if ($dusun_posyandu != null) {
                    //     $query->where('dusun_posyandu',$dusun_posyandu);
                    // }
                    // if ($dusun_posyandu != null) {
                    //     $query->where('rt',$rt);
                    // }

                })->get();
    
        }else{
            $monitoring = [];
        }

        $data['user'] = Admin::where(function ($query) use ($userRole,$id_user) {
            if ($userRole != 'superadmin') {
                $query->where('id',$id_user);
            }
        })->get();

        $name = 'Report Monitoring - '.date('d-m-y H:i:s').'.xlsx';
        return Excel::download(new DataExportPHBS($monitoring), $name);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['page_title'] = 'Tambah Data Monitoring';
        return view('backend.pages.monitoring.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       

        try {
            $data = new Form();

            $data->id_user = Auth::guard('admin')->user()->id;
            $data->tanggal_monitoring = $request->tanggal_monitoring;
            $data->nama_petugas = $request->nama_petugas;
            $data->latitude = $request->latitude;
            $data->longtitude = $request->longtitude; 
            $data->no_kk = $request->no_kk;
            $data->nama_kepala_keluarga = $request->nama_kepala_keluarga;
            $data->alamat = $request->alamat;
            $data->rt = $request->rt;
            $data->rw = $request->rw;
            $data->jumlah_jiwa = $request->jumlah_jiwa;
            $data->jumlah_jiwa_menetap = $request->jumlah_jiwa_menetap;
            $data->desa_kelurahan = $request->desa_kelurahan;

            for ($i = 1; $i <= 5; $i++) {
                for ($j = 1; $j <= 16; $j++) {
                    $questionKey = "pertanyaan_{$j}_pilar_{$i}";
                    if ($request->has($questionKey)) {
                        $data->$questionKey = $request->$questionKey;
                    }
                }
            }

            $data->dusun_posyandu = $request->dusun_posyandu;

            for ($i = 1; $i <= 17; $i++) {
                $questionKey = "pertanyaan_phbs_{$i}";
                if ($request->has($questionKey)) {
                    $data->$questionKey = $request->$questionKey;
                }
            }

            // Save the model
            $data->save();

            // Flash success message
            session()->flash('success', 'Data Berhasil Disimpan!');
            return redirect()->route('monitoring');
        } catch (\Throwable $th) {
            // Flash failure message
            session()->flash('failed', 'Data gagal disimpan!');
            return redirect()->route('monitoring');
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Form $form)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data['page_title'] = 'Edit Monitoring';
        $data['monitoring'] = Form::find($id);
        return view('backend.pages.monitoring.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $data = Form::find($id);

            $data->tanggal_monitoring = $request->tanggal_monitoring;
            $data->nama_petugas = $request->nama_petugas;
            $data->latitude = $request->latitude;
            $data->longtitude = $request->longtitude; 
            $data->no_kk = $request->no_kk;
            $data->nama_kepala_keluarga = $request->nama_kepala_keluarga;
            $data->alamat = $request->alamat;
            $data->rt = $request->rt;
            $data->rw = $request->rw;
            $data->jumlah_jiwa = $request->jumlah_jiwa;
            $data->jumlah_jiwa_menetap = $request->jumlah_jiwa_menetap;
            $data->desa_kelurahan = $request->desa_kelurahan;

            for ($i = 1; $i <= 5; $i++) {
                for ($j = 1; $j <= 16; $j++) {
                    $questionKey = "pertanyaan_{$j}_pilar_{$i}";
                    if ($request->has($questionKey)) {
                        $data->$questionKey = $request->$questionKey;
                    }
                }
            }

            $data->dusun_posyandu = $request->dusun_posyandu;

            for ($i = 1; $i <= 17; $i++) {
                $questionKey = "pertanyaan_phbs_{$i}";
                if ($request->has($questionKey)) {
                    $data->$questionKey = $request->$questionKey;
                }
            }

            // Save the model
            $data->save();

            // Flash success message
            session()->flash('success', 'Data berhasil disimpan!');
            return redirect()->route('monitoring');
        } catch (\Throwable $th) {
            session()->flash('failed', 'Data gagal disimpan!');
            return redirect()->route('monitoring');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $data = Form::find($id);
            $data->delete();

            session()->flash('success', 'Data berhasil dihapus!');
            return redirect()->route('monitoring');
        } catch (\Throwable $th) {
            session()->flash('failed', 'Data gagal dihapus!');
            return redirect()->route('monitoring');
        }
    }
}

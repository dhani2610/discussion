@extends('backend.layouts-new.app')

@section('content')

<style>
  .form-check-label {
      text-transform: capitalize;
  }
  .select2{
    width: 100%!important
  }
  label{
    float: left;
  }
    label {
        text-transform: uppercase;
        float: left;
        color: black;
        font-weight: 600;
        margin-bottom: 10px;
    }
    .header-title {
        text-transform: uppercase;
        color: black;
        font-weight: 800;
    }

    .card hr {
        color: black!important;
    }
    .form-control {
        border: var(--bs-border-width) solid black!important;
    }
</style>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<div class="main-content-inner">
    @include('backend.layouts.partials.messages')

    <div class="row">
        <!-- data table start -->
        <form action="{{ route('monitoring.store') }}" method="POST">
            @csrf
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">

                    <hr>
                    <h4 class="header-title text-center">Data Monitoring</h4>
                    <hr>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-row">
                                <div class="form-group col-md-12 col-sm-12">
                                    <label for="name">Tanggal Monitoring</label>
                                    <input required type="date" class="form-control" id="tanggal_monitoring" name="tanggal_monitoring" placeholder="" value="">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-row">
                                <div class="form-group col-md-12 col-sm-12">
                                    <label for="name">Nama Petugas Moniver</label>
                                    <input required type="text" value="{{ Auth::guard('admin')->user()->name }}" class="form-control" id="nama_petugas" name="nama_petugas" placeholder="" value="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-lg-6">
                            <div class="form-row">
                                <div class="form-group col-md-12 col-sm-12">
                                    <label for="name">Latitude</label>
                                    <input type="text" class="form-control" id="latitude" name="latitude" placeholder="" value="">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-row">
                                <div class="form-group col-md-12 col-sm-12">
                                    <label for="name">Longtitude</label>
                                    <input type="text" value="" class="form-control" id="longtitude" name="longtitude" placeholder="" value="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <h4 class="header-title text-center mt-3">Data Keluarga</h4>
                    <hr>
                    

                    <div class="row mt-3">
                        <div class="col-lg-6">
                            <div class="form-row">
                                <div class="form-group col-md-12 col-sm-12">
                                    <label for="name">No. Kartu Keluarga</label>
                                    <input required type="text" class="form-control" id="no_kk" name="no_kk" placeholder="" value="">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-row">
                                <div class="form-group col-md-12 col-sm-12">
                                    <label for="name">Nama Kepala Keluarga</label>
                                    <input required type="text" value="" class="form-control" id="nama_kepala_keluarga" name="nama_kepala_keluarga" placeholder="" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                 

                    <div class="row mt-3">
                        <div class="col-lg-6">
                            <div class="form-row">
                                <div class="form-group col-md-12 col-sm-12">
                                    <label for="name">Alamat</label>
                                    <input required type="text" class="form-control" id="alamat" name="alamat" placeholder="" value="">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-row">
                                <div class="form-group col-md-12 col-sm-12">
                                    <label for="name">RT</label>
                                    <input required type="number" value="" class="form-control" id="rt" name="rt" placeholder="" value="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-lg-6">
                            <div class="form-row">
                                <div class="form-group col-md-12 col-sm-12">
                                    <label for="name">RW</label>
                                    <input required type="number" class="form-control" id="rw" name="rw" placeholder="" value="">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-row">
                                <div class="form-group col-md-12 col-sm-12">
                                    <label for="name">Jumlah Jiwa</label>
                                    <input required type="number" value="" class="form-control" id="jumlah_jiwa" name="jumlah_jiwa" placeholder="" value="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-lg-6">
                            <div class="form-row">
                                <div class="form-group col-md-12 col-sm-12">
                                    <label for="name">Jumlah Jiwa Menetap</label>
                                    <input required type="number" class="form-control" id="jumlah_jiwa_menetap" name="jumlah_jiwa_menetap" placeholder="" value="">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-row">
                                <div class="form-group col-md-12 col-sm-12">
                                    <label for="name">Desa / Kelurahan</label>
                                    <select name="desa_kelurahan" id="" class="form-control" required>
                                        <option selected disabled>-- Pilih --</option>
                                        <option value="Desa Bojongsari">Desa Bojongsari</option>
                                        <option value="Desa Cikuya">Desa Cikuya</option>
                                        <option value="Desa Cintabodas">Desa Cintabodas</option>
                                        <option value="Desa Mekarlaksana">Desa Mekarlaksana</option>
                                        <option value="Desa Cipicung">Desa Cipicung</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <h4 class="header-title text-center mt-3">Pertanyaan Pengamatan Pilar 1</h4>
                    <hr>

                    <div class="row mt-3">
                        <div class="col-lg-6">
                            <div class="form-row">
                                <div class="form-group col-md-12 col-sm-12">
                                    <label for="name">Buang Air Besar Di Jamban</label>
                                    <select name="pertanyaan_1_pilar_1" id="" class="form-control" required>
                                        <option selected disabled>-- Pilih --</option>
                                        <option value="Ya">Ya</option>
                                        <option value="Tidak">Tidak</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-row">
                                <div class="form-group col-md-12 col-sm-12">
                                    <label for="name">Jamban Milik Sendiri</label>
                                    <select name="pertanyaan_2_pilar_1" id="" class="form-control" required>
                                        <option selected disabled>-- Pilih --</option>
                                        <option value="Ya">Ya</option>
                                        <option value="Tidak">Tidak</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <h4 class="header-title text-center mt-3">Bangunan Bawah (Pilih Hanya Satu)</h4>
                    <hr>

                    <div class="row mt-3">
                        <div class="col-lg-6">
                            <div class="form-row">
                                <div class="form-group col-md-12 col-sm-12">
                                    <label for="name">Tangki septik disedot setidaknya sekali dalam 3-5 tahun terakhir atau disalurkan ke Sistem Pengolahan Air Limbah Domestik (SPALD)</label>
                                    <select name="pertanyaan_3_pilar_1" id="" class="form-control" required>
                                        <option selected disabled>-- Pilih --</option>
                                        <option value="Ya">Ya</option>
                                        <option value="Tidak">Tidak</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-row">
                                <div class="form-group col-md-12 col-sm-12">
                                    <label for="name">Tangki septik yang tidak pernah disedot, atau disedot lebih dari 5 tahun terakhir, atau termasuk rumah baru dibangun</label>
                                    <select name="pertanyaan_4_pilar_1" id="" class="form-control" required>
                                        <option selected disabled>-- Pilih --</option>
                                        <option value="Ya">Ya</option>
                                        <option value="Tidak">Tidak</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-lg-6">
                            <div class="form-row">
                                <div class="form-group col-md-12 col-sm-12">
                                    <label for="name">Cubluk / Lubang Tanah</label>
                                    <select name="pertanyaan_5_pilar_1" id="" class="form-control" required>
                                        <option selected disabled>-- Pilih --</option>
                                        <option value="Ya">Ya</option>
                                        <option value="Tidak">Tidak</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-row">
                                <div class="form-group col-md-12 col-sm-12">
                                    <label for="name">Dibuang langsung ke drainase/kolam/ sawah/ sungai/danau/laut dan pantai/ tanah lapang/kebun</label>
                                    <select name="pertanyaan_6_pilar_1" id="" class="form-control" required>
                                        <option selected disabled>-- Pilih --</option>
                                        <option value="Ya">Ya</option>
                                        <option value="Tidak">Tidak</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-6">
                            <div class="form-row">
                                <div class="form-group col-md-12 col-sm-12">
                                    <label for="name">Kloset Leher Angsa/Teknologi lain yang mencegah vektor dan binatang pengganggu masuk</label>
                                    <select name="pertanyaan_7_pilar_1" id="" class="form-control" required>
                                        <option selected disabled>-- Pilih --</option>
                                        <option value="Ya">Ya</option>
                                        <option value="Tidak">Tidak</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                    </div>

                    <hr>
                    <h4 class="header-title text-center mt-3">Pertanyaan Pengamatan Pilar 2</h4>
                    <hr>

                    <h4 class="header-title text-left mt-3">Fisik CTPS</h4>
                    <div class="row mt-3">

                        <div class="col-lg-6">
                            <div class="form-row">
                                <div class="form-group col-md-12 col-sm-12">
                                    <label for="name">Memiliki Sarana</label>
                                    <select name="pertanyaan_1_pilar_2" id="" class="form-control" required>
                                        <option selected disabled>-- Pilih --</option>
                                        <option value="Ya">Ya</option>
                                        <option value="Tidak">Tidak</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-row">
                                <div class="form-group col-md-12 col-sm-12">
                                    <label for="name">Memiliki Air Mengalir</label>
                                    <select name="pertanyaan_2_pilar_2" id="" class="form-control" required>
                                        <option selected disabled>-- Pilih --</option>
                                        <option value="Ya">Ya</option>
                                        <option value="Tidak">Tidak</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                 

                    <div class="row mt-3">
                        <div class="col-lg-6">
                            <div class="form-row">
                                <div class="form-group col-md-12 col-sm-12">
                                    <label for="name">Memiliki Sabun</label>
                                    <select name="pertanyaan_3_pilar_2" id="" class="form-control" required>
                                        <option selected disabled>-- Pilih --</option>
                                        <option value="Ya">Ya</option>
                                        <option value="Tidak">Tidak</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-row">
                                <div class="form-group col-md-12 col-sm-12">
                                    <label for="name">Mampu mempraktekkan cara cuci tangan pakai sabun</label>
                                    <select name="pertanyaan_4_pilar_2" id="" class="form-control" required>
                                        <option selected disabled>-- Pilih --</option>
                                        <option value="Ya">Ya</option>
                                        <option value="Tidak">Tidak</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h4 class="header-title text-left mt-3">Mengetahui waktu-waktu kritis cuci tangan pakai sabun (Minimal dapat menjawab 3 waktu kritis)</h4>

                    <div class="row mt-3">
                        <div class="col-lg-6">
                            <div class="form-row">
                                <div class="form-group col-md-12 col-sm-12">
                                    <label for="name">Sebelum makan</label>
                                    <select name="pertanyaan_5_pilar_2" id="" class="form-control" required>
                                        <option selected disabled>-- Pilih --</option>
                                        <option value="Ya">Ya</option>
                                        <option value="Tidak">Tidak</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-row">
                                <div class="form-group col-md-12 col-sm-12">
                                    <label for="name">Sebelum mengolah dan menghidangkan makanan</label>
                                    <select name="pertanyaan_6_pilar_2" id="" class="form-control" required>
                                        <option selected disabled>-- Pilih --</option>
                                        <option value="Ya">Ya</option>
                                        <option value="Tidak">Tidak</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-lg-6">
                            <div class="form-row">
                                <div class="form-group col-md-12 col-sm-12">
                                    <label for="name">Sebelum menyusui anak, Sebelum memberi makan bayi / Balita</label>
                                    <select name="pertanyaan_7_pilar_2" id="" class="form-control" required>
                                        <option selected disabled>-- Pilih --</option>
                                        <option value="Ya">Ya</option>
                                        <option value="Tidak">Tidak</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-row">
                                <div class="form-group col-md-12 col-sm-12">
                                    <label for="name">Setelah BAB /Kecil</label>
                                    <select name="pertanyaan_8_pilar_2" id="" class="form-control" required>
                                        <option selected disabled>-- Pilih --</option>
                                        <option value="Ya">Ya</option>
                                        <option value="Tidak">Tidak</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <h4 class="header-title text-center mt-3">Pertanyaan Pengamatan Pilar 3</h4>
                    <hr>

                    <hr>
                    <h4 class="header-title text-center mt-3">Layak</h4>
                    <hr>

                    <div class="row mt-3">
                        <div class="col-lg-6">
                            <div class="form-row">
                                <div class="form-group col-md-12 col-sm-12">
                                    <label for="name">Layak : Perpipaan</label>
                                    <select name="pertanyaan_1_pilar_3" id="" class="form-control" required>
                                        <option selected disabled>-- Pilih --</option>
                                        <option value="Ya">Ya</option>
                                        <option value="Tidak">Tidak</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-row">
                                <div class="form-group col-md-12 col-sm-12">
                                    <label for="name">Layak : Kran Umum</label>
                                    <select name="pertanyaan_2_pilar_3" id="" class="form-control" required>
                                        <option selected disabled>-- Pilih --</option>
                                        <option value="Ya">Ya</option>
                                        <option value="Tidak">Tidak</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-lg-6">
                            <div class="form-row">
                                <div class="form-group col-md-12 col-sm-12">
                                    <label for="name">Layak : Sumur Bor / Pompa / Sumur Gali Yang Terlindungi</label>
                                    <select name="pertanyaan_3_pilar_3" id="" class="form-control" required>
                                        <option selected disabled>-- Pilih --</option>
                                        <option value="Ya">Ya</option>
                                        <option value="Tidak">Tidak</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-row">
                                <div class="form-group col-md-12 col-sm-12">
                                    <label for="name">Layak : Mata Air Terlindung</label>
                                    <select name="pertanyaan_4_pilar_3" id="" class="form-control" required>
                                        <option selected disabled>-- Pilih --</option>
                                        <option value="Ya">Ya</option>
                                        <option value="Tidak">Tidak</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-lg-6">
                            <div class="form-row">
                                <div class="form-group col-md-12 col-sm-12">
                                    <label for="name">Layak : Air Hujan</label>
                                    <select name="pertanyaan_5_pilar_3" id="" class="form-control" required>
                                        <option selected disabled>-- Pilih --</option>
                                        <option value="Ya">Ya</option>
                                        <option value="Tidak">Tidak</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <h4 class="header-title text-center mt-3">Tidak Layak</h4>
                    <hr>

                    <div class="row mt-3">
                        <div class="col-lg-6">
                            <div class="form-row">
                                <div class="form-group col-md-12 col-sm-12">
                                    <label for="name">Tidak Layak : Sungai / Mata Air Tidak Terlindungi</label>
                                    <select name="pertanyaan_6_pilar_3" id="" class="form-control" required>
                                        <option selected disabled>-- Pilih --</option>
                                        <option value="Ya">Ya</option>
                                        <option value="Tidak">Tidak</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-row">
                                <div class="form-group col-md-12 col-sm-12">
                                    <label for="name">Tidak Layak : Danau / Kolam / Sumur Gali Tidak Terlindungi</label>
                                    <select name="pertanyaan_7_pilar_3" id="" class="form-control" required>
                                        <option selected disabled>-- Pilih --</option>
                                        <option value="Ya">Ya</option>
                                        <option value="Tidak">Tidak</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-lg-6">
                            <div class="form-row">
                                <div class="form-group col-md-12 col-sm-12">
                                    <label for="name">Tidak Layak : Waduk</label>
                                    <select name="pertanyaan_8_pilar_3" id="" class="form-control" required>
                                        <option selected disabled>-- Pilih --</option>
                                        <option value="Ya">Ya</option>
                                        <option value="Tidak">Tidak</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-row">
                                <div class="form-group col-md-12 col-sm-12">
                                    <label for="name">Tidak Layak : Kolam</label>
                                    <select name="pertanyaan_9_pilar_3" id="" class="form-control" required>
                                        <option selected disabled>-- Pilih --</option>
                                        <option value="Ya">Ya</option>
                                        <option value="Tidak">Tidak</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-lg-6">
                            <div class="form-row">
                                <div class="form-group col-md-12 col-sm-12">
                                    <label for="name">Tidak Layak : Irigasi</label>
                                    <select name="pertanyaan_10_pilar_3" id="" class="form-control" required>
                                        <option selected disabled>-- Pilih --</option>
                                        <option value="Ya">Ya</option>
                                        <option value="Tidak">Tidak</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <h4 class="header-title text-center mt-3">Pengelolaan Air</h4>
                    <hr>

                    
                    <div class="row mt-3">
                        <div class="col-lg-6">
                            <div class="form-row">
                                <div class="form-group col-md-12 col-sm-12">
                                    <label for="name">Yang melalui proses pengolahan (misal : merebus, klorin cair/klorin padat, UV, sodis, Filtrasi, keramik filter, RO)</label>
                                    <select name="pertanyaan_11_pilar_3" id="" class="form-control" required>
                                        <option selected disabled>-- Pilih --</option>
                                        <option value="Ya">Ya</option>
                                        <option value="Tidak">Tidak</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-row">
                                <div class="form-group col-md-12 col-sm-12">
                                    <label for="name">Jika air baku keruh dilakukan pengolahan, seperti : pengendapan atau penyaringan</label>
                                    <select name="pertanyaan_12_pilar_3" id="" class="form-control" required>
                                        <option selected disabled>-- Pilih --</option>
                                        <option value="Ya">Ya</option>
                                        <option value="Tidak">Tidak</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mt-3">
                        <div class="col-lg-12">
                            <div class="form-row">
                                <div class="form-group col-md-12 col-sm-12">
                                    <label for="name">Menyimpan air minum di dalam wadah yang tertutup rapat, kuat, terbuat dari bahan stainless steel, keramik, kaca dan jika terbuat dari plastik tanda gelas dan garpu) dan diambil dengan cara yang aman (tidak tersentuh tangan atau mulut)</label>
                                    <select name="pertanyaan_13_pilar_3" id="" class="form-control" required>
                                        <option selected disabled>-- Pilih --</option>
                                        <option value="Ya">Ya</option>
                                        <option value="Tidak">Tidak</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <h4 class="header-title text-center mt-3">Pengelolaan Pangan Aman</h4>
                    <hr>
                     
                    <div class="row mt-3">
                        <div class="col-lg-6">
                            <div class="form-row">
                                <div class="form-group col-md-12 col-sm-12">
                                    <label for="name">pangan tertutup dengan baik dengan penutup yang bersih </label>
                                    <select name="pertanyaan_14_pilar_3" id="" class="form-control" required>
                                        <option selected disabled>-- Pilih --</option>
                                        <option value="Ya">Ya</option>
                                        <option value="Tidak">Tidak</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-row">
                                <div class="form-group col-md-12 col-sm-12">
                                    <label for="name">pangan tidak berdekatan bahan berbahaya dan beracun (deterjen, pestisida, cairan obat nyamuk, dan sejenisnya)</label>
                                    <select name="pertanyaan_15_pilar_3" id="" class="form-control" required>
                                        <option selected disabled>-- Pilih --</option>
                                        <option value="Ya">Ya</option>
                                        <option value="Tidak">Tidak</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-lg-6">
                            <div class="form-row">
                                <div class="form-group col-md-12 col-sm-12">
                                    <label for="name">melakukan praktik penanganan pangan yang baik dan benar, sesuai 5 Kunci Keamanan Pangan </label>
                                    <select name="pertanyaan_16_pilar_3" id="" class="form-control" required>
                                        <option selected disabled>-- Pilih --</option>
                                        <option value="Ya">Ya</option>
                                        <option value="Tidak">Tidak</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                    </div>

                    <hr>
                    <h4 class="header-title text-center mt-3">Pertanyaan Pengamatan Pilar 4</h4>
                    <hr>

                    <div class="row mt-3">
                        <div class="col-lg-6">
                            <div class="form-row">
                                <div class="form-group col-md-12 col-sm-12">
                                    <label for="name">Tidak ada sampah berserakan di lingkungan sekitar rumah</label>
                                    <select name="pertanyaan_1_pilar_4" id="" class="form-control" required>
                                        <option selected disabled>-- Pilih --</option>
                                        <option value="Ya">Ya</option>
                                        <option value="Tidak">Tidak</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-row">
                                <div class="form-group col-md-12 col-sm-12">
                                    <label for="name">Ada tempat sampah yang tertutup, kuat dan mudah dibersihkan </label>
                                    <select name="pertanyaan_2_pilar_4" id="" class="form-control" required>
                                        <option selected disabled>-- Pilih --</option>
                                        <option value="Ya">Ya</option>
                                        <option value="Tidak">Tidak</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                    </div>

                    <div class="row mt-3">
                        <div class="col-lg-6">
                            <div class="form-row">
                                <div class="form-group col-md-12 col-sm-12">
                                    <label for="name">Ada perlakuan yang aman (tidak dibakar, tidak dibuang ke sungai/kebun/saluran drainase/ tempat terbuka)</label>
                                    <select name="pertanyaan_3_pilar_4" id="" class="form-control" required>
                                        <option selected disabled>-- Pilih --</option>
                                        <option value="Ya">Ya</option>
                                        <option value="Tidak">Tidak</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-row">
                                <div class="form-group col-md-12 col-sm-12">
                                    <label for="name">Telah melakukan pemilahan sampah </label>
                                    <select name="pertanyaan_4_pilar_4" id="" class="form-control" required>
                                        <option selected disabled>-- Pilih --</option>
                                        <option value="Ya">Ya</option>
                                        <option value="Tidak">Tidak</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                    </div>

                    <hr>
                    <h4 class="header-title text-center mt-3">Pertanyaan Pengamatan Pilar 5</h4>
                    <hr>

                    <div class="row mt-3">
                        <div class="col-lg-6">
                            <div class="form-row">
                                <div class="form-group col-md-12 col-sm-12">
                                    <label for="name">Tidak terlihat genangan air di sekitar rumah karena limbah cair domestik (Limbah cair yang tergenang dapat menjadi sumber dari vektor penyakit, termasuk kran umum atau WC umum)</label>
                                    <select name="pertanyaan_1_pilar_5" id="" class="form-control" required>
                                        <option selected disabled>-- Pilih --</option>
                                        <option value="Ya">Ya</option>
                                        <option value="Tidak">Tidak</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-row">
                                <div class="form-group col-md-12 col-sm-12">
                                    <label for="name">Ada saluran pembuangan limbah cair rumah tangga (non kakus) yang kedap dan tertutup. </label>
                                    <select name="pertanyaan_2_pilar_5" id="" class="form-control" required>
                                        <option selected disabled>-- Pilih --</option>
                                        <option value="Ya">Ya</option>
                                        <option value="Tidak">Tidak</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                    </div>

                    <div class="row mt-3">
                        <div class="col-lg-6">
                            <div class="form-row">
                                <div class="form-group col-md-12 col-sm-12">
                                    <label for="name">Terhubung dengan sumur resapan dan atau sistem pengolahan limbah (IPAL Komunal/ sewerage system)</label>
                                    <select name="pertanyaan_3_pilar_5" id="" class="form-control" required>
                                        <option selected disabled>-- Pilih --</option>
                                        <option value="Ya">Ya</option>
                                        <option value="Tidak">Tidak</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h4 class="header-title text-center mt-3" style="background: green;padding: 10px;color: white;">PENDATAAN PHBS KECAMATAN CULAMEGA</h4>
                      
                        
                    <div class="row mt-3">
                        <div class="col-lg-6">
                            <div class="form-row">
                                <div class="form-group col-md-12 col-sm-12">
                                    <label for="name">DUSUN/POSYANDU</label>
                                    <input type="text" class="form-control" name="dusun_posyandu" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>
                        <h4 class="header-title text-center mt-3">INDIKATOR PERILAKU HIDUP BERSIH DAN SEHAT (PHBS)</h4>
                    <hr>
                        <h4 class="header-title mt-3">PERSALINAN</h4>
                    <hr>

                    
                    <div class="row mt-3">
                        <div class="col-lg-6">
                            <div class="form-row">
                                <div class="form-group col-md-12 col-sm-12">
                                    <label for="name">Ada Ibu Bersalin</label>
                                    <select name="pertanyaan_phbs_1" id="" class="form-control" required>
                                        <option selected disabled>-- Pilih --</option>
                                        <option value="1">Ya</option>
                                        <option value="0">Tidak</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-row">
                                <div class="form-group col-md-12 col-sm-12">
                                    <label for="name">Bersalin di nakes</label>
                                    <select name="pertanyaan_phbs_2" id="" class="form-control" required>
                                        <option selected disabled>-- Pilih --</option>
                                        <option value="1">Ya</option>
                                        <option value="0">Tidak</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>
                        <h4 class="header-title mt-3">MEMBERI ASI-EKSLUSIF</h4>
                    <hr>
                    
                    <div class="row mt-3">
                        <div class="col-lg-6">
                            <div class="form-row">
                                <div class="form-group col-md-12 col-sm-12">
                                    <label for="name">bayi < 6 bln</label>
                                    <select name="pertanyaan_phbs_3" id="" class="form-control" required>
                                        <option selected disabled>-- Pilih --</option>
                                        <option value="1">Ya</option>
                                        <option value="0">Tidak</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-row">
                                <div class="form-group col-md-12 col-sm-12">
                                    <label for="name">ASI saja </label>
                                    <select name="pertanyaan_phbs_4" id="" class="form-control" required>
                                        <option selected disabled>-- Pilih --</option>
                                        <option value="1">Ya</option>
                                        <option value="0">Tidak</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    

                    <div class="row mt-3">
                        <div class="col-lg-6">
                            <div class="form-row">
                                <div class="form-group col-md-12 col-sm-12">
                                    <label for="name">jumlah bayi 6-12 bln</label>
                                    <select name="pertanyaan_phbs_5" id="" class="form-control" required>
                                        <option selected disabled>-- Pilih --</option>
                                        <option value="1">Ya</option>
                                        <option value="0">Tidak</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-row">
                                <div class="form-group col-md-12 col-sm-12">
                                    <label for="name">bayi 6-12 bln Lulus ASI Ekslusif </label>
                                    <select name="pertanyaan_phbs_6" id="" class="form-control" required>
                                        <option selected disabled>-- Pilih --</option>
                                        <option value="1">Ya</option>
                                        <option value="0">Tidak</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                <hr>
                    <h4 class="header-title mt-3">MENIMBANG</h4>
                <hr>
                
                <div class="row mt-3">
                    <div class="col-lg-6">
                        <div class="form-row">
                            <div class="form-group col-md-12 col-sm-12">
                                <label for="name">ada Bayi dan Balita</label>
                                <select name="pertanyaan_phbs_7" id="" class="form-control" required>
                                    <option selected disabled>-- Pilih --</option>
                                    <option value="1">Ya</option>
                                    <option value="0">Tidak</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-row">
                            <div class="form-group col-md-12 col-sm-12">
                                <label for="name">ditimbang </label>
                                <select name="pertanyaan_phbs_8" id="" class="form-control" required>
                                    <option selected disabled>-- Pilih --</option>
                                    <option value="1">Ya</option>
                                    <option value="0">Tidak</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <hr>
                    <h4 class="header-title mt-3">Petanyaan Lain - Lain</h4>
                <hr>

                <div class="row mt-3">
                    <div class="col-lg-6">
                        <div class="form-row">
                            <div class="form-group col-md-12 col-sm-12">
                                <label for="name">MENGGUNAKAN AIR BERSIH </label>
                                <select name="pertanyaan_phbs_9" id="" class="form-control" required>
                                    <option selected disabled>-- Pilih --</option>
                                    <option value="1">Ya</option>
                                    <option value="0">Tidak</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-row">
                            <div class="form-group col-md-12 col-sm-12">
                                <label for="name">MENCUCI TANGAN DENGAN AIR BERSIH DAN SABUN </label>
                                <select name="pertanyaan_phbs_10" id="" class="form-control" required>
                                    <option selected disabled>-- Pilih --</option>
                                    <option value="1">Ya</option>
                                    <option value="0">Tidak</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-lg-6">
                        <div class="form-row">
                            <div class="form-group col-md-12 col-sm-12">
                                <label for="name">MENGGUNAKAN JAMBAN SEHAT </label>
                                <select name="pertanyaan_phbs_11" id="" class="form-control" required>
                                    <option selected disabled>-- Pilih --</option>
                                    <option value="1">Ya</option>
                                    <option value="0">Tidak</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-row">
                            <div class="form-group col-md-12 col-sm-12">
                                <label for="name">MEMBERANTAS JENTIK DI RUMAH </label>
                                <select name="pertanyaan_phbs_12" id="" class="form-control" required>
                                    <option selected disabled>-- Pilih --</option>
                                    <option value="1">Ya</option>
                                    <option value="0">Tidak</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-lg-6">
                        <div class="form-row">
                            <div class="form-group col-md-12 col-sm-12">
                                <label for="name">MAKAN BUAH DAN SAYUR SETIAP HARI </label>
                                <select name="pertanyaan_phbs_13" id="" class="form-control" required>
                                    <option selected disabled>-- Pilih --</option>
                                    <option value="1">Ya</option>
                                    <option value="0">Tidak</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-row">
                            <div class="form-group col-md-12 col-sm-12">
                                <label for="name">MELAKUKAN AKTIVITAS FISIK SETIAP HARI </label>
                                <select name="pertanyaan_phbs_14" id="" class="form-control" required>
                                    <option selected disabled>-- Pilih --</option>
                                    <option value="1">Ya</option>
                                    <option value="0">Tidak</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-lg-6">
                        <div class="form-row">
                            <div class="form-group col-md-12 col-sm-12">
                                <label for="name">TIDAK MEROKOK DI DALAM RUMAH </label>
                                <select name="pertanyaan_phbs_15" id="" class="form-control" required>
                                    <option selected disabled>-- Pilih --</option>
                                    <option value="1">Ya</option>
                                    <option value="0">Tidak</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                </div>

                <hr>
                    <h4 class="header-title mt-3">Hasil</h4>
                <hr>

                <div class="row mt-3">
                    <div class="col-lg-6">
                        <div class="form-row">
                            <div class="form-group col-md-12 col-sm-12">
                                <label for="name">RUMAH TANGGA SEHAT </label>
                                <select name="pertanyaan_phbs_16" id="" class="form-control" required>
                                    <option selected disabled>-- Pilih --</option>
                                    <option value="1">Ya</option>
                                    <option value="0">Tidak</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-row">
                            <div class="form-group col-md-12 col-sm-12">
                                <label for="name">RUMAH TANGGA TIDAK SEHAT </label>
                                <select name="pertanyaan_phbs_17" id="" class="form-control" required>
                                    <option selected disabled>-- Pilih --</option>
                                    <option value="1">Ya</option>
                                    <option value="0">Tidak</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                </div>
                <button class="btn btn-primary" style="float: right" type="submit">Simpan Data</button>
            </div>
        </div>

        </form>
        <!-- data table end -->
    </div>
</div>

<!-- Template for new item row -->

@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<!-- Add JavaScript here -->
<script>

function initializeSelect2() {
    $('.js-example-basic-single').select2();
}

</script>
@endsection



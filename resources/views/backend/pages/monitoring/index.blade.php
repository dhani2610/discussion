
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
</style>

<div class="main-content-inner">
    <div class="row">
        <!-- data table start -->
        <div class="col-12 mt-5">
            <form action="" method="get">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3">
                                <label for="">Pilih Petugas</label>
                                <select name="petugas_id" id="" class="form-control">
                                    @foreach ($user as $item)
                                        <option value="{{ $item->id }}" {{ Request::get('petugas_id') == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <label for="name">Desa / Kelurahan</label>
                                <select name="desa_kelurahan" id="" class="form-control" required>
                                    <option {{ Request::get('desa_kelurahan') == 'all' ? 'selected' : '' }} value="all">Semua Desa/Keluarahan</option>
                                    <option {{ Request::get('desa_kelurahan') == 'Desa Bojongsari' ? 'selected' : '' }} value="Desa Bojongsari">Desa Bojongsari</option>
                                    <option {{ Request::get('desa_kelurahan') == 'Desa Cikuya' ? 'selected' : '' }} value="Desa Cikuya">Desa Cikuya</option>
                                    <option {{ Request::get('desa_kelurahan') == 'Desa Cintabodas' ? 'selected' : '' }} value="Desa Cintabodas">Desa Cintabodas</option>
                                    <option {{ Request::get('desa_kelurahan') == 'Desa Mekarlaksana' ? 'selected' : '' }} value="Desa Mekarlaksana">Desa Mekarlaksana</option>
                                    <option {{ Request::get('desa_kelurahan') == 'Desa Cipicung' ? 'selected' : '' }} value="Desa Cipicung">Desa Cipicung</option>
                                </select>
                            </div>
                            {{-- <div class="col-lg-3">
                                <label for="">Dari Tanggal</label>
                                <input type="date" value="{{ Request::get('start_date') }}" name="start_date" class="form-control">
                            </div>
                            <div class="col-lg-3">
                                <label for="">Dari Tanggal</label>
                                <input type="date" value="{{ Request::get('end_date') }}" name="end_date" class="form-control">
                            </div> --}}
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-12">
                                <a href="{{ route('export-data') }}?petugas_id={{ Request::get('petugas_id') }}&desa_kelurahan={{ Request::get('desa_kelurahan') }}" class="btn btn-success text-white mb-3 ml-4" style="float: right" >
                                    Export</a>
                                <button type="submit" class="btn btn-primary text-white mb-3" style="float: right" >
                                Filter</button>
                                
                            </div>
                        </div>

                    </div>
                </div>
            </form>
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title float-left">{{ $page_title }} List</h4>
                    <p class="float-right mb-2">
                            <a href="{{ route('monitoring.create') }}" class="btn btn-primary text-white mb-3" style="float: right" >
                                Tambah Data {{ $page_title }}  </a>
                           
                    </p>
                    <div class="clearfix"></div>
                    <div class="table-responsive">
                        @include('backend.layouts.partials.messages')
                        <table id="dataTable" class="text-center">
                            <thead class="bg-light text-capitalize">
                                <tr>
                                    <th>Aksi</th>
                                    <th>NO</th>
                                    <th>Tanggal</th>
                                    <th>Nama Petugas</th>
                                    <th>Latitude</th>
                                    <th>Longtitude</th>
                                    <th>No Kartu Keluarga</th>
                                    <th>Nama Kepala Keluarga</th>
                                    <th>Alamat</th>
                                    <th>RT</th>
                                    <th>RW</th>
                                    <th>Jumlah Jiwa</th>
                                    <th>Jumlah Jiwa Menetap</th>
                                    <th>Desa / Kelurahan</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($monitoring as $s)
                               <tr>
                                    <td>
                                        <a class="btn btn-success text-white" href="{{ route('monitoring.edit', $s->id) }}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    
                                        <a class="btn btn-danger text-white" onclick="confirmDelete('{{ route('monitoring.destroy', $s->id) }}')">
                                            <i class="fa fa-trash-o"></i>
                                        </a>
                                    </td>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $s->tanggal_monitoring }}</td>
                                    <td>{{ $s->nama_petugas }}</td>
                                    <td>{{ $s->latitude ?? '-' }}</td>
                                    <td>{{ $s->longtitude ?? '-' }}</td>
                                    <td>{{ $s->no_kk }}</td>
                                    <td>{{ $s->nama_kepala_keluarga }}</td>
                                    <td>{{ $s->alamat }}</td>
                                    <td>{{ $s->rt }}</td>
                                    <td>{{ $s->rw }}</td>
                                    <td>{{ $s->jumlah_jiwa }}</td>
                                    <td>{{ $s->jumlah_jiwa_menetap }}</td>
                                    <td>{{ $s->desa_kelurahan }}</td>
                                </tr>
                               @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- data table end -->
        
    </div>
</div>

@endsection


@section('script')
<script>
    function confirmDelete(deleteUrl) {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: "btn btn-success",
                cancelButton: "btn btn-danger"
            },
            buttonsStyling: false
        });

        swalWithBootstrapButtons.fire({
            title: "Are you sure delete this data?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                // Redirect to delete URL if confirmed
                window.location.href = deleteUrl;
            }
        });
    }
</script>
@endsection
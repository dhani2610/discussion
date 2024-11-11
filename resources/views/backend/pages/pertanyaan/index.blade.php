
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
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title float-left">{{ $page_title }} Materi - {{ $materi->judul }}</h4>
                    <p class="float-right mb-2">
                            <a href="{{ route('pertanyaan.create',$materi->id) }}" class="btn btn-primary text-white mb-3" style="float: right" >
                                Tambah Data {{ $page_title }}  </a>
                           
                    </p>
                    <div class="clearfix"></div>
                    <div class="table-responsive">
                        @include('backend.layouts.partials.messages')
                        <table id="dataTable" class="text-center">
                            <thead class="bg-light text-capitalize">
                                <tr>
                                    <th>NO</th>
                                    <th>Pertanyaan</th>
                                    <th>Created By</th>
                                    <th>Created Date</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($pertanyaan as $s)
                               <tr>
                                <td>{{ $loop->index+1 }}</td>

                                    <td>{!! $s->pertanyaan !!}</td>
                                    <td>
                                        @php
                                            $createdby = \App\Models\Admin::where('id',$materi->id_user)->first();
                                        @endphp
                                        {{ $createdby->name ?? '-' }}
                                    </td>
                                    <td>{{ $s->created_at }}</td>
                                    <td>
                                        <a class="btn btn-success text-white" href="{{ route('pertanyaan.edit',[ 'id' => $s->id , 'id_materi' => $materi->id]) }}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    
                                        <a class="btn btn-danger text-white" onclick="confirmDelete('{{ route('pertanyaan.destroy',[ 'id' => $s->id , 'id_materi' => $materi->id]) }}')">
                                            <i class="fa fa-trash-o"></i>
                                        </a>
                                    </td>
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
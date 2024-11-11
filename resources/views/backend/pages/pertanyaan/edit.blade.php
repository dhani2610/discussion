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
<link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" rel="stylesheet">

<div class="main-content-inner">
    @include('backend.layouts.partials.messages')

    <div class="row">
        <!-- data table start -->
        <form action="{{ route('pertanyaan.update',[ 'id' => $pertanyaan->id , 'id_materi' => $materi->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <hr>
                    <h4 class="header-title text-center">Edit Pertanyaan</h4>
                    <hr>
                    <div class="row mt-5">
                        <div class="col-lg-12">
                            <div class="form-row">
                                <div class="form-group col-md-12 col-sm-12">
                                    <textarea name="pertanyaan" required class="summernote form-control" id="" cols="30" rows="50">{{ $pertanyaan->pertanyaan }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-primary mt-5 " style="float: right" type="submit">Simpan Data</button>
                </div>
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
<!-- jQuery (Wajib sebelum Bootstrap JS) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Bootstrap 4 JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>

<script type="text/javascript" src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>
<!-- Add JavaScript here -->

<!-- Summernote JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>

<script>
$('.dropify').dropify();

function initializeSelect2() {
    $('.js-example-basic-single').select2();
}
$(function () {
                $('[data-toggle="tooltip"]').tooltip(); // Inisialisasi tooltip secara manual
            });
$('.summernote').summernote({
            placeholder: 'Question Here',
    tabsize: 2,
    height: 100,
    toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'italic', 'underline', 'clear']],
        // ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
        //['fontname', ['fontname']],
        // ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'hr']],
        //['view', ['fullscreen', 'codeview']],
        ['help', ['help']]
    ],
});

</script>
@endsection



@extends('backend.layouts.master')
@section('css')
<style>
    .ck-editor__editable_inline {
        min-height: 400px;
    }
    </style>
<script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
@stop
@section('content')
    <section class="content">
        
        <div class="row">
           
            <div class="col-12"> 
                
                <div class="card mt-4">
                    
                    <div class="card-header">
                        <h3 class="card-title">Tambah Post</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        {!! Form::open(['route' => 'dashboard.blog.store', 'method' => 'post', 'autocomplete' => 'false','enctype'=>'multipart/form-data']) !!}
                        @include('backend.blog._form')
                        {!! Form::close() !!}
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
@endsection

@push('js')
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .replace( 'description', {
            filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        })
        .catch( error => {
            console.error( error );
        } );
</script>

@endpush

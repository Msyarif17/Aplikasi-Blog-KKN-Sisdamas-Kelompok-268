@extends('backend.layouts.master')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                @include('layouts.flash')
                <div class="card mt-4">
                    <div class="card-header">
                        <h3 class="card-title">Edit Barang</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        {!! Form::open(['route' => ['dashboard.blog.update', $barang->id], 'method' => 'put', 'autocomplete' => 'false','enctype'=>'multipart/form-data']) !!}
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
<script src="../build/ckeditor.js"></script>
<script>ClassicEditor
        .create( document.querySelector( '.editor' ), {
            
            licenseKey: '',
            
            
            
        } )
        .then( editor => {
            window.editor = editor;
    
            
            
            
        } )
        .catch( error => {
            console.error( 'Oops, something went wrong!' );
            console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
            console.warn( 'Build id: t2zy2a88iqju-nohdljl880ze' );
            console.error( error );
        } );
</script>
@endpush

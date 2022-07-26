<div class="box-body">
    <div class="row">
        <div class="col-sm-6 col-md-6">
            <div class="col-sm-12 col-md-12">
                <div class="form-group">
                    {!! Form::label('image', 'Gambar Kegiatan') !!}
                    {!! Form::file('image', $errors->has('image') ? ['class'=>'form-control is-invalid','accept'=>"image/*"] : ['class'=>'form-control','accept'=>"image/png, image/*"]) !!}
                    {!! $errors->first('image', '<p class="help-block invalid-feedback">:message</p>') !!}
                    
                </div>
            </div>
            <div class="col-sm-12 col-md-12">
                <div class="form-group">
                    {!! Form::label('id_supplyer', 'supplyer') !!}
                    {!! Form::select('id_supplyer[]', $supplyer,[], array('class' => 'form-control')) !!}
                    {!! $errors->first('id_supplyer', '<p class="help-block invalid-feedback">:message</p>') !!} 
                </div>
            </div>
            <div class="col-sm-12 col-md-12">
                <div class="form-group">
                    {!! Form::label('title', 'Harga Jual') !!}
                    {!! Form::text('title', @$blog->title, $errors->has('title') ? ['class' => 'form-control is-invalid'] : ['class' => 'form-control']) !!}
                    {!! $errors->first('title', '<p class="help-block invalid-feedback">:message</p>') !!}
                </div>
            </div>
            <div class="col-sm-12 col-md-12">
                <div class="form-group">
                    {!! Form::label('stok', 'Stok') !!}
                    <div class="editor-container">
						<div class="editor">
                        </div>
                    </div>
                    {!! $errors->first('stok', '<p class="help-block invalid-feedback">:message</p>') !!}
                </div>
            </div>
        </div>
        
    </div>
</div>
<!-- /.box-body -->

<div class="box-footer">
    {!! Form::submit(isset($blog) ? 'Update' : 'Save', ['class' => 'btn btn-primary btn-block', 'id' => 'save']) !!}
</div>

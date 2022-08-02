<div class="box-body">
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="col-sm-12 col-md-12">
                <div class="form-group">
                    {!! Form::label('image', 'Gambar Kegiatan') !!}
                    {!! Form::file('image', $errors->has('image') ? ['class'=>'form-control is-invalid','accept'=>"image/*"] : ['class'=>'form-control','accept'=>"image/png, image/*"]) !!}
                    {!! $errors->first('image', '<p class="help-block invalid-feedback">:message</p>') !!}
                    
                </div>
            </div>
            
            <div class="col-sm-12 col-md-12">
                <div class="form-group">
                    {!! Form::label('title', 'Judul') !!}
                    {!! Form::text('title', @$blog->title, $errors->has('title') ? ['class' => 'form-control is-invalid'] : ['class' => 'form-control']) !!}
                    {!! $errors->first('title', '<p class="help-block invalid-feedback">:message</p>') !!}
                </div>
            </div>
            <div class="col-sm-12 col-md-12">
                <div class="form-group">
                    {!! Form::label('category', 'Kategori Postingan') !!}
                    {!! Form::select('category[]', $kategori,[], array('class' => 'form-control')) !!}
                    {!! $errors->first('category', '<p class="help-block invalid-feedback">:message</p>') !!} 
                </div>
            </div>
            <div class="col-sm-12 col-md-12">
                <div class="form-group">
                    {!! Form::label('stok', 'Stok') !!}
                    
                        <textarea style="color:black;" id="editor" rows="13" cols="80">
                        </textarea>
    
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


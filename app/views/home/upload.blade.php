@extends('home.master')

@section('content')
        <div class="text-center">
                <div class="page-header">
                        <h1>Image upload</h1>
                </div>

                @if($hash)
                        <div class="alert alert-success">Upload successful</div>
                        <br />
                        <img src="{{ URL::to('/s') . '/' . $hash . '/full?thumb=1'}}">
                        <br />
                        <br />
                        <p>Url: {{ URL::to('/s') . '/' . $hash }}</p>
                @else
                        <form method="POST" action="" enctype="multipart/form-data">
                                {{ Form::token() }}
                                <div class="form-group">
                                        <label for="productFile" class="col-sm-2 control-label">Image</label>
                                        <div class="col-sm-10">
                                                <div class="input-group">
                                                        <span class="input-group-btn">
                                                                <span class="btn btn-primary btn-file">
                                                                        Search&hellip; <input type="file" name="image">
                                                                </span>
                                                        </span>
                                                        <input type="text" class="form-control" readonly id="fileName">
                                                </div>
                                        </div>
                                </div>

                                <span class="help-block col-sm-offset-2">Image, max. {{ ini_get('upload_max_filesize'); }}</span>
                                <button type="submit" class="btn btn-success col-sm-offset-2">Upload image</button>
                        </form>
                @endif
        </div>
@stop

@section('extraCSS')
        <style type="text/css">
                .btn-file {
                        position: relative;
                        overflow: hidden;
                }
                .btn-file input[type=file] {
                        position: absolute;
                        top: 0;
                        right: 0;
                        min-width: 100%;
                        min-height: 100%;
                        font-size: 100px;
                        text-align: right;
                        filter: alpha(opacity=0);
                        opacity: 0;
                        background: red;
                        cursor: inherit;
                        display: block;
                }
                input[readonly] {
                        background-color: white !important;
                        cursor: default !important;
                }
        </style>
@stop

@section('extraJS')
        <script type="text/javascript">
                $(document).on('change', '.btn-file :file', function() {
                        var input = $(this),
                                numFiles = input.get(0).files ? input.get(0).files.length : 1,
                                label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
                        input.trigger('fileselect', [numFiles, label]);
                });
                $(document).ready( function() {
                        $('.btn-file :file').on('fileselect', function(event, numFiles, label) {
                                var input = $(this).parents('.input-group').find(':text'),
                                        log = numFiles > 1 ? numFiles + ' files selected' : label;
                                if( input.length ) {
                                        input.val(log);
                                } else {
                                        if( log ) alert(log);
                                }
                        });
                });
        </script>
@stop
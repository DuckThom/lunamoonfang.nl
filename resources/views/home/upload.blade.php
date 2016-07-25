@extends('master')

@section('content')
        <div class="text-center">
                @if(Session::has('hash'))
                        <div class="alert alert-success">Upload successful</div>
                        <br />
                        <img src="{{ URL::to('/s') . '/' . Session::get('hash') . '/full?thumb=1'}}">
                        <br />
                        <br />
                        <p>Url: <a href="{{ URL::to('/s') . '/' . Session::get('hash') }}">{{ URL::to('/s') . '/' . Session::get('hash') }}</a></p>
                @elseif (Session::has('file_name'))
                    <div class="alert alert-success">Upload successful</div>
                    <br />
                    <br />
                    <p>Url: <a href="{{ Session::get('url') }}">{{ Session::get('file_name') }}</a></p>
                @endif
        </div>

        <div class="row">
                <form method="POST" action="/u/image" enctype="multipart/form-data" class="form col-md-6">
                        {{ csrf_field() }}

                        <h3>Image upload</h3>

                        <hr />

                        <div class="form-group">
                                <div class="input-group">
                                        <span class="input-group-btn">
                                                <span class="btn btn-primary btn-file">
                                                        Browse&hellip; <input type="file" name="image" accept="image/*">
                                                </span>
                                        </span>
                                        <input type="text" class="form-control" readonly id="fileName">
                                </div>
                        </div>

                        <span class="help-block">Image, max. {{ ini_get('upload_max_filesize') }}</span>
                        <button type="submit" class="btn btn-success">Upload image</button>
                </form>

                <form method="POST" action="/u/file" enctype="multipart/form-data" class="form col-md-6">
                        {{ csrf_field() }}

                        <h3>File upload</h3>

                        <hr />

                        <div class="form-group">
                                <div class="input-group">
                                        <span class="input-group-btn">
                                                <span class="btn btn-primary btn-file">
                                                        Browse&hellip; <input type="file" name="file" accept="application/zip">
                                                </span>
                                        </span>
                                        <input type="text" class="form-control" readonly id="fileName">
                                </div>
                        </div>

                        <span class="help-block">ZIP, max. {{ ini_get('upload_max_filesize') }}</span>
                        <button type="submit" class="btn btn-success">Upload file</button>
                </form>
        </div>
@endsection

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
@endsection

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
@endsection

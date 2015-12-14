<!--heritage de la vue mère-->
@extends('layout')

@section('title')
Ajout d'un réalisateur
@endsection

@section('famille')
Directors
@endsection

@section('js')
@parent
<script src="{{ asset('vendor/plugins/summernote/summernote.min.js')}}"></script>
<script src="{{ asset('vendor/plugins/markdown/markdown.js')}}"></script>
<script src="{{ asset('vendor/plugins/markdown/to-markdown.js')}}"></script>
<script src="{{ asset('vendor/plugins/markdown/bootstrap-markdown.js')}}"></script>

<script src="{{ asset('vendor/plugins/moment/moment.min.js')}}"></script>
<script src="{{ asset('vendor/plugins/datepicker/js/bootstrap-datetimepicker.min.js')}}"></script>
<script src="{{ asset('js/form.js')}}"></script>
<script src="{{ asset('vendor/plugins/select2/select2.min.js')}}"></script>

@endsection

@section('css')
@parent
<link type="text/css" rel="stylesheet" href="{{ asset('vendor/plugins/summernote/summernote.css')}}">
<link type="text/css" rel="stylesheet" href="{{ asset('vendor/plugins/datepicker/css/bootstrap-datetimepicker.css')}}">
<link type="text/css" rel="stylesheet" href="{{ asset('css/main.css')}}">
<link type="text/css" rel="stylesheet" href="{{ asset('vendor/plugins/select2/css/core.css')}}">



@endsection

<!--ecriture dans le content-->
@section('content')
<div class="row">
    <form enctype="multipart/form-data" action="{{route('directors_store')}}" method="post" class="form-horizontal" novalidate>

        <div class="col-md-8">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <span class="panel-title">Ajout d'un réalisateur</span>
                </div>

                <div class="panel-body ">
                    <div class="form-group col-md-6">
                        <label class="control-label " for="lastname">Nom :</label>
                        <input value="{{ old('lastname')}}" type="text" id="lastname" name="lastname" class="col-md-6 form-control" placeholder="Nom du réalisateur" required >
                        @if ($errors->has('lastname'))
                        <p class="help-block text-danger">{{$errors->first('lastname')}}</p>
                        @endif
                    </div>

                    <div class="form-group col-md-6 pull-right">
                        <label class="control-label " for="firstname">Prénom :</label>
                        <input value="{{ old('firstname')}}" type="text" id="firstname" name="firstname" class="col-md-6 form-control" placeholder="Prénom du réalisateur" required >
                        @if ($errors->has('firstname'))
                        <p class="help-block text-danger">{{$errors->first('firstname')}}</p>
                        @endif
                    </div>


                    <div class="col-md-6 col-md-offset-3">
                        <div class="form-group ">
                            <label class="control-label " for="dob">Date de naissance :</label>
                            <div class="datetimepicker input-group date">
                                <span class="input-group-addon cursor">
                                  <i class="fa fa-calendar"></i>
                                </span>
                                <input value="{{ old('dob')}}" type="date" id="dob" name="dob" class="col-md-6 form-control datepicker" placeholder="jj/mm/aaaa" required >
                            </div>

                            @if ($errors->has('dob'))
                            <p class="help-block text-danger">{{$errors->first('dob')}}</p>
                            @endif
                        </div>
                    </div>



                    <div class="form-group ">
                        <div class="col-md-12">
                            <label class=" control-label" for="biography">Biographie :</label>
                            <textarea id="biography" rows="3" name="biography" class="form-control summernote" placeholder="Biographie du réalisateur" required >{{ old('biography')}}</textarea>
                            @if ($errors->has('biography'))
                            <p class="help-block text-danger">{{$errors->first('biography')}}</p>
                            @endif
                        </div>
                    </div>






                    {{csrf_field()}}

                </div>
            </div>
        </div>


        <aside>
            <div class="col-md-4">
                <div class="row">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            <span class="panel-title">Média</span>
                        </div>

                        <div class="panel-body ">
                            <div class="row">
                                <div class="col-md-12">
                                    <label class=" control-label" for="image">Image :</label>
                                    <div class="section admin-form ">

                                        <label class="field prepend-icon append-button file">
                                            <span class="button btn-primary">Parcourir...</span>
                                            <input id="file1" class="form-control gui-file" type="file" id="image" name="image" accept="image/*" capture="capture" onchange="document.getElementById('uploader1').value = this.value;" name="file1">
                                            <input id="uploader1" class="gui-input text-center" type="text" placeholder="Image">
                                            <label class="field-icon"><i class="fa fa-upload"></i></label>
                                        </label>

                                    </div>
                                    @if ($errors->has('image'))
                                    <p class="help-block text-danger">{{$errors->first('image')}}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <figure class=" apercu_image">
                                        <img src="" alt="Aperçu de l'image" class=" img-responsive" id="apercu-image">
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-system "><i class="fa fa-floppy-o"></i> Enregistrer</button>
                    </div>
                </div>
            </div>

        </aside>
    </form>
</div>
@endsection
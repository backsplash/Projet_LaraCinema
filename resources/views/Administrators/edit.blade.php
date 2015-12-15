<!--heritage de la vue mère-->
@extends('layout')

@section('title')
Edition d'un administrateur
@endsection

@section('famille')
Administrators
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
<link type="text/css" rel="stylesheet" href="{{ asset('assets/admin-tools/admin-forms/css/admin-forms.css')}}">


@endsection

<!--ecriture dans le content-->
@section('content')
<div class="row">
    <form enctype="multipart/form-data" action="{{ route('administrators_store', ['id'=>$administrator->id])}}" method="post" class="form-horizontal" novalidate>

        <div class="col-md-8">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <span class="panel-title">Edition d'un administrateur</span>
                </div>

                <div class="panel-body ">
                    <div class="row">
                        <div class=" col-md-6">
                            <div class="form-group">
                                <div class=" col-md-12 admin-form">
                                    <label class="control-label" for="lastname">Nom :</label>
                                    <label class=" field prepend-icon">
                                        <input value=
                                         @if(old('lastname'))
                                        "{{  old('lastname') }}"
                                        @else "{{  $administrator->lastname}}"
                                        @endif
                                        type="text" id="lastname" name="lastname" class="col-md-6 form-control gui-input" placeholder="Nom" required >
                                        <label class="field-icon" for="firstname"><i class="fa fa-user"></i></label>
                                    </label>

                                    @if ($errors->has('lastname'))
                                    <p class="help-block text-danger">{{$errors->first('lastname')}}</p>
                                    @endif

                                </div>
                            </div>
                        </div>
                        <div class=" col-md-6">
                            <div class="form-group ">
                                <div class=" col-md-12">
                                    <label class="control-label " for="firstname">Prénom :</label>
                                    <input value=
                                    @if(old('firstname'))
                                    "{{  old('firstname') }}"
                                    @else "{{  $administrator->firstname }}"
                                    @endif
                                    type="text" id="firstname" name="firstname" class="col-md-6 form-control" placeholder="Prénom" required >
                                    @if ($errors->has('firstname'))
                                    <p class="help-block text-danger">{{$errors->first('firstname')}}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class=" col-md-6">
                            <div class="form-group">
                                <div class=" col-md-12">
                                    <label class="control-label " for="password">Mot de passe :

                                    </label>
                                    <p class="alert alert-danger ">laisser vide si inchangé</p>
                                    <input type="password" id="password" name="password" class="col-md-6 form-control" placeholder="****" required >
                                    @if ($errors->has('password'))
                                    <p class="help-block text-danger">{{$errors->first('password')}}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class=" col-md-6">
                            <div class="form-group ">
                                <div class=" col-md-12">
                                    <label class="control-label " for="email">Email :</label>
                                    <input value=
                                     @if(old('email'))
                                    "{{  old('email') }}"
                                    @else "{{  $administrator->email }}"
                                    @endif
                                    type="email" id="email" name="email" class="col-md-6 form-control" placeholder="xxxxx@yyy.com" required >
                                    @if ($errors->has('email'))
                                    <p class="help-block text-danger">{{$errors->first('email')}}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class=" col-md-6">
                            <div class="form-group">
                                <div class=" col-md-12">
                                    <label class="control-label " for="password_confirmation">Resaisissez votre mot de passe :</label>
                                    <input type="password" id="password_confirmation" name="password_confirmation" class="col-md-6 form-control" placeholder="****" required >
                                    @if ($errors->has('password_confirmation'))
                                    <p class="help-block text-danger">{{$errors->first('password_confirmation')}}</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class=" col-md-6">
                            <div class="form-group admin-form pull-right">
                                <div class=" col-md-12" >
                                    <label class="block mt15 switch switch-primary" >

                                        <input id="super_admin" type="checkbox" checked=

                                        @if($administrator->super_admin) "checked"
                                        @else "unchecked"
                                        @endif
                                        value="admin" name="super_admin">
                                        <label data-off="NON" data-on="OUI" for="super_admin"></label>
                                    <span>

                                        Super administrateur

                                    </span>

                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group ">
                        <div class="col-md-12 ">
                            <label class=" control-label" for="description">Description :</label>
                            <textarea id="description" rows="3" name="description" class="form-control summernote" placeholder="Année de naissance, cultures, passions..." required >
                                @if(old('description'))
                                {{  old('description') }}
                                @else {{  $administrator->description }}
                                @endif
                            </textarea>
                            @if ($errors->has('description'))
                            <p class="help-block text-danger">{{$errors->first('description')}}</p>
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
                                    <label class=" control-label" for="photo">Image du profil:</label>
                                    <div class="section admin-form ">

                                        <label class="field prepend-icon append-button file">
                                            <span class="button btn-primary">Parcourir...</span>
                                            <input id="file1" class="form-control gui-file" type="file"  name="photo" accept="image/*" capture="capture" onchange="document.getElementById('uploader1').value = this.value;" >
                                            <input id="uploader1" class="gui-input text-center" type="text" placeholder="Image" value="Avatar">
                                            <label class="field-icon"><i class="fa fa-upload"></i></label>
                                        </label>

                                    </div>
                                    @if ($errors->has('photo'))
                                    <p class="help-block text-danger">{{$errors->first('photo')}}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <figure class=" apercu_image">
                                        <img src="{{  $administrator->photo }}" alt="Aperçu de l'image" class=" img-responsive" id="apercu-image">
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




<!--fin d'ecriture-->
@endsection

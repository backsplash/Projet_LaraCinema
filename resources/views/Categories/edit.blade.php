<!--heritage de la vue mère-->
@extends('layout')

@section('title')
Edition d'une catégorie
@endsection

@section('famille')
Categories
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
    <form enctype="multipart/form-data" action="{{ route('categories_store', ['id'=>$categorie->id])}}" method="post" class="form-horizontal" novalidate>

        <div class="col-md-8">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <span class="panel-title">Ajout d'une catégorie</span>
                </div>

                <div class="panel-body ">
                    <div class="form-group col-md-6">
                        <label class="control-label " for="title">Titre :</label>
                        <input value=
                        @if(old('title'))
                        "{{  old('title') }}"
                        @else "{{  $categorie->title}}"
                        @endif
                               type="text" id="title" name="title" class="col-md-6 form-control" placeholder="Titre de la catégorie" required >
                        @if ($errors->has('title'))
                        <p class="help-block text-danger">{{$errors->first('title')}}</p>
                        @endif
                    </div>


                    <div class="form-group ">
                        <div class="col-md-12">
                            <label class=" control-label" for="description">Description :</label>
                            <textarea id="description" rows="3" name="description" class="form-control summernote" placeholder="Description de la catégorie" required >
                                @if(old('description'))
                                "{{  old('description') }}"
                                @else "{{  $categorie->description}}"
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
                                        <img src="{{  $categorie->image}}" alt="Aperçu de l'image" class=" img-responsive" id="apercu-image">
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

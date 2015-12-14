<!--heritage de la vue mère-->
@extends('layout')

@section('title')
Ajout d'un film
@endsection

@section('famille')
Movies
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
    <div class="col-md-10 col-md-offset-1">
        <form enctype="multipart/form-data" action="{{route('movies_store')}}" method="post" class="form-horizontal panel panel-danger">

            <div class="panel-heading">
                <span class="panel-title">Ajout d'un film</span>
            </div>

            <div class="panel-body ">
                <div class="form-group  col-md-6">
                    <label for="type" class=" control-label">Type :</label>
                    <select name="type" class="form-control col-md-6 select2">
                        <option value="long-metrage">Long-Métrage</option>
                        <option value="court-metrage">Court-Métrage</option>
                    </select>
                </div>

                <div class="form-group col-md-6 pull-right">
                    <label class="control-label " for="title">Titre :</label>
                    <div class="input-group">
                         <span class="input-group-addon">
                         <i class="fa fa-pencil"></i>
                         </span>
                         <input value="{{ old('title')}}" type="text" id="title" name="title" class="col-md-6 form-control" placeholder="Titre du film" required >
                    </div>
                    @if ($errors->has('title'))
                    <p class="help-block text-danger">{{$errors->first('title')}}</p>
                    @endif
                </div>

                <div class="form-group ">
                    <div class="col-md-12">
                        <label class=" control-label" for="synopsis">Synopsis :</label>
                        <textarea id="synopsis" name="synopsis" class="form-control markdown" placeholder="Synopsis du film" required >{{ old('synopsis')}}</textarea>
                        @if ($errors->has('synopsis'))
                        <p class="help-block text-danger">{{$errors->first('synopsis')}}</p>
                        @endif
                    </div>
                </div>

                <div class="form-group ">
                    <div class="col-md-12">
                        <label class=" control-label" for="description">Description :</label>
                        <textarea id="description" name="description" class="form-control summernote" placeholder="Description du film">{{ old('description')}}</textarea>
                        @if ($errors->has('description'))
                        <p class="help-block text-danger">{{$errors->first('description')}}</p>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-dark">
                            <div class="panel-heading">
                                <span class="panel-title text-center">Media</span>
                            </div>
                            <div class="panel-body ">



                                <div class="col-md-4 pull-right">
                                    <figure class=" apercu_image">
                                        <img src="" alt="apercu_image_film" class="img-responsive" id="apercu-image">
                                    </figure>
                                </div>

                                <div class="form-group col-md-8 ">
                                    <label class=" control-label" for="trailer">Trailer :</label>
                                    <textarea id="trailer" name="trailer" class="form-control" placeholder="Code de la vidéo embarquée">{{ old('trailer')}}</textarea>
                                    @if ($errors->has('trailer'))
                                    <p class="help-block text-danger">{{$errors->first('trailer')}}</p>
                                    @endif
                                </div>

                                <div class="form-group col-md-8">
                                    <label class=" control-label" for="image">Image :</label>
                                    <div class="section admin-form ">

                                        <label class="field prepend-icon append-button file">
                                            <span class="button btn-primary">Parcourir...</span>
                                            <input id="file1" class="form-control gui-file" type="file" id="image" name="image" accept="image/*" capture="capture" onchange="document.getElementById('uploader1').value = this.value;" name="file1">
                                            <input id="uploader1" class="gui-input" type="text" placeholder="Choisir un fichier">
                                            <label class="field-icon"><i class="fa fa-upload"></i></label>
                                        </label>

                                    </div>
                                    @if ($errors->has('image'))
                                    <p class="help-block text-danger">{{$errors->first('image')}}</p>
                                    @endif
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="row ">

                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class=" control-label" for="langue">Langue :</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                          <i class="fa fa-flag"></i>
                                        </span>
                                         <input value="{{ old('langue')}}" type="text" id="langue" name="langue" class="form-control" placeholder="Langue du film">
                                    </div>
                                    @if ($errors->has('langue'))
                                    <p class="help-block text-danger">{{$errors->first('langue')}}</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class=" control-label" for="bo">Bo :</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                          <i class="fa fa-comment"></i>
                                        </span>

                                            <select value="{{ old('bo')}}" id="bo" name="bo" class="form-control select2">
                                                <option value="VF">VF</option>
                                                <option value="VO">VO</option>
                                                <option value="VOST">VOST</option>
                                                <option value="VOSTFR">VOSTFR</option>
                                            </select>

                                    </div>
                                    @if ($errors->has('bo'))
                                    <p class="help-block text-danger">{{$errors->first('bo')}}</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group ">
                                <div class="col-md-12">
                                    <label class=" control-label" for="budget">Budget :</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                          <i class="fa fa-euro"></i>
                                        </span>
                                    <input value="{{ old('budget')}}" type="text" id="budget" name="budget" class="form-control" placeholder="Budget du film en €">
                                    </div>
                                    @if ($errors->has('budget'))
                                    <p class="help-block text-danger">{{$errors->first('budget')}}</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="col-md-12">
                            <label class=" control-label" for="duree">Durée (min):</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                  <i class="fa fa-clock-o"></i>
                                </span>
                                <input value="{{ old('duree')}}" type="text" id="duree" name="duree" class="form-control" placeholder="Durée du film en minutes">
                            </div>
                            @if ($errors->has('duree'))
                            <p class="help-block text-danger">{{$errors->first('duree')}}</p>
                            @endif

                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="col-md-12">
                                <label class=" control-label" for="distributeur">Distributeur :</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                      <i class="fa fa-user"></i>
                                    </span>
                                    <input value="{{ old('distributeur')}}" type="text" id="distributeur" name="distributeur" class="form-control" >
                                </div>
                                @if ($errors->has('distributeur'))
                                <p class="help-block text-danger">{{$errors->first('distributeur')}}</p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="col-md-12">
                                <label class=" control-label" for="annee">Annee :</label>
                                <div class="datetimepicker2 input-group date">
                                    <span class="input-group-addon cursor">
                                      <i class="fa fa-calendar"></i>
                                    </span>
                                <input value="{{ old('annee')}}" type="text" id="annee" name="annee" class="form-control" placeholder="Annee de production">
                                    @if ($errors->has('annee'))
                                    <p class="help-block text-danger">{{$errors->first('annee')}}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group ">
                            <div class="col-md-12">
                                <label class=" control-label" for="date_release">Date de sortie :</label>
                                <div class="datetimepicker input-group date">
                                    <span class="input-group-addon cursor">
                                      <i class="fa fa-calendar"></i>
                                    </span>
                                    <input value="{{ old('date_release')}}" type="date" id="date_release" name="date_release" class="form-control datepicker" placeholder="jj/mm/aaaa"  required>

                                </div>
                                @if ($errors->has('date_release'))
                                <p class="help-block text-danger">{{$errors->first('date_release')}}</p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="col-md-12">
                                <label class=" control-label col-md-9" for="visible">Film visible :</label>

                                <div class="switch switch-danger round switch-inline switch-sm">

                                    <input type="checkbox" id="visible" name="visible"  checked="checked">
                                    <label class=" control-label " for="visible"></label>

                                </div>
                                @if ($errors->has('visible'))
                                <p class="help-block text-danger">{{$errors->first('visible')}}</p>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <label class=" control-label col-md-9" for="cover">Mise en avant du film :</label>
                                <div class="switch switch-danger round switch-inline switch-sm">

                                    <input type="checkbox" id="cover" name="cover"  checked="checked">
                                    <label class=" control-label" for="cover"></label>

                                </div>
                                @if ($errors->has('cover'))
                                <p class="help-block text-danger">{{$errors->first('cover')}}</p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="col-md-12">
                                <label class=" control-label" for="categorie">Categorie :</label>
                                <select id="categorie" name="categorie" class="form-control select2" required>
                                    @foreach ($categories as $categorie)
                                        <option value="{{$categorie->id}}">{{$categorie->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                </div>






                {{csrf_field()}}
                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-system "><i class="fa fa-floppy-o"></i> Enregistrer</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!--fin d'ecriture-->
@endsection
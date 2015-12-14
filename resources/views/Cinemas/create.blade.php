<!--heritage de la vue mère-->
@extends('layout')

@section('title')
    Ajout d'un cinéma
@endsection

@section('famille')
    Cinemas
@endsection

@section('js')
    @parent
    <script src="{{ asset('vendor/plugins/summernote/summernote.min.js')}}" xmlns="http://www.w3.org/1999/html"></script>
    <script src="{{ asset('vendor/plugins/markdown/markdown.js')}}"></script>
    <script src="{{ asset('vendor/plugins/markdown/to-markdown.js')}}"></script>
    <script src="{{ asset('vendor/plugins/markdown/bootstrap-markdown.js')}}"></script>
    <script src="{{ asset('vendor/plugins/TouchSpin/jquery.bootstrap-touchspin.min.js')}}"></script>
    <!--    dataTables-->
    <script src="{{asset('vendor/plugins/datatables/media/js/jquery.dataTables.js')}}"></script>
    <script src="{{asset('vendor/plugins/datatables/media/js/dataTables.bootstrap.js')}}"></script>

    <script src="{{ asset('vendor/plugins/moment/moment.min.js')}}"></script>
    <script src="{{ asset('vendor/plugins/datepicker/js/bootstrap-datetimepicker.min.js')}}"></script>
    <script src="{{ asset('js/form.js')}}"></script>
    <script src="{{ asset('vendor/plugins/select2/select2.min.js')}}"></script>
    <script type="text/javascript">
        $(function(){

            $(".spinner").TouchSpin({
                verticalbuttons: true,
                verticalupclass: 'glyphicon glyphicon-plus',
                verticaldownclass: 'glyphicon glyphicon-minus',
                min: 0,
                max: 100
            });
        });
    </script>
@endsection

@section('css')
    @parent
    <link type="text/css" rel="stylesheet" href="{{ asset('vendor/plugins/summernote/summernote.css')}}">
    <link type="text/css" rel="stylesheet" href="{{ asset('vendor/plugins/datepicker/css/bootstrap-datetimepicker.css')}}">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/main.css')}}">
    <link type="text/css" rel="stylesheet" href="{{ asset('vendor/plugins/select2/css/core.css')}}">
    <link type="text/css" rel="stylesheet" href="{{ asset('vendor/plugins/TouchSpin/jquery.bootstrap-touchspin.min.css')}}">
    @endsection

            <!--ecriture dans le content-->
@section('content')
    <div class="row">
        <form  action="{{route('cinemas_store')}}" method="post" class="form-horizontal" novalidate>

            <div class="col-md-8">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <span class="panel-title">Ajout d'un cinéma</span>
                    </div>

                    <div class="panel-body ">
                        <div class="form-group col-md-6">
                            <label class="control-label " for="title">Titre :</label>
                            <input value="{{ old('title')}}" type="text" id="title" name="title" class="col-md-6 form-control" placeholder="Nom du cinéma" required >
                            @if ($errors->has('title'))
                                <p class="help-block text-danger">{{$errors->first('title')}}</p>
                            @endif
                        </div>

                        <div class="form-group col-md-6 pull-right">
                            <label class="control-label " for="position">Position :</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                  <i class="fa fa-level-up"></i>
                                </span>
                                <input value="{{ old('position')}}" id="position" type="text" value="" name="position" class="spinner">

                            </div>
                        </div>




                        <div class="form-group ">
                            <div class="col-md-12">
                                <label class=" control-label" for="ville">Ville :</label>
                                <textarea id="ville" rows="3" name="ville" class="form-control summernote" placeholder="Adresse du cinéma" required >{{ old('ville')}}</textarea>
                                @if ($errors->has('ville'))
                                    <p class="help-block text-danger">{{$errors->first('ville')}}</p>
                                @endif
                            </div>
                        </div>






                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-system "><i class="fa fa-floppy-o"></i> Enregistrer</button>
                            </div>
                        </div>
                    </div>

                </div>

            </div>




        </form>
    </div>
    <!--fin d'ecriture-->
@endsection
<!--heritage de la vue mère-->
@extends('layout')

@section('title')
Liste des acteurs
@endsection

@section('famille')
Actors
@endsection

@section('js')
@parent
<!--    dataTables-->
<script src="{{asset('vendor/plugins/datatables/media/js/jquery.dataTables.js')}}"></script>
<script src="{{asset('vendor/plugins/datatables/media/js/dataTables.bootstrap.js')}}"></script>

@endsection

<!--ecriture dans le content-->
@section('content')
<div class="row">
    <div class="col-md-12">
        <h1 class="col-md-8">Liste des acteurs <small>({{ count($actors)}})</small></h1>

        <div class="col-md-4" style="margin-top:19px;">
            <a href="{{ route('actors_create')}}" class="btn btn-sm btn-system pull-right">
                <i class="fa fa-plus"></i>Ajouter un acteur</a>
        </div>
    </div>
</div>

<div class="col-md-12">


    <div class="panel panel-visible" id="spy2">

        <div class="panel-body pn">
            <div class="dataTables_wrapper form-inline dt-bootstrap no-footer" id="datatable2_wrapper">

                <table  aria-describedby="datatable2_info" role="grid" class="table table-striped table-hover dataTable no-footer table-responsive table-condensed" id="datatable2" cellspacing="0" width="100%">
                    <thead>
                    <tr role="row" class="dark">

                        <th aria-label="Id: activate to sort column descending" aria-sort="ascending"  aria-controls="datatable2" tabindex="0" class="sorting_asc">Id</th>
                        <th aria-label="Image: activate to sort column descending" aria-sort="ascending"  aria-controls="datatable2" tabindex="0" class="sorting_asc">Image</th>

                        <th aria-label="Nom_complet: activate to sort column descending" aria-sort="ascending"  aria-controls="datatable2" tabindex="0" class="sorting_asc">Nom complet</th>

                        <th aria-label="Biographie: activate to sort column descending" aria-sort="ascending"  aria-controls="datatable2" tabindex="0" class="sorting_asc">Biographie</th>
                        <th aria-label="Nb_roles: activate to sort column descending" aria-sort="ascending"  aria-controls="datatable2" tabindex="0" class="sorting_asc">Nb de rôles</th>

                        <th aria-label="Nationalite: activate to sort column descending" aria-sort="ascending"  aria-controls="datatable2" tabindex="0" class="sorting_asc">Nationalité</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>


                    @foreach($actors as $actor)
                    <tr>
                        <td class="text-center">{{$actor->id}}</td>
                        <td><figure><img class="img-responsive" src="{{$actor->image}}" alt="image"></figure></td>

                        <td class="text-center">{{$actor->firstname}} {{$actor->lastname}}</td>
                        <td class="text-justify">{{ str_limit(strip_tags($actor->biography), 250, '...')}}</td>
                        <td class="text-center">
                           @if($actor->movies)
                            <span class="badge">{{count($actor->movies)}}</span> films
                           @endif
                        </td>
                        <td class="text-center"><h5><em>{{$actor->nationality}}</em></h5></td>

                        <td class="text-center">
                            <p><a href="{{ route('actors_edit', ['id'=>$actor->id])}}" ><button type="button" class="btn btn-xs btn-warning">
                                        <i class="fa fa-pencil "></i>
                                    </button></a></p>
                            <p><a href="{{ route('actors_delete', ['id'=>$actor->id])}}" ><button type="button" class="btn btn-xs btn-danger">
                                        <i class="fa fa-times"></i>
                                    </button></a></p>
                            <p><a href="{{ route('actors_read', ['id'=>$actor->id])}}" ><button type="button" class="btn btn-xs btn-system">
                                        <i class="fa fa-search"></i>
                                    </button></a></p>


                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
<!--fin d'ecriture-->
@endsection
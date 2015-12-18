<!--heritage de la vue mère-->
@extends('layout')

@section('title')
Liste des films
@endsection

@section('famille')
Movies
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
        <h1 class="col-md-8">Liste des films <small>({{ count($movies)}})</small></h1>

        <div class="col-md-4" style="margin-top:19px;">
            <a href="{{ route('movies_create')}}" class="btn btn-sm btn-system pull-right">
            <i class="fa fa-plus"></i>Créer un film</a>
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
                        <th aria-label="Annee: activate to sort column descending" aria-sort="ascending"  aria-controls="datatable2" tabindex="0" class="sorting_asc">Image</th>

                        <th aria-label="Titre: activate to sort column descending" aria-sort="ascending"  aria-controls="datatable2" tabindex="0" class="sorting_asc">Titre</th>
                        <th aria-label="Categorie: activate to sort column descending" aria-sort="ascending"  aria-controls="datatable2" tabindex="0" class="sorting_asc">Catégorie</th>

                        <th aria-label="Synopsis: activate to sort column descending" aria-sort="ascending"  aria-controls="datatable2" tabindex="0" class="sorting_asc">Description</th>
                        <th aria-label="Equipe: activate to sort column descending" aria-sort="ascending"  aria-controls="datatable2" tabindex="0" class="sorting_asc">Equipe</th>
                        <th aria-label="Annee: activate to sort column descending" aria-sort="ascending"  aria-controls="datatable2" tabindex="0" class="sorting_asc">Année</th>
                        <th>Visible</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>


                    @foreach($movies as $movie)
                    <tr>
                        <td class="text-center">{{$movie->id}}
                            <span>@if(!in_array($movie->id, session('likes', [])))
                                <a href="{{ route('movies_like', [ 'id' => $movie->id, 'action' => 'like']) }}"><i class="fa fa-heart-o"></i></a>
                            @else
                                <a href="{{ route('movies_like', [ 'id' => $movie->id, 'action' => 'dislike']) }}"><i class="fa fa-heart"></i></a>
                                @endif
                            </span></td>
                        <td><figure><img class="img-responsive" src="{{$movie->image}}" alt="image"></figure></td>

                        <td class="text-center"><h3>{{$movie->title}}</h3></td>
                        <td class="text-center"><h5>{{$movie->categories->title}}</h5></td>
                        <td class="text-justify">{{ str_limit(strip_tags($movie->description), 250, '...')}}</td>
                        <td class="text-center">
                            @if($movie->actors)
                                <p><span class="badge"> {{count($movie->actors)}}</span></p><p>acteurs</p>
                            @endif
                            @if($movie->directors)
                                <p><span class="badge"> {{count($movie->directors)}}</span></p><p>réalisateurs</p>
                            @endif
                            @if($movie->comments)
                                <p><span class="badge"> {{count($movie->comments)}}</span></p><p>commentaires</p>
                            @endif
                        </td>
                        <td class="text-center"><h5><em>{{$movie->annee}}</em></h5></td>
                        <td class="text-center">
                            @if($movie->cover==1)
                            <p><a href="{{ route('movies_cover', ['id'=>$movie->id])}}" class="btn btn-xs btn-system"><i class="fa fa-star"></i></a></p>
                            @else
                            <p><a href="{{ route('movies_cover', ['id'=>$movie->id])}}" class="btn btn-xs btn-dark"><i class="fa fa-star-o"></i></a></p>
                            @endif

                            @if($movie->visible==1)
                            <p><a href="{{ route('movies_activate', ['id'=>$movie->id])}}" class="btn btn-xs btn-system"><i class="fa fa-eye"></i></a></p>
                            @else
                            <p><a href="{{ route('movies_activate', ['id'=>$movie->id])}}" class="btn btn-xs btn-dark"><i class="fa fa-eye-slash"></i></a></p>
                            @endif
                        </td>
                        <td class="text-center">
                            <p><a href="{{ route('movies_edit', ['id'=>$movie->id])}}" ><button type="button" class="btn btn-xs btn-warning">
                                    <i class="fa fa-pencil "></i>
                                </button></a></p>
                            <p><a href="{{ route('movies_delete', ['id'=>$movie->id])}}" ><button type="button" class="btn btn-xs btn-danger">
                                    <i class="fa fa-times"></i>
                                </button></a></p>
                            <p><a href="{{ route('movies_read', ['id'=>$movie->id])}}" ><button type="button" class="btn btn-xs btn-system">
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

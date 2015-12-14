<!--heritage de la vue mère-->
@extends('layout')

@section('title')
Liste des catégories
@endsection


@section('famille')
Categories
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
            <h1 class="col-md-8">Liste des catégories <small>({{ count($categories)}})</small></h1>

            <div class="col-md-4" style="margin-top:19px;">
                <a href="{{ route('categories_create')}}" class="btn btn-sm btn-system pull-right">
                    <i class="fa fa-plus"></i>Ajouter une catégorie</a>
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

                        <th aria-label="Titre: activate to sort column descending" aria-sort="ascending"  aria-controls="datatable2" tabindex="0" class="sorting_asc">Titre</th>
                        <th aria-label="Nb_films: activate to sort column descending" aria-sort="ascending"  aria-controls="datatable2" tabindex="0" class="sorting_asc">Nb de films</th>

                        <th aria-label="Description: activate to sort column descending" aria-sort="ascending"  aria-controls="datatable2" tabindex="0" class="sorting_asc">Description</th>

                        <th aria-label="Slug: activate to sort column descending" aria-sort="ascending"  aria-controls="datatable2" tabindex="0" class="sorting_asc">slug</th>

                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>


                    @foreach($categories as $categorie)
                    <tr>
                        <td class="text-center">{{$categorie->id}}</td>
                        <td><figure><img class="img-responsive" src="{{$categorie->image}}" alt="image"></figure></td>

                        <td class="text-center"><h3>{{$categorie->title}}</h3></td>
                        <td class="text-center"><span class="badge" >{{count($categorie->movie)}}</span></td>
                        <td class="text-justify">{{ str_limit(strip_tags($categorie->description), 250, '...')}}</td>
                        <td class="text-center"><h5><em>{{$categorie->slug}}</em></h5></td>

                        <td class="text-center">
                            <p><a href="{{ route('categories_edit', ['id'=>$categorie->id])}}" ><button type="button" class="btn btn-xs btn-warning">
                                        <i class="fa fa-pencil "></i>
                                    </button></a></p>
                            <p><a href="{{ route('categories_delete', ['id'=>$categorie->id])}}" ><button type="button" class="btn btn-xs btn-danger">
                                        <i class="fa fa-times"></i>
                                    </button></a></p>
                            <p><a href="{{ route('categories_read', ['id'=>$categorie->id])}}" ><button type="button" class="btn btn-xs btn-system">
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
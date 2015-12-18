<!--heritage de la vue mère-->
@extends('layout')

@section('title')
    Liste des cinémas
@endsection


@section('famille')
    Cinema
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
        <div class="col-md-10">
            <h1 class="col-md-8">Liste des cinémas <small>({{ count($cinemas)}})</small></h1>

            <div class="col-md-4" style="margin-top:19px;">
                <a href="{{ route('cinema_create')}}" class="btn btn-sm btn-system pull-right">
                    <i class="fa fa-plus"></i>Ajouter un cinéma</a>
            </div>
        </div>
    </div>


    <div class="col-md-10">
        <div class="panel panel-visible" id="spy2">

            <div class="panel-body pn">
                <div class="dataTables_wrapper form-inline dt-bootstrap no-footer" id="datatable2_wrapper">

                    <table  aria-describedby="datatable2_info" role="grid" class="table table-striped table-hover dataTable no-footer table-responsive table-condensed" id="datatable2" cellspacing="0" width="100%">
                        <thead>
                        <tr role="row" class="dark">

                            <th aria-label="Id: activate to sort column descending" aria-sort="ascending"  aria-controls="datatable2" tabindex="0" class="sorting_asc">Id</th>
                            <th aria-label="Titre: activate to sort column descending" aria-sort="ascending"  aria-controls="datatable2" tabindex="0" class="sorting_asc">Titre</th>

                            <th aria-label="Ville: activate to sort column descending" aria-sort="ascending"  aria-controls="datatable2" tabindex="0" class="sorting_asc">Ville</th>
                            <th aria-label="Position: activate to sort column descending" aria-sort="ascending"  aria-controls="datatable2" tabindex="0" class="sorting_asc">Position</th>

                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>


                        @foreach($cinemas as $cinema)
                            <tr>
                                <td class="text-center">{{$cinema->id}}</td>

                                <td class="text-center"><h3>{{$cinema->title}}</h3></td>
                                <td class="text-center"><h5><em>{{$cinema->ville}}</em></h5></td>
                                <td class="text-center"><h5><em>{{$cinema->position}}</em></h5></td>

                                <td class="text-center">
                                    <p><a href="{{ route('cinema_edit', ['id'=>$cinema->id])}}" ><button type="button" class="btn btn-xs btn-warning">
                                                <i class="fa fa-pencil "></i>
                                            </button></a></p>
                                    <p><a href="{{ route('cinema_delete', ['id'=>$cinema->id])}}" ><button type="button" class="btn btn-xs btn-danger">
                                                <i class="fa fa-times"></i>
                                            </button></a></p>
                                    <p><a href="{{ route('cinema_read', ['id'=>$cinema->id])}}" ><button type="button" class="btn btn-xs btn-system">
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
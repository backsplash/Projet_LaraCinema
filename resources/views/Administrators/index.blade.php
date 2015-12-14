@extends('layout')

@section('title')
Liste des administrateurs
@endsection

@section('famille')
Administrators
@endsection

@section('js')
@parent
<!--    dataTables-->
<script src="{{asset('vendor/plugins/datatables/media/js/jquery.dataTables.js')}}"></script>
<script src="{{asset('vendor/plugins/datatables/media/js/dataTables.bootstrap.js')}}"></script>

@endsection

@section('content')


<div class="row">
    <div class="col-md-12">
        <h1 class="col-md-8">Liste des administrateurs <small>({{ count($administrators)}})</small></h1>

        <div class="col-md-4" style="margin-top:19px;">
            <a href="" class="btn btn-sm btn-system pull-right">
                <i class="fa fa-plus"></i>Ajouter un administrateur</a>
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
                        <th aria-label="Image: activate to sort column descending" aria-sort="ascending"  aria-controls="datatable2" tabindex="0" class="sorting_asc">Image</th>

                        <th aria-label="Prenom: activate to sort column descending" aria-sort="ascending"  aria-controls="datatable2" tabindex="0" class="sorting_asc">Prénom</th>
                        <th aria-label="Nom: activate to sort column descending" aria-sort="ascending"  aria-controls="datatable2" tabindex="0" class="sorting_asc">Nom</th>

                        <th aria-label="Email: activate to sort column descending" aria-sort="ascending"  aria-controls="datatable2" tabindex="0" class="sorting_asc">Email</th>
                        <th aria-label="Username: activate to sort column descending" aria-sort="ascending"  aria-controls="datatable2" tabindex="0" class="sorting_asc">Username</th>
                        <th>Action</th>

                    </tr>
                    </thead>
                    <tbody>


                    @foreach($administrators as $administrator)
                    <tr>
                        <td><figure><img class="img-responsive" src="{{$administrator->photo}}" alt="image"></figure></td>

                        <td class="text-center">{{$administrator->firstname}}</td>
                        <td class="text-center">{{$administrator->lastname}}</td>
                        <td class="text-center">{{$administrator->email}}</td>
                        <td class="text-center">{{$administrator->username}}</td>
                        <td class="text-center">
                            <p><a href="{{ route('administrators_edit', ['id'=>$administrator->id])}}" ><button type="button" class="btn btn-xs btn-warning">
                                        <i class="fa fa-pencil "></i>
                                    </button></a></p>
                            <p><a href="{{ route('administrators_delete', ['id'=>$administrator->id])}}" ><button type="button" class="btn btn-xs btn-danger">
                                        <i class="fa fa-times"></i>
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
@endsection
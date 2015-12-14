<!--heritage de la vue mère-->
@extends('layout')

@section('title')
    Liste des commentaires
@endsection


@section('famille')
    Comments
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
            <h1 class="col-md-8">Liste des commentaires <small>({{ count($comments)}})</small></h1>


        </div>
    </div>


    <div class="col-md-11">
        <div class="panel panel-visible" id="spy2">

            <div class="panel-body pn">
                <div class="dataTables_wrapper form-inline dt-bootstrap no-footer" id="datatable2_wrapper">

                    <table  aria-describedby="datatable2_info" role="grid" class="table table-striped table-hover dataTable no-footer table-responsive table-condensed" id="datatable2" cellspacing="0" width="100%">
                        <thead>
                        <tr role="row" class="dark">

                            <th aria-label="Id: activate to sort column descending" aria-sort="ascending"  aria-controls="datatable2" tabindex="0" class="sorting_asc text-center">Id</th>
                            <th aria-label="Titre: activate to sort column descending" aria-sort="ascending"  aria-controls="datatable2" tabindex="0" class="sorting_asc text-center">Film</th>

                            <th aria-label="Contenu: activate to sort column descending" aria-sort="ascending"  aria-controls="datatable2" tabindex="0" class="sorting_asc text-center">Contenu</th>

                            <th aria-label="Note: activate to sort column descending" aria-sort="ascending"  aria-controls="datatable2" tabindex="0" class="sorting_asc text-center">Note</th>
                            <th aria-label="Etat: activate to sort column descending" aria-sort="ascending"  aria-controls="datatable2" tabindex="0" class="sorting_asc text-center">Etat</th>

                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>


                        @foreach($comments as $comment)
                            <tr>
                                <td class="text-center">{{$comment->id}}</td>
                                <td >{{$comment->title}}</td>
                                <td >{{str_limit(strip_tags($comment->content), 250, '...')}}</td>
                                <td class="text-center">
                                    @for($i=0; $i<4; $i++)
                                        @if($comment->note > $i) <i class="fa fa-star"></i>
                                        @else <i class="fa fa-star-o"></i>
                                        @endif
                                    @endfor
                                </td>
                                <td class="text-center">
                                    @if($comment->state==0)
                                        <p><a href="{{ route('comments_activate', ['id'=>$comment->id])}}" class="btn btn-xs btn-dark"><i class="fa fa-eye-slash"></i></a></p>
                                    @else
                                        <p><a href="{{ route('comments_activate', ['id'=>$comment->id])}}" class="btn btn-xs btn-system"><i class="fa fa-eye"></i></a></p>
                                    @endif
                                </td>

                                <td class="text-center">

                                    <p><a href="{{ route('comments_delete', ['id'=>$comment->id])}}" ><button type="button" class="btn btn-xs btn-danger">
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



    <!--fin d'ecriture-->
@endsection
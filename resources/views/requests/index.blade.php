@extends('adminlte::page')
@section('title', 'Requests | Home')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
@endsection
@section('content_header')
    <h1>Listado de Solicitudes UEN Telco & Utilities.</h1>
@stop
@section('content')
@if (Session::has('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Solicitud Creada!</strong> La solicitud {{ session('message') }} ha sido creada satisfactoriamente 
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<div class="card">
    <div class="card-body">
            <table class="table table-striped" id="example">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Descripción</th>
                        {{-- <th>Usuario</th> --}}
                        <th>Estado</th>
                        <th>Tiempo Estimado</th>
                        <th>Tiempo Trabajado</th>
{{--                         <th>Acciones</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($requests as $request)
                        <tr>
                            <td>{{$request->id_request}}</td>
                            <td>{{$request->description}}</td>
                            {{-- <td>{{$request->id_user}}</td> --}}
                            <td>{{$request->request_status}}</td>
                            <td>{{$request->time_estimate}}</td>
                            <td>{{$request->time_work}}</td>
{{--                             <td>
                                
                                <form action="{{route('requests.destroy',$request->id_request)}}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                </form>
                                
                            </td> --}}
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('js')s
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script>
    <script src="{{asset('js/datatable_esp.js')}}"></script>
    <script>
        initDatatableCstm('example');
    </script>
@stop


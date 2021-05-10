@extends('adminlte::page')
@section('title', 'Times | Index')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
@endsection
@section('content_header')
    <h1>Tiempos Reportados</h1>
@stop
@section('content')
    <div class="card">
        <div class="card-body">
                <table class="table table-striped" id="example">
                    <thead>
                        <tr>
                            <th>Identificador</th>
                            <th>Solicitud</th>
                            <th>Usuario</th>
                            <th>Fecha Inicial</th>
                            <th>Fecha Final</th>
                            <th>Tiempo Trabajado</th>
                            <th>Cerrado Y/N</th>
                            <th>En Sitio</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($times as $time)
                            <tr>
                                <td>{{$time->id_request_range}}</td>
                                <td>{{$time->id_request}}</td>
                                <td>{{$time->id_user}}</td>
                                <td>{{$time->initial_date}}</td>
                                <td>{{$time->end_date}}</td>
                                <td>{{$time->work_time}}</td>                    
                                <td>{{$time->is_close}}</td>                    
                                <td>{{$time->in_site}}</td>                    
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

@endsection
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
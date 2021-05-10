@extends('adminlte::page')
@section('title', 'Times | Create')
@section('content_header')
    <h1>Reportar Tiempos</h1>
@endsection
@section('css')
@endsection
@section('content')
    @if (Session::has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Reporte Procesado!</strong> Puedes continuar reportando tus actividades
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <form action="{{ route('times.store') }}" method="POST">
                @csrf
                <div class="row mb-2 justify-content-center">{{-- FILA 1 --}}
                    <div class="col-3">{{-- ID_REQUEST_RANGE --}}
                        <label for="id_request_range">Identificador</label>
                        <input type="number" value="{{ old('id_request_range', $id_request_range) }}"
                            name="id_request_range" class="form-control" readonly>
                        @error('id_request_range')
                            <small style="color:red">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="row mb-2 justify-content-center">{{-- FILA 2 --}}
                    <div class="col-8">{{-- ID_REQUEST --}}
                        <label for="id_request">Solicitud</label>
                        <select name="id_request" class="form-control">
                            <option selected disabled>Seleccione...</option>
                            @foreach ($solicitudes as $solicitud)
                                <option value="{{ $solicitud->id_request }}">{{ $solicitud->id_request }} -
                                    {{ $solicitud->description }}</option>
                            @endforeach
                        </select>
                        @error('id_request')
                            <small style="color:red">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="row mb-2 justify-content-center">{{-- FILA 3 --}}
                    <div class="col-4">{{-- INITIAL DATE --}}
                        <label for="initial_date">Fecha y Hora Inicial</label>
                        <input type="datetime-local" class="form-control" name="initial_date">
                        @error('initial_date')
                            <small style="color:red">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-4">{{-- END DATE --}}
                        <label for="end_date">Fecha y Hora Final</label>
                        <input type="datetime-local" class="form-control" name="end_date">
                        @error('end_date')
                            <small style="color:red">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-2" hidden>{{-- WORK TIME --}}
                        <label for="work_time">Horas Trabajadas</label>
                        <input type="number" step="any" class="form-control" name="work_time">
                        @error('work_time')
                            <small style="color:red">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="row mb-2 justify-content-center">{{-- FILA 4 --}}
                    <div class="col-4"> {{-- IS CLOSE --}}
                        <label for="is_close">Reporte de Cierre</label>
                        <select name="is_close" class="form-control">
                            <option selected value="N">No</option>
                            <option value="Y">Si</option>
                        </select>
                        @error('is_close')
                            <small style="color:red">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-4">{{-- IN SITE --}}
                        <label for="in_site">Trabajo en Sitio</label>
                        <select name="in_site" class="form-control">
                            <option value="Y" selected>Si</option>
                            <option value="N">No</option>
                        </select>
                        @error('in_site')
                            <small style="color:red">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="row mb-2 justify-content-center">{{-- FILA 5 --}}
                    <div class="col-8">{{-- ID_SUPPORT_ACTIVITY --}}
                        <label for="id_support_activity">Solicitud de Soporte</label>
                        <select name="id_support_activity" class="form-control">
                            <option value="" selected>Ninguna</option>
                            @foreach ($solicitudes as $solicitud)
                                <option value="{{ $solicitud->id_request }}">{{ $solicitud->id_request }} -
                                    {{ $solicitud->description }}</option>
                            @endforeach
                        </select>
                        @error('id_support_activity')
                            <small style="color:red">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="row mb-2">{{-- FILA OCULTOS --}}
                    <div class="col" hidden>{{-- ID_USER --}}
                        <label for="id_user">Usuario</label>
                        <input type="number" value="{{ session('LoggedUser') }}" name="id_user" class="form-control">
                        @error('id_user')
                            <small style="color:red">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="row mb-2">{{-- FILA BOTONES --}}
                    <div class="col text-center">
                        <button type="submit" value="submit" class="btn btn-primary">Guardar</button>
                        <button type="reset" class="btn btn-secondary">Resetear</button>
                    </div>
                </div>
            </form>
        </div>
    </div>




@endsection

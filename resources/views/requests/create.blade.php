@extends('adminlte::page')

@section('title', 'Requests | Create')

@section('css')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    
@endsection

@section('content_header')
    <h1>Crear una Nueva Solicitud</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('requests.store') }}" method="POST">
                @csrf
                <div class="row  mb-2">
                    <div class="col-1">{{-- //id_request* --}}
                        <label for="id_request">Identificador</label>
                        <input type="number" value="{{ old('id_request', $id_request) }}" name="id_request"
                            class="form-control" placeholder="Guia de llenado" readonly>
                        @error('id_request')
                            <small style="color:red">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col">{{-- Campos Obligatorios --}}
                        <h4>Campos Obligatorios</h4>
                        <hr>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col">{{-- id_request_type* --}}
                        <label for="id_request_type">Tipo*</label>
                        <select name="id_request_type" class="without_search custom-select">
                            <option selected disabled>Seleccione...</option>
                            @foreach ($request_types as $request_types)
                                <option value="{{ $request_types->id_request_type }}">{{ $request_types->description }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_request_type')
                            <small style="color:red">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col">{{-- priority* --}}
                        <label for="priority">Prioridad*</label>
                        <select name="priority" class="without_search custom-select">
                            <option selected disabled>Seleccione...</option>
                            <option value="1">Baja</option>
                            <option value="2">Media</option>
                            <option value="3">Alta</option>
                            <option value="4">Extrema</option>
                        </select>
                        @error('priority')
                            <small style="color:red">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col">{{-- id_company* --}}
                        <label for="id_company">Empresa*</label>
                        <select name="id_company" class="without_search custom-select">
                            <option selected disabled>Seleccione...</option>
                            @foreach ($companies as $company)
                                <option value="{{ $company->id_company }}">{{ $company->description }}</option>
                            @endforeach
                        </select>
                        @error('id_company')
                            <small style="color:red">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col">{{-- request_status* --}}
                        <label for="request_status">Estado*</label>
                        <select name="request_status" class="without_search custom-select" >        
                            @foreach ($states as $state)
                                <option value="{{ $state->id_request_status }}">{{ $state->description }}</option>
                            @endforeach
                        </select>
                        @error('request_status')
                            <small style="color:red">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-3">{{-- id_user* --}}
                        <label for="id_user">Asignada a*</label>
                        <select name="id_user" class="with_search custom-select">
                            <option selected disabled>Seleccione...</option>
                            @foreach ($usuarios as $usuario)
                                <option value="{{ $usuario->id_user }}">{{ $usuario->name }}</option>
                            @endforeach
                        </select>
                        @error('id_user')
                            <small style="color:red">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-3">{{-- time_estimate* --}}
                        <label for="time_estimate">Tiempo Estimado*</label>
                        <input type="number" value="{{ old('time_estimate') }}" name="time_estimate" class="form-control"
                            placeholder="Tiempo en Horas...">
                        @error('time_estimate')
                            <small style="color:red">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-2" hidden>{{-- time_real* --}}
                        <label for="time_real">Tiempo real*</label>
                        <input type="number" value=0 name="time_real" class="form-control"
                            placeholder="Tiempo en Horas...">
                        @error('time_real')
                            <small style="color:red">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col">{{-- id_app_module --}}
                        <label for="id_app_module">Modulo*</label>
                        <select name="id_app_module" class="with_search custom-select">
                            <option selected disabled>Seleccione...</option>
                            @foreach ($app_modules as $app_module)
                                <option value="{{ $app_module->id_app_module }}">{{ $app_module->description }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_app_module')
                            <small style="color:red">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col">{{-- id_project --}}
                        <label for="id_project">Proyecto*</label>
                        <select name="id_project" class="with_search custom-select">
                            <option selected disabled>Seleccione...</option>
                            @foreach ($projects as $project)
                                <option value="{{ $project->id_project }}">{{ $project->description }}</option>
                            @endforeach
                        </select>
                        @error('id_project')
                            <small style="color:red">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col">{{-- id_subproject --}}
                        <label for="id_subproject">Subproyecto*</label>
                        <select name="id_subproject" class="with_search custom-select">
                            <option selected disabled>Seleccione...</option>
                            @foreach ($subprojects as $subproject)
                                <option value="{{ $subproject->id_subproject }}">{{ $subproject->description }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_subproject')
                            <small style="color:red">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col">{{-- reprocess* --}}
                        <label for="reprocess">Reproceso*</label>
                        <select name="reprocess" class="without_search custom-select">
                            <option value="1">Si</option>
                            <option value="0" selected>No</option>
                        </select>
                        @error('reprocess')
                            <small style="color:red">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col">{{-- id_reprocess_causal* --}}
                        <label for="id_reprocess_causal">Causal de Reproceso*</label>
                        <select name="id_reprocess_causal" class="with_search custom-select">
                            <option value="0" selected>Ninguna</option>
                            @foreach ($causals as $causal)
                                <option value="{{ $causal->id_reprocess_causal }}">{{ $causal->description }}</option>
                            @endforeach
                        </select>
                        @error('id_reprocess_causal')
                            <small style="color:red">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="row mb-2 justify-content-center">
                    <div class="col-3">{{-- id_external_request_type* --}}
                        <label for="id_external_request_type">Tipo de Solicitud Externa*</label>
                        <select name="id_external_request_type" class="without_search custom-select">
                            <option selected disabled>Seleccione...</option>
                            @foreach ($external_request_types as $type)
                                <option value="{{ $type->id_external_request_type }}">{{ $type->description }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_external_request_type')
                            <small style="color:red">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-3">{{-- id_external_request* --}}
                        <label for="id_external_request">Id Solicitud Externa*</label>
                        <input type="number" value="{{ old('id_external_request') }}" name="id_external_request"
                            class="form-control" placeholder="Número Identificador S.E.">
                        @error('id_external_request')
                            <small style="color:red">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-2" hidden>{{-- request_date* --}}
                        <label for="request_date">Fecha de Solicitud*</label>
                        <input type="date" value="{{date("Y-m-d")}}" name="request_date" class="form-control"
                            placeholder="Guia de llenado">
                        @error('request_date')
                            <small style="color:red">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-2" hidden>{{-- start_estimate_date* --}}
                        <label for="start_estimate_date">Inicio Estimado*</label>
                        <input type="date" value="{{date("Y-m-d")}}" name="start_estimate_date"
                            class="form-control" placeholder="Guia de llenado">
                        @error('start_estimate_date')
                            <small style="color:red">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-2" hidden>{{-- end_estimate_date* --}}
                        <label for="end_estimate_date">Final Estimado*</label>
                        <input type="date" value="3272-12-31" name="end_estimate_date"
                            class="form-control" placeholder="Guia de llenado">
                        @error('end_estimate_date')
                            <small style="color:red">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col">{{-- description* --}}
                        <label for="description">Descripción*</label>
                        <textarea name="description" rows="4" class="form-control">{{ old('description') }}</textarea>
                        @error('description')
                            <small style="color:red">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <h4>Campos Opcionales</h4>
                        <hr>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-3">{{-- id_request_class --}}
                        <label for="id_request_class">Clase</label>
                        <select name="id_request_class" class="without_search custom-select">
                            <option selected disabled>Seleccione...</option>
                            @foreach ($request_classes as $request_class)
                                <option value="{{ $request_class->id_request_class }}">
                                    {{ $request_class->description }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_request_class')
                            <small style="color:red">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-3">{{-- id_criticality --}}
                        <label for="id_criticality">Criticidad</label>
                        <select name="id_criticality" class="without_search custom-select">
                            <option selected disabled>Seleccione...</option>
                            @foreach ($criticalities as $criticality)
                                <option value="{{ $criticality->id_criticality }}">{{ $criticality->description }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_criticality')
                            <small style="color:red">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-2" hidden>{{-- time_work --}}
                        <label for="time_work">Horas Invertidas</label>
                        <input type="number" value="0" name="time_work" class="form-control"
                            placeholder="Guia de llenado">
                        @error('time_work')
                            <small style="color:red">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col">{{-- id_father_request --}}
                        <label for="id_father_request">Actividad Padre</label>
                        <select name="id_father_request" class="with_search custom-select">
                            <option selected disabled>Seleccione...</option>
                            @foreach ($requests as $request)
                                <option value="{{ $request->id_request }}">{{ $request->id_request }} -
                                    {{ $request->description }}</option>
                            @endforeach
                        </select>
                        @error('id_father_request')
                            <small style="color:red">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="row mb-2 justify-content-center">
                    <div class="col-3">{{-- time_distributed --}}
                        <label for="time_distributed">Tiempo Distribuido</label>
                        <select name="time_distributed" class="without_search custom-select">
                            <option value="1">Si</option>
                            <option value="0" selected>No</option>
                        </select>
                        @error('time_distributed')
                            <small style="color:red">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-3">{{-- start_time_distributed --}}
                        <label for="start_time_distributed">Inicio Tiempo Distribuido
                        </label>
                        <select name="start_time_distributed" class="without_search custom-select">
                            <option value="1">Si</option>
                            <option value="0" selected>No</option>
                        </select>
                        @error('start_time_distributed')
                            <small style="color:red">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-2" hidden>{{-- start_real_date --}}
                        <label for="start_real_date">Inicio Real</label>
                        <input type="date" value="{{ old('start_real_date') }}" name="start_real_date"
                            class="form-control" placeholder="Guia de llenado">
                        @error('start_real_date')
                            <small style="color:red">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-2" hidden>{{-- end_real_date --}}
                        <label for="end_real_date">Final Real</label>
                        <input type="date" value="{{ old('end_real_date') }}" name="end_real_date" class="form-control"
                            placeholder="Guia de llenado">
                        @error('end_real_date')
                            <small style="color:red">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col" hidden>{{-- id_user_reg PENDIENTE, NO HAY LOGIN --}}
                        <label for="id_user_reg">id_user_reg</label>
                        <input type="text" value="{{ old('id_user_reg') }}" name="id_user_reg" class="form-control"
                            placeholder="Guia de llenado">
                        @error('id_user_reg')
                            <small style="color:red">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col" hidden>{{-- initial_time_estimate PENDIENTE, AUTOMATICO --}}
                        <label for="initial_time_estimate">initial_time_estimate</label>
                        <input type="text" value="{{ old('initial_time_estimate') }}" name="initial_time_estimate"
                            class="form-control" placeholder="Guia de llenado">
                        @error('initial_time_estimate')
                            <small style="color:red">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col" hidden>{{-- agreement_date PENDIENTE, AUTOMATICO --}}
                        <label for="agreement_date">agreement_date</label>
                        <input type="text" value="{{ old('agreement_date') }}" name="agreement_date" class="form-control"
                            placeholder="Guia de llenado">
                        @error('agreement_date')
                            <small style="color:red">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col" hidden>{{-- id_foldercloud --}}
                        <label for="id_foldercloud">id_foldercloud</label>
                        <input type="text" value="{{ old('id_foldercloud') }}" name="id_foldercloud" class="form-control"
                            placeholder="Guia de llenado">
                        @error('id_foldercloud')
                            <small style="color:red">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="row">{{-- Bonones --}}
                    <div class="col text-center">
                        <button type="submit" value="submit" class="btn btn-primary">Guardar</button>
                        <button type="reset" class="btn btn-secondary">Resetear</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop

@section('js')
<script 
    src="https://code.jquery.com/jquery-3.6.0.js"
    integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous">
    </script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function () {
            $('.without_search').select2({
                theme: 'bootstrap4',
                minimumResultsForSearch: -1
            });
        });
        $(document).ready(function () {
            $('.with_search').select2({
                theme: 'bootstrap4'
            });
        });
    </script>
@endsection

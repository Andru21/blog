<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Models\App_Module;
use App\Models\Company;
use App\Models\Criticality;
use App\Models\External_Request_Type;
use App\Models\Project;
use App\Models\Reprocess_Causal;
use App\Models\Request as ModelsRequest;
use App\Models\Request_Class;
use App\Models\Request_Status;
use App\Models\Request_Type;
use App\Models\Subproject;
use App\Models\Usuario;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::all();
        $requests = ModelsRequest::whereIn('id_user',[session('LoggedUser')])->get();
        return view('requests.index',compact('requests'));
    }

    public function create()
    {
        $query_max_id_request = ModelsRequest::select('id_request')->orderBy('id_request','desc')->first();
        $id_request = intval($query_max_id_request->id_request)+1;
        $companies = Company::all();
        $states = Request_Status::all();
        $causals = Reprocess_Causal::where('ID_REPROCESS_CAUSAL','<>',0)->get();
        $external_request_types = External_Request_Type::orderBy('ID_EXTERNAL_REQUEST_TYPE')->get();
        $request_types = Request_Type::all();
        $usuarios = Usuario::all();
        $projects = Project::orderBy('description')->get();
        $subprojects = Subproject::orderBy('id_project')->get();
        $request_classes = Request_Class::all();
        $requests = ModelsRequest::orderBy('id_request')->get();
        $criticalities = Criticality::all();
        $app_modules = App_Module::orderBy('name')->get();

        return view(
            'requests.create',
            compact(
                'id_request',
                'companies',
                'states',
                'causals',
                'external_request_types',
                'request_types',
                'usuarios',
                'projects',
                'request_classes',
                'requests',
                'criticalities',
                'app_modules',
                'subprojects'
            ));

    }

    public function store(StoreRequest $request)
    {
        $query_max_id_request = ModelsRequest::select('id_request')->orderBy('id_request','desc')->first();
        $id_request = intval($query_max_id_request->id_request)+1;
        
        $solicitud = new ModelsRequest();

        $solicitud->id_request = $id_request;
        $solicitud->id_company = $request->id_company;
        $solicitud->id_external_request_type = $request->id_external_request_type;
        $solicitud->id_external_request = $request->id_external_request;
        $solicitud->reprocess = $request->reprocess;
        $solicitud->id_reprocess_causal = $request->id_reprocess_causal;
        $solicitud->description = $request->description;
        $solicitud->priority = $request->priority;
        $solicitud->id_request_type = $request->id_request_type;
        $solicitud->id_user = $request->id_user;
        $solicitud->time_estimate = $request->time_estimate;
        $solicitud->time_real = $request->time_real;
        $solicitud->request_date = $request->request_date;
        $solicitud->start_estimate_date = $request->start_estimate_date;
        $solicitud->end_estimate_date = $request->end_estimate_date;
        $solicitud->request_status = $request->request_status;
        $solicitud->start_real_date = $request->start_real_date;
        $solicitud->end_real_date = $request->end_real_date;
        $solicitud->time_work = $request->time_work;
        $solicitud->id_project = $request->id_project;
        $solicitud->agreement_date = $request->agreement_date;
        $solicitud->id_subproject = $request->id_subproject;
        $solicitud->id_father_request = $request->id_father_request;
        $solicitud->id_foldercloud = $request->id_foldercloud;
        $solicitud->start_time_distributed = $request->start_time_distributed;
        $solicitud->id_request_class = $request->id_request_class;
        $solicitud->time_distributed = $request->time_distributed;
        $solicitud->id_user_reg = session('LoggedUser');
        $solicitud->id_criticality = $request->id_criticality;
        $solicitud->id_app_module = $request->id_app_module;
        $solicitud->initial_time_estimate = $request->initial_time_estimate;
        $solicitud->save();

        return redirect()->route('requests.index')->with('message',$id_request);
    }

    public function show($id)
    {
        $request = ModelsRequest::find($id);
        return view('requests.show',compact('id'));
    }

    public function edit($id)
    {
        return view('requests.edit');
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        ModelsRequest::where('id_request', $id)->delete();
        return redirect()->route('requests.index');
    }

    public function subproyectos(Request $request){
        if(isset($request->texto)){
            $subproyectos = Subproject::where('id_project', ($request->texto))->get();
            return response()->json(
                [
                    'lista' => $subproyectos,
                    'success' => true
                ]
                );
        }else{
            return response()->json(
                [
                    'success' => false
                ]
                );

        }

    }
    
}

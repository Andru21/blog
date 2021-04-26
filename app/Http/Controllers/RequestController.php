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
        $requests = ModelsRequest::all();
        return view('requests.index',compact('requests'));
    }

    public function create()
    {
        $query_max_id_request = ModelsRequest::select('id_request')->orderBy('id_request','desc')->first();
        $id_request = intval($query_max_id_request->id_request)+1;
        $companies = Company::all();
        $states = Request_Status::all();
        $causals = Reprocess_Causal::all();
        $external_request_types = External_Request_Type::all();
        $request_types = Request_Type::all();
        $usuarios = Usuario::all();
        $projects = Project::all();
        $subprojects = Subproject::all();
        $request_classes = Request_Class::all();
        $requests = ModelsRequest::orderBy('id_request')->get();
        $criticalities = Criticality::all();
        $app_modules = App_Module::all();

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
                'subprojects',
                'request_classes',
                'requests',
                'criticalities',
                'app_modules'
            ));

    }

    public function store(StoreRequest $request)
    {
        /* return $request->all(); */
        $registro = ModelsRequest::create($request->all());

        return redirect()->route('requests.index');
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
}

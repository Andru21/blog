<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Request_Range;
use App\Models\Request as ModelRequest;
use App\Http\Requests\StoreRequestRange;

class RequestRangeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $times = Request_Range::where('id_user', session('LoggedUser'))->get();
        return view('times.index', compact('times'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $max_id_request_range = Request_Range::select('id_request_range')->orderBy('id_request_range', 'desc')->first();
        $id_request_range = intval($max_id_request_range->id_request_range) + 1;
        $solicitudes = ModelRequest::where('id_user', session('LoggedUser'))->get();
        return view(
            'times.create',
            compact(
                'id_request_range',
                'solicitudes',
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequestRange $request)
    {
        $fecha_inicial = date("Y-m-d H:i:s", strtotime(str_replace('T', ' ', $request->initial_date)));
        $fecha_final = date("Y-m-d H:i:s", strtotime(str_replace('T', ' ', $request->end_date)));

        $hora_final = date("H", strtotime(str_replace('T', ' ', $request->end_date)));
        $hora_inicial = date("H", strtotime(str_replace('T', ' ', $request->initial_date)));

        $minuto_final = (date("i", strtotime(str_replace('T', ' ', $request->end_date))))/60;
        $minuto_inicial = (date("i", strtotime(str_replace('T', ' ', $request->initial_date))))/60;

        $total_final = $hora_final+$minuto_final;
        $total_inicial = $hora_inicial+$minuto_inicial;

        $diferencia = abs($total_final - $total_inicial);

        $reporte = new Request_Range();
        $reporte->id_request_range = $request->id_request_range; 
        $reporte->id_request = $request->id_request; 
        $reporte->id_user = $request->id_user; 
        $reporte->initial_date = $fecha_inicial; 
        $reporte->end_date = $fecha_final; 
        $reporte->work_time = $diferencia; 
        $reporte->is_close = $request->is_close; 
        $reporte->id_support_activity = $request->id_support_activity;   
        $reporte->in_site = $request->in_site;

        $reporte->save();
        return redirect()->route('times.create')->with('message','hello');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('times.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('times.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

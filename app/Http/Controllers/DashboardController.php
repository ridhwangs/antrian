<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Antrian;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $compact = [
            'data_antrian' => Antrian::WhereNotNull('counter')->orderBy('updated_at', 'DESC')->first(),
        ];

        return view('dashboard.dashboard_index', $compact);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $compact = [
            'data_antrian' => Antrian::whereNull('counter')->get(),
        ];

        return view('dashboard.dashboard_create', $compact);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $compact = [
            'data_antrian' => Antrian::where('antrian_id', $id)->first(),
        ];

        return view('dashboard.dashboard_show', $compact);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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

    public function call($id)
    {
        $data = [
            'counter' => 1,
            'updated_at' => date('Y-m-d H:i:s')
        ];
        
        Antrian::where('antrian_id', $id)->update($data);
        return redirect(route('dashboard.show', $id));
    }

    public function ajax()
    {
        $data = Antrian::WhereNotNull('counter')->orderBy('updated_at', 'DESC')->first();
    
        $respons = [
            'val' => str_pad($data->nomor, 3, '0', STR_PAD_LEFT),
        ];
        return response()->json($respons);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Antrian;
use App\Models\Cabang;

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
            'data_cabang' => Cabang::all(),
            'data_antrian' => Antrian::where('dealerID', @$_GET['dealerID'])->whereNull('counter')->get(),
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
            'dealerID' => $_GET['dealerID'],
            'counter' => $_GET['counter'],
            'updated_at' => date('Y-m-d H:i:s')
        ];
        
        Antrian::where('antrian_id', $id)->update($data);
        return redirect(route('dashboard.show', $id).'?counter='. $_GET['counter']);
    }

    public function ajax(Request $request)
    {
   
        $response = new \Symfony\Component\HttpFoundation\StreamedResponse(function() use ($request) {
            $data = Antrian::WhereNotNull('counter')->orderBy('updated_at', 'DESC')->first();
            echo 'data: ' . json_encode($data) . "\n\n";
            ob_flush();
            flush();
            usleep(20000);
        });

        $response->headers->set('Content-Type', 'text/event-stream');
        $response->headers->set('X-Accel-Buffering', 'no');
        $response->headers->set('Cach-Control', 'no-cache');
        return $response;
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cabang;
use App\Models\Jenis;
use App\Models\Tmp;
use App\Models\Antrian;

class AntrianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $compact = [
            'data_cabang' => Cabang::all(),
        ];

        return view('antrian.antrian_index', $compact);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $compact = [
            'tmp' => Tmp::first(),
            'jenis_antrian' => Jenis::all(),
        ];

        return view('antrian.antrian_create', $compact);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        if (empty(Tmp::count())){
            $create = [
                'jenis_id' => $request->jenis_id,
                'dealerID' => '100109',
                'nomor' => 0,
            ];
            Tmp::create($create);
        }
        $nomor = Tmp::first();
        $data = [
            'jenis_id' => $request->jenis_id,
            'dealerID' => '100109',
            'nomor' => $nomor->nomor + 1,
        ];
        Antrian::create($data);
        Tmp::where('dealerID', '100109')->update(['nomor' => $data['nomor']]); 
        return redirect(route('create'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}

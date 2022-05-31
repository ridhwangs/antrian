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
        if (empty(Tmp::where('dealerID', $_GET['dealerID'])->count())){
            $create = [
                'jenis_id' => '1',
                'dealerID' => $_GET['dealerID'],
                'nomor' => 0,
            ];
            Tmp::create($create);
            return redirect(route('antrian.create').'?dealerID='.$_GET['dealerID']);
        }else{
            $compact = [
                'tmp' => Tmp::where('dealerID', $_GET['dealerID'])->first(),
                'jenis_antrian' => Jenis::where('dealerID', $_GET['dealerID'])->get(),
            ];
            if($compact['tmp']->tanggal != date('Y-m-d')){
                Tmp::where('dealerID', $_GET['dealerID'])->update([
                    'nomor' => 0,
                    'tanggal' => date('Y-m-d')
                ]); 
                return redirect(route('antrian.create').'?dealerID='.$_GET['dealerID']);
            }else{
                return view('antrian.antrian_create', $compact);
            }
        }
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        if (empty(Tmp::where('dealerID', $request->dealerID)->count())){
            $create = [
                'jenis_id' => $request->jenis_id,
                'dealerID' => $request->dealerID,
                'nomor' => 0,
            ];
            Tmp::create($create);
        }
        $nomor = Tmp::where('dealerID', $request->dealerID)->first();
        $data = [
            'jenis_id' => $request->jenis_id,
            'dealerID' => $request->dealerID,
            'nomor' => $nomor->nomor + 1,
            'no_pol' => $request->no_pol,
            'kilometer' => $request->kilometer,
        ];
        Antrian::create($data);
        Tmp::where('dealerID', $request->dealerID)->update([
                                                                'nomor' => $data['nomor'],
                                                                'tanggal' => date('Y-m-d')
                                                            ]); 
        $last_data = Antrian::where($data)->first();
        return redirect(route('antrian.show',$last_data->antrian_id.'?dealerID='.$request->dealerID));
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
            'data' => Antrian::where('antrian_id',$id)
                        ->join('data_cabang','data_cabang.dealerID','=','data_antrian.dealerID')
                        ->join('jenis_antrian','jenis_antrian.jenis_id','data_antrian.jenis_id')
                        ->first()
        ];

        return view('antrian.antrian_show', $compact);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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

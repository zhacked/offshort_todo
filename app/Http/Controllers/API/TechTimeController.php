<?php

namespace App\Http\Controllers\API;

use App\Models\techtime;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class TechTimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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

    public function timeStamp(Request $request)
    {
        // $id = $request->input('search');
        // $time = $request->input('timeNow');
        // $date = $request->input('dateNow');

        switch($request['action']){
            case 'short':
                $data = techtime::where('techDate','=',$request->dateNow)
                ->whereIn('techID',[$request->search])
                ->where('type','=','Short')
                ->get();

                if(count($data)<1){
                    $this->validate($request,[
                        'search' => 'required|string|max:191',
                        'timeNow' => 'required|string|max:191',
                        'dateNow' => 'required|string|max:191'
                    ]);

                    techtime::create([
                        'techID' => $request['search'],
                        'timeOut' => $request['timeNow'],
                        'type' => 'Short',
                        'techDate' => $request['dateNow'],
                    ]);
                    return redirect('/');
                }else{
                    $data1 = techtime::where('techDate','=',$request->dateNow)
                                    ->whereIn('techID',[$request->search])
                                    ->where('type','=','Short')
                                    ->value('timeIn');

                    if($data1 == null){
                        $data2 = techtime::where('techDate','=',$request->dateNow)
                                    ->whereIn('techID',[$request->search])
                                    ->where('type','=','Short')
                                    ->value('timeOut');

                        $out = strtotime($data2);
                        $in = strtotime($request->timeNow);
                        $duration = ($in - $out) / 60;

                        if($duration <= 15){
                            techtime::where('techDate','=',$request->dateNow)->whereIn('techID',[$request->search])
                                    ->where('type','=','Short')
                                    ->update([
                                'timeIn' => $request['timeNow'],
                                'duration' => $duration,
                                'status' => 'ONTIME'
                            ]);
                            return redirect('/');
                        }else{
                            techtime::where('techDate','=',$request->dateNow)->whereIn('techID',[$request->search])
                                    ->where('type','=','Short')
                                    ->update([
                                'timeIn' => $request['timeNow'],
                                'duration' => $duration,
                                'status' => 'OVERBREAK'
                            ]);
                            return redirect('/');
                        }

                    }else{
                        return redirect('/');
                    }
                }
            break;
            case 'long':
                $data = techtime::where('techDate','=',$request->dateNow)
                ->whereIn('techID',[$request->search])
                ->where('type','=','Long')
                ->get();

                if(count($data)<1){
                    $this->validate($request,[
                        'search' => 'required|string|max:191',
                        'timeNow' => 'required|string|max:191',
                        'dateNow' => 'required|string|max:191'
                    ]);

                    techtime::create([
                        'techID' => $request['search'],
                        'timeOut' => $request['timeNow'],
                        'type' => 'Long',
                        'techDate' => $request['dateNow'],
                    ]);
                    return redirect('/');
                }else{
                    $data1 = techtime::where('techDate','=',$request->dateNow)
                                    ->whereIn('techID',[$request->search])
                                    ->where('type','=','Long')
                                    ->value('timeIn');

                    if($data1 == null){
                        $data2 = techtime::where('techDate','=',$request->dateNow)
                                    ->whereIn('techID',[$request->search])
                                    ->where('type','=','Long')
                                    ->value('timeOut');

                        $out = strtotime($data2);
                        $in = strtotime($request->timeNow);
                        $duration = ($in - $out) / 60;

                        if($duration <= 30){
                            techtime::where('techDate','=',$request->dateNow)->whereIn('techID',[$request->search])
                                    ->where('type','=','Long')
                                    ->update([
                                'timeIn' => $request['timeNow'],
                                'duration' => $duration,
                                'status' => 'ONTIME'
                            ]);
                            return redirect('/');
                        }else{
                            techtime::where('techDate','=',$request->dateNow)->whereIn('techID',[$request->search])
                                    ->where('type','=','Long')
                                    ->update([
                                'timeIn' => $request['timeNow'],
                                'duration' => $duration,
                                'status' => 'OVERBREAK'
                            ]);
                            return redirect('/');
                        }

                    }else{
                        return redirect('/');
                    }
                }
            break;
        }
    }
}


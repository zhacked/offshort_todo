<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Techinfo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class TechInfoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return User::latest()->paginate(5);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'techFname' => 'required|string|max:191',
            'techLname' => 'required|string|max:191',
            'techShift' => 'required|string|max:191'
        ]);

        Techinfo::create([
            'techFname' => $request['techFname'],
            'techLname' => $request['techLname'],
            'techShift' => $request['techShift'],
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Employee details added succesfully!'
        ], 401);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
        $tech = Techinfo::findOrFail($id);

        $this->validate($request, [
            'techFname' => 'required|string|max:191',
            'techLname' => 'required|string|max:191',
            'techShift' => 'required|string|max:191'
        ]);

        $tech->update($request->all());
        return ['message' => 'the employee data was updated'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tech = Techinfo::findOrFail($id);
        // delete the user
        $tech->delete();

        return ['message' => 'User Deleted'];
    }

    public function search(Request $request)
    {
        if ($request->ajax()) {
            $data = Techinfo::whereIn('id', [$request->search])->get();
            $output = '';

            if (count($data) > 0) {
                $output = '
                   <table style="width:450px">
                   <thead class="border">
                        <tr>
                            <td colspan="3"><B>EMPLOYEE</B></td>
                        </tr>
                        <tr>
                            <td>ID</td>
                            <td>NAME</td>
                            <td>SHIFT</td>
                        </tr>
                    </thead>
                   <tbody>';
                foreach ($data as $row) {
                    $output .= '
                           <tr>
                                <td>' . $row->id . '</td>
                                <td>' . $row->techFname . ' ' . $row->techLname . '</td>
                                <td>' . $row->techShift . '</td>
                           </tr>
                           ';
                }

                $output .= '

                    </tbody>
                   </table>';
            } else {
                $output .= 'No results';
            }
            return $output;
        }
    }
}




<?php

namespace App\Http\Controllers;

use App\Exports\MoveExport;
use App\Http\Requests\MoveRequest;
use App\Imports\MoveImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Move;
use App\Models\Resident;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use RealRashid\SweetAlert\Facades\Alert;

class MoveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $move = Move::with('resident')->get();
        
        if(request()->get('residents_id') && request()->get('residents_id') != null){
            $move=$move->where('residents_id','=',request()->get('residents_id'));
        }
        if(request()->get('date_move') && request()->get('date_move') != null){
            $move=$move->where('date_move','=',request()->get('date_move'));
        }
        // dd($move->toArray());
        return view('Admin.Pindah.index',compact('move'));
    }

   

    public function moveexport()
    {
        return Excel::download(new MoveExport,'move.xlsx');
    }

    public function moveimportexcel(Request $request){
        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();
        $file->move('DataMove',$namaFile);

        Excel::import(new MoveImport, public_path('/DataMove/'.$namaFile));
        return redirect('move');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $move = Move::get();
        $residents = Resident::all();

        // dd($residents->toArray());
        return view('Admin.Pindah.create',compact('move','residents'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MoveRequest $request)
    {
        $data = $request->all();

        $item = Resident::findOrFail($request->residents_id);
        $item->status = 'Pindah';
        $item->save();

        Move::create($data);

        Alert::success('Success Title', 'Success Message');    
        return redirect()->route('move');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('Admin.Pindah.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $residents = Resident::all();
        $data = Move::findOrFail($id);
        // dd($residents->toArray());
        return view('Admin.Pindah.edit',compact('residents','data'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MoveRequest $request, $id)
    {
        $move = Move::find($id);
        $request->validate([
         'residents_id' => 'required',
         'date_move' => 'required',
         'reason' => 'required',
        
        
      ]);
          $move->update([
              'residents_id' => request('residents_id'),
              'date_move' => request('date_move'),
              'reason' => request('reason'),
            
             
          ]);
          $move->update($request->all());
          return redirect()->route('move');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  
    public function destroy($id){
        
        $data = Move::findOrFail($id);
        $data->delete();
        Alert::warning('Warning Title', 'Warning Message');        
        return redirect()->route('move');
    }

    public function filterreset()
    {
        return redirect()->route('move');
    }

    public function template()
    {
        $template = "template/move.xlsx";
        return  Response::download($template);
    }
}

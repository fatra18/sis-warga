<?php

namespace App\Http\Controllers;


use App\Exports\ComerExport;
use App\Http\Requests\CormerRequest;
use App\Imports\ComerImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Cormer;
use App\Models\Resident;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ComerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comer = Cormer::with('resident')->get();

        return view('Admin.Pendatang.index',compact('comer'));
        
        if(request()->get('gender') && request()->get('gender') != null){
            $comer=$comer->where('gender','=',request()->get('gender'));
        }
        if(request()->get('residents_id') && request()->get('residents_id') != null){
            $comer=$comer->where('residents_id','=',request()->get('residents_id'));
        }
    }

    public function cormerexport()
    {
        return Excel::download(new ComerExport,'cormer.xlsx');
    }

    public function cormerimportexcel(Request $request){
        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();
        $file->move('DataMove',$namaFile);

        Excel::import(new ComerImport, public_path('/DataMove/'.$namaFile));
        return redirect('cormer');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cormer = Cormer::get();
        $residents = Resident::where('status','Hidup')->get();

        // dd($residents->toArray());
        return view('Admin.Pendatang.create',compact('cormer','residents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CormerRequest $request)
    {
        $request = $request->all();
        Cormer::create([
            'id_number' => request('id_number'),
            'name_comers' => request('name_comers'),
            'gender' => request('gender'),            
            'arrival_date' => request('arrival_date'),            
            'residents_id' => request('residents_id'),            
        ]);
        Alert::success('Success Title', 'Success Message');    
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('Admin.Pendatang.show');

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
        $data = Cormer::findOrFail($id);
        // dd($residents->toArray());
        return view('Admin.Pendatang.edit')->with([
            'residents' => $residents , 'data' => $data
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CormerRequest $request, $id)
    {
        $cormer = Cormer::find($id);
        $request->validate([
         'id_number' => 'required',
         'name_comers' => 'required',
         'gender' => 'required',
         'arrival_date' => 'required',
         'residents_id' => 'required',
        
        
      ]);
          $cormer->update([
            'id_number' => request('id_number'),
            'name_comers' => request('name_comers'),
            'gender' => request('gender'),            
            'arrival_date' => request('arrival_date'),            
            'residents_id' => request('residents_id'),         
            
             
          ]);
          $cormer->update($request->all());
          return redirect()->route('cormer');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $data = Cormer::findOrFail($id);
        
        $data->delete();
        return back();
    
        return redirect()->route('cormer');
    }

    public function filterreset()
    {
        return redirect()->route('cormer');
    }

    public function template()
    {
        $template = "template/cormer.xlsx";
        return  Response::download($template);
    }
}

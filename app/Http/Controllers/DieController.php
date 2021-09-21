<?php

namespace App\Http\Controllers;

use App\Exports\DeathExport;
use App\Imports\DeathImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Death;
use App\Models\Resident;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use RealRashid\SweetAlert\Facades\Alert;

class DieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deaths = Death::with('resident')->get();
        // dd($deaths->toArray());
        return view('Admin.Meninggal.index',compact('deaths'));
    }

    public function deathexport()
    {
        return Excel::download(new DeathExport,'death.xlsx');
    }

    public function deathimportexcel(Request $request){
        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();
        $file->move('DataMove',$namaFile);

        Excel::import(new DeathImport, public_path('/DataMove/'.$namaFile));
        return redirect()->route('death');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $death = Death::get();
        $residents = Resident::all();
        // dd($resident);
        return view('Admin.Meninggal.create',compact('residents','death'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request )
    {
        $data = $request->all();

        $item = Resident::findOrFail($request->residents_id);
        $item->status = 'Mati';
        $item->save();

        Death::create($data);

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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,$resident_id)
    {
        $residents = Resident::all();
        $death = Death::findOrFail($id);
        // dd($residents->toArray());
        return view('Admin.Meninggal.edit')->with([
            'residents' => $residents , 'death' => $death
        ]);
        // dd($death->toArray());
        return view('Admin.Meninggal.edit',compact('death'));

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
        $death = Death::find($id);
        $request->validate([
         'residents_id' => 'required',
         'date_of_death' => 'required',
         'reason' => 'required',
      
        
        
      ]);
          $death->update([
            'residents_id' => request('residents_id'),
            'date_of_death' => request('date_of_death'),
            'reason' => request('reason'),            
          
            
             
          ]);
          $death->update($request->all());
          return redirect()->route('death');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $death = Death::findOrFail($id);
        
        $death->delete();
        return back();
    
        return redirect()->route('death');
    }

    public function template()
    {
        $template = "template/death.xlsx";
        return  Response::download($template);
    }
}

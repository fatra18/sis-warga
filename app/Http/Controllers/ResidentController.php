<?php

namespace App\Http\Controllers;

use App\Exports\ResidentExport;
use App\Http\Requests\ResidentRequest;
use App\Imports\ResidentImport;
use App\Models\Resident;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use RealRashid\SweetAlert\Facades\Alert;

class ResidentController extends Controller
{
    public function index()
    {
        $data = Resident::where('status','Hidup')->get();
        $age = Resident::all()->where('age');
        
        if(request()->get('gender') && request()->get('gender') != null){
            $data=$data->where('gender','=',request()->get('gender'));
        }
        if(request()->get('religion') && request()->get('religion') != null){
            $data=$data->where('religion','=',request()->get('religion'));
        }
        if(request()->get('marital_status') && request()->get('marital_status') != null){
            $data=$data->where('marital_status','=',request()->get('marital_status'));
        }
        if(request()->get('date_of_birth') && request()->get('date_of_birth') != null){
            $data=$data->where('date_of_birth','=',request()->get('date_of_birth'));
        }
        if(request()->get('place_of_birth') && request()->get('place_of_birth') != null){
            $data=$data->where('place_of_birth','=',request()->get('place_of_birth'));
        }
      
        if(request()->get('work') && request()->get('work') != null){
            $data=$data->where('work','=',request()->get('work'));
        }
      
        return view('Admin.Penduduk.index',compact('data','age'));
    }

    public function residentexport()
    {
        return Excel::download(new ResidentExport,'resident.xlsx');
    }
    
    public function residentimportexcel(Request $request){
        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();
        $file->move('DataResident',$namaFile);

        Excel::import(new ResidentImport, public_path('/DataResident/'.$namaFile));
        return redirect('resident');
    }
  
    
    public function create()
    {   

        return view('Admin.Penduduk.create');

    }

    public function store(ResidentRequest $request)
    {
       $date_of_birth = Carbon::parse($request['date_of_birth']);
       $age = $date_of_birth->age; 
       $request = $request->all();
       
       Resident::create([
           'id' => request('id'),
           'number_id' => request('number_id'),
           'name' => request('name'),
           'place_of_birth' => request('place_of_birth'),
           'date_of_birth' => request('date_of_birth'),
           'gender' => request('gender'),
           'village' => request('village'),
           'blood_group' => request('blood_group'),
           'address' => request('address'),
           'rt' => request('rt'),
           'rw' => request('rw'),
           'age' => request()->$age,
           'religion' => request('religion'),
           'marital_status' => request('marital_status'),
           'work' => request('work'),
           'status' => request('status'),
           'education' => request('education'),
           'contact' => request('contact'),
           
       ]);
        Alert::success('Success Title', 'Success Message');    
        return redirect()->route('resident');
    }

    public function edit($id)
    {
        $data = Resident::find($id);
        return view('Admin.Penduduk.edit',compact('data'));
    }
    
    public function update(ResidentRequest $request,$id)
    {
        $resident =  Resident::find($id);
        $request->validate([
           'number_id' => 'required',
           'name' => 'required',
           'place_of_birth' => 'required',
           'date_of_birth' => 'required',
           'gender' => 'required',
           'village' => 'required',
           'blood_group' => 'required',
           'address' => 'required',
           'rt' => 'required',
           'rw' => 'required',
           'religion' => 'required',
           'marital_status' => 'required',
           'work' => 'required',
           'status' => 'required',

           'education' => 'required',
           'contact' => 'required',
        ]);
            $resident->update([
                'number_id' => request('number_id'),
                'name' => request('name'),
                'place_of_birth' => request('place_of_birth'),
                'date_of_birth' => request('date_of_birth'),
                'gender' => request('gender'),
                'village' => request('village'),
                'blood_group' => request('blood_group'),
                'address' => request('address'),
                'rt' => request('rt'),
                'rw' => request('rw'),
                'religion' => request('religion'),
                'marital_status' => request('marital_status'),
                'work' => request('work'),
                'status' => request('status'),
                'education' => request('education'),
                'contact' => request('contact'),
            ]);
            $resident->update($request->all());
            return redirect()->route('resident');
    }
    public function show($id)
    {
        $data = Resident::find($id);
        return view('Admin.Penduduk.detail',compact('data'));
    }

   
    public function destroy($id){
    $data = Resident::findOrFail($id);
    
    $data->delete();
    Alert::warning('Warning Title', 'Warning Message');        
    return redirect()->route('resident');
    }

    public function filterreset()
    {
        return redirect()->route('resident');
    }

    public function template()
    {
        $template = "template/resident.xlsx";
        return  Response::download($template);
    }

  
    
}

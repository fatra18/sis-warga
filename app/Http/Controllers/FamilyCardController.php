<?php

namespace App\Http\Controllers;

use App\Exports\FamilyCardExport;
use App\Http\Requests\FamilyCardRequest;
use App\Imports\FamilyCardImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\FamilyCard;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Member;
use App\Models\Resident;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use RealRashid\SweetAlert\Facades\Alert;


class FamilyCardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $family = FamilyCard::with('province','regency','district','resident','member')->get();

        if(request()->get('rt') && request()->get('rt') != null){
            $family=$family->where('rt','=',request()->get('rt'));
        }
        if(request()->get('rw') && request()->get('rw') != null){
            $family=$family->where('rw','=',request()->get('rw'));
        }
        if(request()->get('village') && request()->get('village') != null){
            $family=$family->where('village','=',request()->get('village'));
        }
        if(request()->get('residents_id') && request()->get('residents_id') != null){
            $family=$family->where('residents_id','=',request()->get('residents_id'));
        }
        $filter = FamilyCard::select('residents_id')->distinct()->get();
        // dd($family->toArray());
        return view('Admin.Keluarga.index',compact('family','filter'));
    }

    public function familyexport()
    {
        return Excel::download(new FamilyCardExport,'family.xlsx');
    }

    public function familyimportexcel(Request $request){
        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();
        $file->move('DataFamily',$namaFile);

        Excel::import(new FamilyCardImport, public_path('/DataFamily/'.$namaFile));
        return redirect('family-card');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $family = FamilyCard::get();
        $provinces = Province::all();
        $disctrics = District::all();
        $regencies = Regency::all();
        
        $residents = Resident::where('status','Hidup')->get();
        // $data = FamilyCard::with(['province','regency','district'])->get();
    //   dd($residents);
        return view('Admin.Keluarga.create')->with([
            'family' => $family , 'provinces' => $provinces , 'disctrics' => $disctrics , 'regencies' => $regencies ,'residents' => $residents
        ]);
    }

    public function createT()
    {   

        return view('Admin.Penduduk.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FamilyCardRequest $request)
    {
        $data = $request->all();
        $family = FamilyCard::where('residents_id',(request('residents_id')))->get();
        foreach($family as $card){
            if($request->residents_id == $card->residents_id){
                return back()->with('err','Penduduk Sudah Punya Kartu Keluarga');
            }
        }
        FamilyCard::create([
            'id' => request('id'),
            'family_card_number' => request('family_card_number'),
            'residents_id' => request('residents_id'),
            'village' => request('village'),
            'rt' => request('rt'),
            'rw' => request('rw'),
            'address' => request('address'),
            'regencies_id' => request('regencies_id'),
            'districts_id' => request('districts_id'),
            'provinces_id' => request('provinces_id'),
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
        return view('Admin.Keluarga.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request ,$id)
    {
        $provinces = Province::all();
        $disctrics = District::all();
        $regencies = Regency::all();
        $residents = Resident::all();
    
        $family = FamilyCard::findOrFail($id); 
        // $residents =  $residentId
        //     ? $family->resident->find($residentId)
        //     : $family->resident->first();       

        // dd($residents->toArray());
        // dd($family->toArray());
        // dd($residents->toArray());

        return view('Admin.Keluarga.edit')->with([
            'provinces' => $provinces , 'disctrics' => $disctrics , 'regencies' => $regencies, 'family' => $family , 'residents' => $residents 
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FamilyCardRequest $request, $id)
    {
       $family = FamilyCard::find($id);
       $request->validate([
        'family_card_number' => 'required',
        'residents_id' => 'required',
        'village' => 'required',
        'rt' => 'required',
        'rw' => 'required',
        'address' => 'required',
        'regencies_id' => 'required',
        'districts_id' => 'required',
        'provinces_id' => 'required',
       
     ]);
         $family->update([
             'family_card_number' => request('family_card_number'),
             'residents_id' => request('residents_id'),
             'village' => request('village'),
             'rt' => request('rt'),
             'rw' => request('rw'),
             'address' => request('address'),
             'regencies_id' => request('regencies_id'),
             'districts_id' => request('districts_id'),
             'provinces_id' => request('provinces_id'),
            
         ]);
         
         $family->update($request->all());
         return redirect()->route('family-card')->Alert::success('Success Title', 'Success Message');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $data = FamilyCard::findOrFail($id);
        
        $data->delete();
        return redirect()->route('family-card')->with('success','Contact deleted success');    
        // Alert::warning('Warning Title','Data Anda Dihapus');
        // return redirect()->route('family-card');
    }

    public function filterreset()
    {
        return redirect()->route('family-card');
    }

    public function template()
    {
        $template = "template/family.xlsx";
        return  Response::download($template);
    }
    
}

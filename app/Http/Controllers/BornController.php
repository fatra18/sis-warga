<?php

namespace App\Http\Controllers;


use App\Exports\BornExport;
use App\Http\Requests\BornRequest;
use App\Imports\BornImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Born;
use App\Models\FamilyCard;
use App\Models\Member;
use App\Models\Resident;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use RealRashid\SweetAlert\Facades\Alert;

class BornController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $born = Born::with('family')->get();
       
        if(request()->get('gender') && request()->get('gender') != null){
            $born=$born->where('gender','=',request()->get('gender'));
        }
        if(request()->get('family_cards_id') && request()->get('family_cards_id') != null){
            $born=$born->where('family_cards_id','=',request()->get('family_cards_id'));
        }
        // $family = FamilyCard::get();
        return view('Admin.Lahir.index',compact('born'));
    }


    public function Bornexport()
    {
        return Excel::download(new BornExport,'born.xlsx');
    }

    public function bornimportexcel(Request $request){
        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();
        $file->move('DataMove',$namaFile);

        Excel::import(new BornImport, public_path('/DataMove/'.$namaFile));
        return redirect('born');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $born = Born::get();
        $family = FamilyCard::all();
        // dd($family->toArray());
        // dd($residents->toArray());
        return view('Admin.Lahir.create',compact('born','family'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BornRequest $request)
    {
        $data = $request->all();

        $item = new Resident;
        $item->name = $data['name'];
        $item->gender = $data['gender'];
        $item->date_of_birth = $data['date_of_birth'];
        $item->place_of_birth = $data['place_of_birth'];
        $item->save();

        $born = new Born;
        $born->id = $item->id;
        $born->name = $data['name'];
        $born->place_of_birth = $data['place_of_birth'];
        $born->date_of_birth = $data['date_of_birth'];
        $born->gender = $data['gender'];
        $born->family_cards_id = $data['family_cards_id'];
        Born::create($data);
        
        $member = new Member;
        $member->family_cards_id = $data['family_cards_id'];
        $member->residents_id = $item->id;
        $member->save();

        Alert::success('Success Title', 'Success Message');    
        return back();
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
    public function edit(BornRequest $request, $id)
    {
        $born = Born::findOrFail($id);
        $family = FamilyCard::all();
        // $family = FamilyCard::find($family)->get();
        // dd($born->toArray());
        return view('Admin.Lahir.edit',compact('born','family'));

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
        $born = Born::find($id);
        $request->validate([
         'name' => 'required',
         'date_of_birth' => 'required',
         'gender' => 'required',
         'family_cards_id' => 'required',
        
        
      ]);
          $born->update([
            'name' => request('name'),
            'date_of_birth' => request('date_of_birth'),
            'gender' => request('gender'),            
            'family_cards_id' => request('family_cards_id'),            
            
             
          ]);
          $born->update($request->all());
          return redirect()->route('born');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $data = Born::findOrFail($id);
        
        $data->delete();
        return back();
    
        return redirect()->route('born');
    }

    public function filterreset()
    {
        return redirect()->route('born');
    }

    public function template()
    {
        $template = "template/born.xlsx";
        return  Response::download($template);
    }
}

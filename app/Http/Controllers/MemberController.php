<?php

namespace App\Http\Controllers;

use App\Models\FamilyCard;
use App\Models\Member;
use App\Models\Resident;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $member = Member::with(['family','resident'])->where('family_cards_id', $id)->get();
        $family_cards_id = $id;
        // dd($family_cards_id);
        // dd($member->toArray());
        return view('Admin.Anggota.index',compact('member', 'family_cards_id'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $members = Member::get();
        $family = FamilyCard::all()->find($id);
        
        $residents = Resident::with('family')->doesntHave('family')->get();
        // $data = $residents->unique();
        // dd($data->toArray());
        return view('Admin.Anggota.create',compact('members','family','residents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $data = $request->all();
        $member= Member::where('residents_id',(request('residents_id')))->get();
        foreach($member as $card){
            if($request->residents_id == $card->residents_id){
                return back()->with('err','Penduduk Sudah Menjadi Anggota Keluarga Lain');
            }
        }
        Member::create([
            'id' => request('id'),
            'family_cards_id' => request('family_cards_id'),
            'residents_id' => request('residents_id'),
            'connection' => request('connection'),   
           
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
        return view('Admin.Anggota.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('Admin.Anggota.edit');
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
        $data = Member::findOrFail($id);
        
        $data->delete();
        return back();
    
        return redirect()->route('family-card');
    }
}

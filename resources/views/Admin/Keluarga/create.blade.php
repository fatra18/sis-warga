@extends('Admin.layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <strong>Tambah Data Keluarga</strong>
    </div>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @if (session()->has('err'))
    <div class="danger alert-danger" role="alert">
        {{ session()->get('err') }}
    </div>
        
    @endif
    <div class="card-body card-block">
        <form action="{{ route('family-card-store') }}" method="POST">
            @method('POST')
            @csrf
            <div class="form-group">
                <label for="name" class="form-control-label">
                    Family_card_number
                </label>
                <input type="number" 
                       name="family_card_number"
                       value="{{ old('family_card_number') }}" 
                       class="form-control @error('family_card_number') is-invalid @enderror"/>
                       @error('family_card_number') <div class="text-muted"></div> @enderror
            </div>
            <div class="form-group">
                <label for="type" class="form-control-label">
                  Head_of_Family
                 </label>
                 <select class="form-control w-100 bg-white" aria-label="Default select example" name="residents_id" value="{{ old('residents_id') }}">
                    @foreach ($residents as $resident )
                    <option value="{{ $resident->id }}">{{ $resident->name . ' ' .  '--' . $resident->gender}}</option>

                    @endforeach
                    
                </select>
            </div>
            <div class="form-group">
                <label for="type" class="form-control-label">
                   Village
                </label>
                <input type="text" 
                       name="village"
                       value="{{ old('village') }}" 
                       class="form-control @error('village') is-invalid @enderror "/>
                       @error('village') <div class="text-muted"></div> @enderror

            </div>
        
            <div class="form-group">
                <label for="type" class="form-control-label">
                 Rt
                </label>
                <input type="number" 
                       name="rt"
                       value="{{ old('rt') }}" 
                       class="form-control @error('rt') is-invalid @enderror "/>
                       @error('rt') <div class="text-muted"></div> @enderror
            </div>
            
            <div class="form-group">
                <label for="type" class="form-control-label">
                 Rw
                </label>
                <input type="number" 
                       name="rw"
                       value="{{ old('rw') }}" 
                       class="form-control @error('rw') is-invalid @enderror "/>
                       @error('rw') <div class="text-muted"></div> @enderror
            </div>

            <div class="form-group">
                <label for="type" class="form-control-label">
                  Address
                </label>
                <input type="text" 
                       name="address"
                       value="{{ old('address') }}" 
                       class="form-control @error('address') is-invalid @enderror "/>
                       @error('address') <div class="text-muted"></div> @enderror
            </div>

            <div class="form-group">
                <label for="type" class="form-control-label">
                    Provinces
                 </label>
                <select class="form-control w-100 bg-white" aria-label="Default select example" name="provinces_id" value="{{ old('provinces_id') }}">
                    @foreach ($provinces as $province )
                    <option value="{{ $province->id }}">{{ $province->name }}</option>

                    @endforeach
                    
                </select>
            </div>
            <div class="form-group">
                <label for="type" class="form-control-label">
                    Regencies
                 </label>
                <select class="form-control w-100 bg-white" aria-label="Default select example" name="regencies_id" value="{{ old('regencies_id') }}">
                    @foreach ($regencies as $regencie)
                    <option value="{{ $regencie->id }}">{{ $regencie->name }}</option>

                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="type" class="form-control-label">
                    District
                 </label>
                 <select class="form-control w-100 bg-white" aria-label="Default select example" name="districts_id" value="{{ old('districts_id') }}">
                    @foreach ($disctrics as $disctric )
                    <option value="{{ $disctric->id }}">{{ $disctric->name }}</option>

                    @endforeach
                    
                </select>
            </div>
            
                      
            <div class="form-group">
                <button class="btn btn-info btn-inline" type="sumbit">
                    Tambah Keluarga
                </button>
                <a class="btn btn-danger" href="{{ route('family-card') }}">
                    Cancel
                </a>
            </div>
            
        </form>
    </div>
</div>
@endsection

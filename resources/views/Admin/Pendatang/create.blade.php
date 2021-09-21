@extends('Admin.layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <strong>Tambah Penduduk Pendatang</strong>
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
    <div class="card-body card-block">
        <form action="{{ route('cormer-store') }}" method="POST">
            @method('POST')
            @csrf
            <div class="form-group">
                <label for="name" class="form-control-label">
                    Number
                </label>
                <input type="number" 
                       name="id_number"
                       value="{{ old('id_number') }}" 
                       class="form-control @error('id_number') is-invalid @enderror"/>
                       @error('id_number') <div class="text-muted"></div> @enderror
            </div>
            <div class="form-group">
                <label for="type" class="form-control-label">
                    Cormer
                </label>
                <input type="text" 
                       name="name_comers"
                       value="{{ old('name_comers') }}" 
                       class="form-control @error('name_cormers') is-invalid @enderror "/>
                       @error('name_comers') <div class="text-muted"></div> @enderror

            </div>
           
            <div class="form-group">
                <label for="type" class="form-control-label">
                    Gender
                 </label>
                <select class="form-control w-100 bg-white" aria-label="Default select example" name="gender" value="{{ old('gender') }}">
                    <option selected>Selected Gender</option>
                    <option value="Pria">Pria</option>
                    <option value="Wanita">Wanita</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="type" class="form-control-label">
                    Arrival_date
                </label>
                <input type="date" 
                       name="arrival_date"
                       value="{{ old('arrival_date') }}" 
                       class="form-control @error('arrival_date') is-invalid @enderror "/>
                       @error('arrival_date') <div class="text-muted"></div> @enderror

            </div>
            
            <div class="form-group">
                <label for="type" class="form-control-label">
                  Resident
                 </label>
                 <select class="form-control w-100 bg-white" aria-label="Default select example" name="residents_id" value="{{ old('residents_id') }}">
                    @foreach ($residents as $resident )
                    <option value="{{ $resident->id }}">{{ $resident->name }}</option>

                    @endforeach
                    
                </select>
            </div>
           

          
        
            
            <div class="form-group">
                <button class="btn btn-info btn-inline" type="sumbit">
                    Tambah Penduduk Pendatang
                </button>
                <a class="btn btn-danger" href="{{ route('cormer') }}">
                    Cancel
                </a>
            </div>
            
        </form>
    </div>
</div>
@endsection

@extends('Admin.layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <strong>Edit Penduduk Pendatang</strong>
    </div>
    <div class="card-body card-block">
        <form action="{{ route('cormer-update',$data->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name" class="form-control-label">
                   Number
                </label>
                <input type="number" 
                       name="id_number"
                       value="{{ old('id_number',$data->id_number) }}" 
                       class="form-control @error('id_number') is-invalid @enderror"/>
                       @error('id_number') <div class="text-muted">{{ $massage }}</div> @enderror
            </div>
            <div class="form-group">
                <label for="type" class="form-control-label">
                    Cormer
                </label>
                <input type="text" 
                       name="name_comers"
                       value="{{ old('name_cormer',$data->name_comers) }}" 
                       class="form-control @error('name_comers') is-invalid @enderror "/>
                       @error('name_comers') <div class="text-muted">{{ $massage }}</div> @enderror

            </div>
           
            <div class="form-group">
                <label for="type" class="form-control-label">
                    Gender
                 </label>
                <select class="form-control w-100 bg-white" aria-label="Default select example" name="gender" value="{{ old('gender') }}">
                    <option value="Pria" {{ $data->gender == 'Pria'? 'selected': null }}>Pria</option>
                    <option value="Wanita" {{ $data->gender == 'Wanita'? 'selected': null }}>Wanita</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="type" class="form-control-label">
                    Arrival_date
                </label>
                <input type="date" 
                       name="arrival_date"
                       value="{{ old('arrival_date',$data->arrival_date) }}" 
                       class="form-control @error('arrival_date') is-invalid @enderror "/>
                       @error('arrival_date') <div class="text-muted">{{ $massage }}</div> @enderror

            </div>
            
            <div class="form-group">
                <label for="type" class="form-control-label">
                  Residents
                 </label>
                 <select class="form-control w-100 bg-white" aria-label="Default select example" name="residents_id" value="{{ old('residents_id') }}">
                    @foreach ($residents as $item )
                    <option value="{{ $item->id }}"{{ $item->name === $data->resident->name ? 'selected' : '' }}>{{ $item->number_id }} -- {{ $item->name }}</option>
                    @endforeach
                    
                </select>
            </div>
           

          
        
            
            <div class="form-group">
                <button class="btn btn-info btn-inline" type="sumbit">
                   Edit Penduduk Pendatang
                </button>
                <a class="btn btn-danger" href="{{ route('cormer') }}">
                    Cancel
                </a>
            </div>
            
        </form>
    </div>
</div>
@endsection

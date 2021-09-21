@extends('Admin.layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <strong>Tambah Penduduk Meninggal</strong>
    </div>
    <div class="card-body card-block">
        <form action="{{ route('death-store') }}" method="POST">
            @method('POST')
            @csrf
            <div class="form-group">
                <label for="type" class="form-control-label">
                  Residents
                 </label>
                 <select class="form-control w-100 bg-white" aria-label="Default select example" name="residents_id" value="{{ old('residents_id') }}">
                    @foreach ($residents as $resident )
                    <option value="{{ $resident->id }}">{{ $resident->name }}</option>

                    @endforeach
                    
                </select>
            </div>
            <div class="form-group">
                <label for="type" class="form-control-label">
                    Date_of_birth
                </label>
                <input type="date" 
                       name="date_of_death"
                       value="{{ old('date_of_death') }}" 
                       class="form-control @error('date_of_death') is-invalid @enderror "/>
                       @error('date_of_death') <div class="text-muted"></div> @enderror

            </div>
           
            
            <div class="form-group">
                <label for="type" class="form-control-label">
                  Because
                </label>
                <input type="text" 
                       name="reason"
                       value="{{ old('because') }}" 
                       class="form-control @error('because') is-invalid @enderror "/>
                       @error('because') <div class="text-muted"></div> @enderror

            </div>
    
            <div class="form-group">
                <button class="btn btn-info btn-inline" type="sumbit">
                    Tambah Penduduk Meninggal
                </button>
                <a class="btn btn-danger" href="{{ route('death') }}">
                    Cancel
                </a>
            </div>
            
        </form>
    </div>
</div>
@endsection

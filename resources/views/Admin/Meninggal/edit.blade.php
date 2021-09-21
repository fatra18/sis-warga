@extends('Admin.layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <strong>Edit Penduduk Meninggal</strong>
    </div>
    <div class="card-body card-block">
        <form action="{{ route('death-update',$death->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="type" class="form-control-label">
                  Residents
                 </label>
                 <select class="form-control w-100 bg-white" aria-label="Default select example" name="residents_id" value="{{ old('residents_id') }}">
                    @foreach ($residents as $item )
                    <option value="{{ $item->id }}"{{ $item->name === $death->resident->name ? 'selected' : '' }}>{{ $item->name }}</option>

                    @endforeach
                    
                </select>
            </div>
            <div class="form-group">
                <label for="type" class="form-control-label">
                    Date_of_birth
                </label>
                <input type="date" 
                       name="date_of_death"
                       value="{{ old('date_of_death',$death->date_of_death) }}" 
                       class="form-control @error('date_of_death') is-invalid @enderror "/>
                       @error('date_of_death') <div class="text-muted">{{ $massage }}</div> @enderror

            </div>
           
            
            <div class="form-group">
                <label for="type" class="form-control-label">
                  Because
                </label>
                <input type="text" 
                       name="reason"
                       value="{{ old('reason',$death->reason) }}" 
                       class="form-control @error('reason') is-invalid @enderror "/>
                       @error('reason') <div class="text-muted">{{ $massage }}</div> @enderror

            </div>
    
            <div class="form-group">
                <button class="btn btn-info btn-inline" type="sumbit">
                    Edit Penduduk Meninggal
                </button>
                <a class="btn btn-danger" href="{{ route('death') }}">
                    Cancel
                </a>
            </div>
            
        </form>
    </div>
</div>
@endsection

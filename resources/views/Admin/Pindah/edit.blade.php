@extends('Admin.layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <strong>Edit Penduduk Pindah</strong>
    </div>
    <div class="card-body card-block">
        <form action="{{ route('move-update',$data->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="type" class="form-control-label">
                 Resident
                 </label>
                 <select class="form-control w-100 bg-white" aria-label="Default select example" name="residents_id" value="{{ old('residents_id') }}">
                    {{-- <option value="{{ old('residents_id') ? old('residents_id') : $data->residents_id }}" selected>{{ $data->resident->name }}</option> --}}
                    @foreach ($residents as $item )
                    {{-- <option value="{{ $resident->id }}">{{ $resident->name }}</option> --}}
                    <option value="{{ $item->id }}"{{ $item->name === $data->resident->name ? 'selected': '' }}>{{ $item->number_id }}--{{ $item->name }}</option>


                    @endforeach
                    
                </select>
            </div>
            <div class="form-group">
                <label for="type" class="form-control-label">
                    Date_move
                </label>
                <input type="date" 
                       name="date_move"
                       value="{{ old('date_move',$data->date_move) }}" 
                       class="form-control @error('date_move') is-invalid @enderror "/>
                       @error('date_move') <div class="text-muted">{{ $massage }}</div> @enderror

            </div>
           
            
            <div class="form-group">
                <label for="type" class="form-control-label">
                Reason  
                </label>
                <textarea name="reason"
                          class="ckeditor form-control @error('reason') is-invalid @enderror">
                {{ old('reason',$data->reason) }}
                </textarea>
                @error('reason') <div class="text-muted">{{ $massage }}</div> @enderror
               
            </div>

          
        
            
            <div class="form-group">
                <button class="btn btn-info btn-inline" type="sumbit">
                    Edit Penduduk Pindah
                </button>
                <a class="btn btn-danger" href="{{ route('move') }}">
                    Cancel
                </a>
            </div>
            
        </form>
    </div>
</div>
@endsection

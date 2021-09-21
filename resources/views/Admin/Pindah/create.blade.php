@extends('Admin.layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <strong>Tambah Penduduk Pindah</strong>
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
        <form action="{{ route('move-store') }}" method="POST">
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
                    Date_move
                </label>
                <input type="date" 
                       name="date_move"
                       value="{{ old('date_move') }}" 
                       class="form-control @error('date_move') is-invalid @enderror "/>
                       @error('date_move') <div class="text-muted"></div> @enderror

            </div>
           
            
            <div class="form-group">
                <label for="type" class="form-control-label">
                Reason  
                </label>
                <textarea name="reason"
                          class="ckeditor form-control @error('reason') is-invalid @enderror">
                {{ old('reason') }}
                </textarea>
                @error('reason') <div class="text-muted"></div> @enderror
               
            </div>

          
        
            
            <div class="form-group">
                <button class="btn btn-info btn-inline" type="sumbit">
                    Tambah Penduduk Pindah
                </button>
                <a class="btn btn-danger" href="{{ route('move') }}">
                    Cancel
                </a>
            </div>
            
        </form>
    </div>
</div>
@endsection

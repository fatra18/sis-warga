@extends('Admin.layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <strong>Edit Anggota Keluarga</strong>
    </div>
    <div class="card-body card-block">
        <form action="" method="POST">
            @csrf
            <div class="form-group">
                <label for="name" class="form-control-label">
                    Id_family_card
                </label>
                <input type="number" 
                       name="id_family_card"
                       value="{{ old('id_family_card') }}" 
                       class="form-control @error('id_family_card') is-invalid @enderror"/>
                       @error('id_family_card') <div class="text-muted">{{ $massage }}</div> @enderror
            </div>
            <div class="form-group">
                <label for="type" class="form-control-label">
                    Id_resident
                </label>
                <input type="text" 
                       name="id_resident"
                       value="{{ old('id_resident') }}" 
                       class="form-control @error('id_resident') is-invalid @enderror "/>
                       @error('id_resident') <div class="text-muted">{{ $massage }}</div> @enderror

            </div>
           
            
            <div class="form-group">
                <label for="type" class="form-control-label">
                    Connection
                 </label>
                <select class="form-control w-100 bg-white" aria-label="Default select example">
                    <option selected>Selected Connection</option>
                    <option value="1">Father</option>
                    <option value="2">Mother</option>
                    <option value="3">Wife</option>
                    <option value="3">Child</option>
                </select>
            </div>
    
            <div class="form-group">
                <button class="btn btn-info btn-inline" type="sumbit">
                    Tambah Anggota
                </button>
                <a class="btn btn-danger" href="{{ route('resident') }}">
                    Cancel
                </a>
            </div>
            
        </form>
    </div>
</div>
@endsection

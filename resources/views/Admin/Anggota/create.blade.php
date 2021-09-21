@extends('Admin.layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <strong>Tambah Anggota Keluarga</strong>
    </div>
    @if (session()->has('err'))
    <div class="danger alert-danger" role="alert">
        {{ session()->get('err') }}
    </div>
        
    @endif
    <div class="card-body card-block">
        <form action="{{ route('member-store') }}" method="POST">
            @method('POST')
            @csrf
            <div class="form-group">
                <label for="type" class="form-control-label">
                    Resident_id
                 </label>
                <select class="form-control w-100 bg-white" aria-label="Default select example" name="residents_id" value="{{ old('residents_id') }}">
                   @foreach ($residents as $resident)
                   <option value="{{ $resident->id }}">{{ $resident->name }}</option>

                   @endforeach
                  
                </select>
            </div>
            <div class="form-group">
                <label for="type" class="form-control-label">
                    Connection
                 </label>
                <select class="form-control w-100 bg-white" aria-label="Default select example" name="connection">
                    <option value="Father">Father</option>
                    <option value="Mother">Mother</option>
                    <option value="Child">Child</option>
                    <option value="Wife">Wife</option>
                </select>
            </div>
            <input type="hidden" value="{{ $family->id }} " name="family_cards_id">
                        <div class="form-group">
                <button class="btn btn-info btn-inline" type="sumbit">
                    Tambah Anggota Keluarga
                </button>
                <a class="btn btn-danger" href="{{ route('resident') }}">
                    Cancel
                </a>
            </div>
            
        </form>
    </div>
</div>
@endsection

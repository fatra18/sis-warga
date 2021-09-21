@extends('Admin.layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <strong>Tambah Penduduk Lahir</strong>
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
        <form action="{{ route('born-store') }}" method="POST">
            @method('POST')
            @csrf
            <div class="form-group">
                <label for="name" class="form-control-label">
                    Name
                </label>
                <input type="name" 
                       name="name"
                       value="{{ old('name') }}" 
                       class="form-control @error('name') is-invalid @enderror"/>
                       @error('name') <div class="text-muted"></div> @enderror
            </div>
            <div class="form-group">
                <label for="type" class="form-control-label">
                    Date_of_birth
                </label>
                <input type="date" 
                       name="date_of_birth"
                       value="{{ old('date_of_birth') }}" 
                       class="form-control @error('date_of_birth') is-invalid @enderror "/>
                       @error('date_of_birth') <div class="text-muted"></div> @enderror

            </div>
            <div class="form-group">
                <label for="type" class="form-control-label">
                    Place_of_birth
                </label>
                <input type="text" 
                       name="place_of_birth"
                       value="{{ old('place_of_birth') }}" 
                       class="form-control @error('place_of_birth') is-invalid @enderror "/>
                       @error('place_of_birth') <div class="text-muted"></div> @enderror

            </div>
            <input type="hidden" name="connection">
            <input type="hidden" name="residents_id">
           
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
                    Family_cards
                 </label>
                <select class="form-control w-100 bg-white" aria-label="Default select example" name="family_cards_id" value="{{ old('family_cards_id') }}">
                    @foreach ($family as $item)
                    <option value="{{ $item->id }}">{{ $item->family_card_number }}</option>

                    @endforeach
                </select>
            </div>
    
            <div class="form-group">
                <button class="btn btn-info btn-inline" type="sumbit">
                    Tambah Penduduk Lahir
                </button>
                <a class="btn btn-danger" href="{{ route('born') }}">
                    Cancel
                </a>
            </div>
            
        </form>
    </div>
</div>
@endsection

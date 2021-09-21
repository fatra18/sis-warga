@extends('Admin.layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <strong>Edit Penduduk Lahir</strong>
    </div>
    <div class="card-body card-block">
        <form action="{{ route('born-update',$born->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="name" class="form-control-label">
                    Name
                </label>
                <input type="text" 
                       name="name"
                       value="{{ old('name',$born->name) }}" 
                       class="form-control @error('name') is-invalid @enderror"/>
                       @error('name') <div class="text-muted">{{ $massage }}</div> @enderror
            </div>
            <div class="form-group">
                <label for="type" class="form-control-label">
                    Date_of_birth
                </label>
                <input type="date" 
                       name="date_of_birth"
                       value="{{ old('date_of_birth',$born->date_of_birth) }}" 
                       class="form-control @error('date_of_birth') is-invalid @enderror "/>
                       @error('date_of_birth') <div class="text-muted">{{ $massage }}</div> @enderror

            </div>
           
            <div class="form-group">
                <label for="type" class="form-control-label">
                    Gender
                 </label>
                 <select class="form-control w-100 bg-white" aria-label="Default select example" name="gender" value="{{ old('gender') }}">
                    <option value="Pria" {{ $born->gender == 'Pria'? 'selected': null }}>Pria</option>
                    <option value="Wanita" {{ $born->gender == 'Wanita'? 'selected': null }}>Wanita</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="type" class="form-control-label">
                    Family_cards
                 </label>
                <select class="form-control w-100 bg-white" aria-label="Default select example" name="family_cards_id" value="{{ old('family_cards_id') }}">
                    @foreach ($family as $item)
                    <option value="{{ $item->id }}"{{ $item->family_card_number === $born->family->family_card_number ? 'selected' : '' }}>{{ $item->family_card_number }}</option>

                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <button class="btn btn-info btn-inline" type="sumbit">
                    Edit Penduduk Lahir
                </button>
                <a class="btn btn-danger" href="{{ route('born') }}">
                    Cancel
                </a>
            </div>
            
        </form>
    </div>
</div>
@endsection

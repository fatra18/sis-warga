@extends('Admin.layouts.app')
@section('content')

<div class="card ">
    <div class="card-header">
        <strong>Edit Data Penduduk</strong>
    </div>
    <div>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>    
    <div class="card-body card-block">
        <form action="{{ route('resident-update',$data->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name" class="form-control-label">
                    Id_Number
                </label>
                <input type="number" 
                       name="number_id"
                       value="{{ old('number_id',$data->number_id) }}"
                       class="form-control @error('id_number') is-invalid @enderror"/>
                       @error('number_id') <div class="text-muted">{{ $massage }}</div> @enderror
            </div>
            <div class="form-group">
                <label for="type" class="form-control-label">
                    Name
                </label>
                <input type="text" 
                       name="name"
                       value="{{ old('name',$data->name) }}" 
                       class="form-control @error('name') is-invalid @enderror "/>
                       @error('name') <div class="text-muted">{{ $massage }}</div> @enderror

            </div>
            <div class="form-group">
                <label for="type" class="form-control-label">
                   Place_of_birth
                </label>
                <input type="text" 
                       name="place_of_birth"
                       value="{{ old('place_of_birth',$data->place_of_birth) }}" 
                       class="form-control @error('date_of_birth') is-invalid @enderror "/>
                       @error('date_of_birth') <div class="text-muted">{{ $massage }}</div> @enderror

            </div>
            <div class="form-group">
                <label for="type" class="form-control-label">
                   Date_of_birth
                </label>
                <input type="date" 
                       name="date_of_birth"
                       value="{{ old('date_of_birth',$data->date_of_birth) }}" 
                       class="form-control @error('date_of_birth') is-invalid @enderror "/>
                       @error('date_of_birth') <div class="text-muted">{{ $massage }}</div> @enderror

            </div>
            
            <div class="form-group">
                <label for="type" class="form-control-label">
                    Gender
                 </label>
                <select class="form-control w-100 bg-white" aria-label="Default select example" name="gender" value="{{ old('gender') }}">
                    {{-- <option selected>Selected Gender</option> --}}
                    <option value="Pria" {{ $data->gender == 'Pria'? 'selected': null }}>Pria</option>
                    <option value="Wanita" {{ $data->gender == 'Wanita'? 'selected': null }}>Wanita</option>
                    {{-- <option value="Wanita">Wanita</option> --}}
                </select>
            </div>

            <div class="form-group">
                <label for="type" class="form-control-label">
                  Village
                </label>
                <input type="text" 
                       name="village"
                       value="{{ old('village',$data->village) }}" 
                       class="form-control @error('village') is-invalid @enderror "/>
                       @error('village') <div class="text-muted">{{ $massage }}</div> @enderror

            </div>

              <div class="form-group">
                <label for="type" class="form-control-label">
                    Gender
                 </label>
                <select class="form-control w-100 bg-white" aria-label="Default select example" name="blood_group" value="{{ old('blood_group') }}">
                    <option value="Darah A" {{ $data->gender == 'Darah A'? 'selected': null }}>Darah A</option>
                    <option value="Darah B" {{ $data->gender == 'Darah B'? 'selected': null }}>Darah B</option>
                    <option value="Darah AB" {{ $data->gender == 'Darah AB'? 'selected': null }}>Darah AB</option>
                    <option value="Darah O" {{ $data->gender == 'Darah O'? 'selected': null }}>Darah O</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="type" class="form-control-label">
                  Address
                </label>
                <input type="text" 
                       name="address"
                       value="{{ old('address',$data->address) }}" 
                       class="form-control @error('address') is-invalid @enderror "/>
                       @error('address') <div class="text-muted">{{ $massage }}</div> @enderror
            </div>
           
            <div class="form-group">
                <label for="type" class="form-control-label">
                 Rt
                </label>
                <input type="number" 
                       name="rt"
                       value="{{ old('rt',$data->rt) }}" 
                       class="form-control @error('rt') is-invalid @enderror "/>
                       @error('rt') <div class="text-muted">{{ $massage }}</div> @enderror
            </div>
            
            <div class="form-group">
                <label for="type" class="form-control-label">
                 Rw
                </label>
                <input type="number" 
                       name="rw"
                       value="{{ old('rw',$data->rw) }}" 
                       class="form-control @error('rw') is-invalid @enderror "/>
                       @error('rw') <div class="text-muted">{{ $massage }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="type" class="form-control-label">
                    Religion
                 </label>
                <select class="form-control w-100 bg-white" aria-label="Default select example" name="religion" value="{{ old('religion') }}">
                    {{-- <option selected>Selected Relegion</option> --}}
                    <option value="Islam" {{ $data->religion == 'Islam'? 'selected': null }}>Islam</option>
                    <option value="Kristen" {{ $data->religion == 'Kristen'? 'selected': null }}>Kristen</option>
                    <option value="Protestan" {{ $data->religion == 'Protestan'? 'selected': null }}>Protestan</option>
                    <option value="Buddha" {{ $data->religion == 'Buddha'? 'selected': null }}>Buddha</option>
                    <option value="Hindu" {{ $data->religion == 'Hindu'? 'selected': null }}>Hindu</option>
                    <option value="Konghucu" {{ $data->religion == 'Konghucu'? 'selected': null }}>Konghucu</option>
                    <option value="Dll" {{ $data->religion == 'Dll'? 'selected': null }}>Dll</option>                
                </select>
            </div>
            
            <div class="form-group">
                <label for="type" class="form-control-label">
                    Marital_status
                 </label>
                <select class="form-control w-100 bg-white" aria-label="Default select example" name="marital_status" value="{{ old('marital_status') }}">
                    {{-- <option selected>Selected Marital_status</option> --}}
                    <option value="Nikah" {{ $data->marital_status == 'Nikah'? 'selected': null }}>Nikah</option>
                    <option value="Single" {{ $data->marital_status == 'Single'? 'selected': null }}>Single</option>                    
                    <option value="Janda" {{ $data->marital_status == 'Janda'? 'selected': null }}>Janda</option>
                    <option value="Duda" {{ $data->marital_status == 'Duda'? 'selected': null }}>Duda</option>                    
                    {{-- <option value="Single">Single</option> --}}
                </select>
            </div>

            <div class="form-group">
                <label for="type" class="form-control-label">
                 Work
                </label>
                <input type="text" 
                       name="work"
                       value="{{ old('work',$data->work) }}" 
                       class="form-control @error('work') is-invalid @enderror "/>
                       @error('work') <div class="text-muted">{{ $massage }}</div> @enderror
            </div>
            
            <div class="form-group">
                <label for="type" class="form-control-label">
                 Status
                </label>
                <input type="text" 
                       name="status"
                       value="{{ old('status',$data->status) }}" 
                       class="form-control @error('status') is-invalid @enderror "/>
                       @error('status') <div class="text-muted">{{ $massage }}</div> @enderror
            </div>
            
            <div class="form-group">
                <label for="type" class="form-control-label">
                    Education
                 </label>
                <select class="form-control w-100 bg-white" aria-label="Default select example" name="education" value="{{ old('education') }}">
                    {{-- <option selected>Selected Relegion</option> --}}
                    <option value="SD" {{ $data->religion == 'SD'? 'selected': null }}>SD</option>
                    <option value="SMP" {{ $data->religion == 'SMP'? 'selected': null }}>SMP</option>
                    <option value="SMA" {{ $data->religion == 'SMA'? 'selected': null }}>SMA</option>
                    <option value="SMK" {{ $data->religion == 'SMK'? 'selected': null }}>SMK</option>
                    <option value="S1" {{ $data->religion == 'S1'? 'selected': null }}>S1</option>
                    <option value="S2" {{ $data->religion == 'S2'? 'selected': null }}>S2</option>
                    <option value="S3" {{ $data->religion == 'S3'? 'selected': null }}>S3</option>                
                </select>
            </div>
            
            <div class="form-group">
                <label for="type" class="form-control-label">
                 Contact
                </label>
                <input type="text" 
                       name="contact"
                       value="{{ old('contact',$data->contact) }}" 
                       class="form-control @error('contact') is-invalid @enderror "/>
                       @error('contact') <div class="text-muted">{{ $massage }}</div> @enderror
            </div>

            
            <div class="form-group">
                <button class="btn btn-info btn-inline" type="sumbit">
                    Edit Penduduk
                </button>
                <a class="btn btn-danger" href="{{ route('resident') }}">
                    Cancel
                </a>
            </div>
            
        </form>
    </div>
</div>
@endsection

@extends('Admin.layouts.app')
@section('content')

<div class="card ">
    <div class="card-header">
        <strong>Tambah Data Penduduk</strong>
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
        <form action="{{ route('resident-store') }}" method="POST">
            @method('POST')
            @csrf
            
            <div class="form-group">
                <label for="name" class="form-control-label">
                    Number
                </label>
                <input type="number" 
                       name="number_id"
                       value="{{ old('number_id') }}" 
                       class="form-control @error('number_id') is-invalid @enderror"/>
                       @error('number_id') <div class="text-muted"></div> @enderror
            </div>
           
            <div class="form-group">
                <label for="type" class="form-control-label">
                    Name
                </label>
                <input type="text" 
                       name="name"
                       value="{{ old('name') }}" 
                       class="form-control @error('name') is-invalid @enderror "/>
                       @error('name') <div class="text-muted"></div> @enderror

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
                  Village
                </label>
                <input type="text" 
                       name="village"
                       value="{{ old('village') }}" 
                       class="form-control @error('village') is-invalid @enderror "/>
                       @error('village') <div class="text-muted"></div> @enderror

            </div>

            <div class="form-group">
            <label for="type" class="form-control-label">
                Blood_Group
                </label>
            <select class="form-control w-100 bg-white" aria-label="Default select example" name="blood_group" value="{{ old('blood_group') }}">
                <option selected>Selected Blood</option>
                <option value="Darah A">Darah A</option>
                <option value="Darah B">Darah B</option>
                <option value="Darah AB">Darah AB</option>
                <option value="Darah O">Darah O</option>
            </select>
            </div>
        
            <div class="form-group">
                <label for="type" class="form-control-label">
                  Address
                </label>
                <input type="text" 
                       name="address"
                       value="{{ old('address') }}" 
                       class="form-control @error('address') is-invalid @enderror "/>
                       @error('address') <div class="text-muted"></div> @enderror
            </div>

            <div class="form-group">
                <label for="type" class="form-control-label">
                 Rt
                </label>
                <input type="number" 
                       name="rt"
                       value="{{ old('rt') }}" 
                       class="form-control @error('rt') is-invalid @enderror "/>
                       @error('rt') <div class="text-muted"></div> @enderror
            </div>
            
            <div class="form-group">
                <label for="type" class="form-control-label">
                 Rw
                </label>
                <input type="number" 
                       name="rw"
                       value="{{ old('rw') }}" 
                       class="form-control @error('rw') is-invalid @enderror "/>
                       @error('rw') <div class="text-muted"></div> @enderror
            </div>

            <div class="form-group">
                <label for="type" class="form-control-label">
                    Religion
                 </label>
                <select class="form-control w-100 bg-white" aria-label="Default select example" name="religion" value="{{ old('religion') }}">
                    <option selected>Selected Relegion</option>
                    <option value="Islam">Islam</option>
                    <option value="Kristen">Kristen</option>
                    <option value="Protestan">Protestan</option>
                    <option value="Buddha">Buddha</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Konghucu">Konghucu</option>
                    <option value="Dll">Dll</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="type" class="form-control-label">
                    Marital_status
                 </label>
                <select class="form-control w-100 bg-white" aria-label="Default select example" name="marital_status" value="{{ old('marital_status') }}">
                    <option selected>Selected Marital_status</option>
                    <option value="Nikah">Nikah</option>
                    <option value="Single">Single</option>
                    <option value="Janda">Janda</option>
                    <option value="Duda">Duda</option>
                </select>
            </div>

            <div class="form-group">
                <label for="type" class="form-control-label">
                 Work
                </label>
                <input type="text" 
                       name="work"
                       value="{{ old('work') }}" 
                       class="form-control @error('work') is-invalid @enderror "/>
                       @error('work') <div class="text-muted"></div> @enderror
            </div>

            <div class="form-group">
                <label for="type" class="form-control-label">
                 Status
                </label>
                <input type="text" 
                       name="status"
                       value="{{ old('status') }}" 
                       class="form-control @error('status') is-invalid @enderror "/>
                       @error('status') <div class="text-muted"></div> @enderror
            </div>
            
            <div class="form-group">
                <label for="type" class="form-control-label">
                    Education
                    </label>
                <select class="form-control w-100 bg-white" aria-label="Default select example" name="education" value="{{ old('education') }}">
                    <option selected>Selected Education</option>
                    <option value="SD">SD</option>
                    <option value="SMP">SMP</option>
                    <option value="SMA">SMA</option>
                    <option value="SMK">SMK</option>
                    <option value="S1">S1</option>
                    <option value="S2">S2</option>
                    <option value="S3">S3</option>
                </select>
            </div>
                
            <div class="form-group">
                <label for="type" class="form-control-label">
                Contact
                </label>
                <input type="number" 
                       name="contact"
                       value="{{ old('contact') }}" 
                       class="form-control @error('contact') is-invalid @enderror "/>
                       @error('contact') <div class="text-muted"></div> @enderror
            </div>
            
            <div class="form-group">
                <button class="btn btn-info btn-inline" type="sumbit">
                    Tambah Penduduk
                </button>
                <a class="btn btn-danger" href="{{ route('resident') }}">
                    Cancel
                </a>
            </div>
            
        </form>
    </div>
</div>
@endsection

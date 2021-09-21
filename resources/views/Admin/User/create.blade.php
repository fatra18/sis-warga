@extends('Admin.layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <strong>Tambah User</strong>
    </div>
    <div class="card-body card-block">
        <form action="{{ route('user-store') }}" method="POST">
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
                       @error('name') <div class="text-muted">{{ $massage }}</div> @enderror
            </div>
            
            <div class="form-group">
                <label for="name" class="form-control-label">
                 Email
                </label>
                <input type="email" 
                       name="email"
                       value="{{ old('email') }}" 
                       class="form-control @error('email') is-invalid @enderror"/>
                       @error('email') <div class="text-muted">{{ $massage }}</div> @enderror
            </div>
            <div class="form-group">
                <label for="type" class="form-control-label">
                    Role
                 </label>
                <select class="form-control w-100 bg-white" aria-label="Default select example" name="role" value="{{ old('role') }}">
                    <option selected="1">Admin</option>
                </select>
            </div>
            <div class="form-group">
                <label for="name" class="form-control-label">
                    Password
                </label>
                <input type="text" 
                       name="password"
                       value="{{ old('password') }}" 
                       class="form-control @error('password') is-invalid @enderror"/>
                       @error('password') <div class="text-muted">{{ $massage }}</div> @enderror
            </div>
         
    
            <div class="form-group">
                <button class="btn btn-info btn-inline" type="sumbit">
                    Tambah  User
                </button>
                <a class="btn btn-danger" href="{{ route('user') }}">
                    Cancel
                </a>
            </div>
            
        </form>
    </div>
</div>
@endsection

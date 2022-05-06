@extends('template.dashboard')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-lg">
            <div class="card-body">
                <form action="{{ route('manager.admin.update', $admin->id)}}" method="post" enctype="multipart/form-data">
                    <h1 class="text-content">Modify Admin {{ $admin->name }}</h1>
                    
                    @csrf
                    <input type="hidden" name="id" value="{{$admin->id}}">
                    <div class="form-group">
                        <label for="name" class="font-weight-bold">Name</label>
                        <input type="text" name="name" class="form-control" value="{{old('name')?? $admin->name}}">
                        @error('name')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="email" class="font-weight-bold">Email</label>
                        <input type="mail" name="email" class="form-control" value="{{old('email')?? $admin->email}}">
                        @error('email')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    
                    {{-- <div class="form-group">
                        <label for="password" class="font-weight-bold">Password</label>
                        <input type="text" name="password" class="form-control" value="{{ old('password', $admin->password ?? null) }}">
                    </div>
                    @error('password')
                            <small class="form-text text-danger">{{ $message }}</small>
                    @enderror --}}

                    <div class="form-group text-center mt-3">
                        <button type="submit" class="btn btn-success">Update Admin</button>
                        {{-- <a class="btn btn-secondary" href="{{ route('admins') }}" role="button">Cancel</a> --}}
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
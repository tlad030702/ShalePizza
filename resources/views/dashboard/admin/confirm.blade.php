@extends('template.dashboard')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-lg">
            <div class="card-body">

            <form action="{{ route('manager.admin.confirm', $admin->id) }}" method="post">
                <h1 class="text-center">Modify Password</h1>
                @csrf
                @include('sessionmessage')
                <div class="form-group">
                    <label for ="password">Password</label>
                    <input type="password" class="form-control" id="password" 
                    name="password">
                </div>
                @error('password')
                        <small class="form-text text-danger">{{ $message }}</small>
                @enderror

                <div class="form-group text-center mt-3">
                    <button type="submit" class="btn btn-success">Confirm</button>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>
@endsection

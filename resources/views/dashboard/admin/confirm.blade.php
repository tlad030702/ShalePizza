@extends('template.dashboard')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-lg">
            <div class="card-body">

            <form action="{{ route('category.store') }}" method="post">
                <h1 class="text-center">Modify Password</h1>
                @csrf

                <div class="form-group">
                    <label for ="name">Password</label>
                    <input type="text" class="form-control" id="name" 
                    name="name" value="">
                </div>
                @error('name')
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

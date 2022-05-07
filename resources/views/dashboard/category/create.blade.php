@extends('template.dashboard')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-lg">
            <div class="card-body">

            <form action="{{ route('manager.category.store') }}" method="post">
                <h1 class="text-center">Create Category</h1>
                @csrf

                <div class="form-group">
                    <label for ="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
                </div>
                @error('name')
                        <small class="form-text text-danger">{{ $message }}</small>
                @enderror

                <div class="form-group text-center mt-3">
                    <button type="submit" class="btn btn-success">Create Category</button>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>
@endsection

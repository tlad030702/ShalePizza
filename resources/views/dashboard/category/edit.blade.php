@extends('template.dashboard')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">

            <form action="{{ route('category.update', $category->id) }}" method="post">
                <h1 class="text-center">Modify Category {{ $category->name }}</h1>

                @csrf
                <input type="hidden" name="id" value="{{$category->id}}">
                <div class="form-group">
                    <label for ="name">Name</label>
                    <input type="text" class="form-control" id="name" 
                    name="name" value= "{{old('name')?? $category->name}}">
                </div>
                @error('name')
                        <small class="form-text text-danger">{{ $message }}</small>
                @enderror
                

                <div class="form-group text-center mt-3">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>
@endsection

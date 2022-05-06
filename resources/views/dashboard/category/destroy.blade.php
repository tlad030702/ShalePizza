@extends('template.dashboard')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-lg">
            <div class="card-body">

            <form action="{{ route('manager.category.destroy', $category->id) }}" method="post"> 
                @csrf
                <h1 class="text-center">Delete Category {{ $category->name }}</h1>


                @if($shouldDelete == false)
                <div class="alert alert-warning" role="alert">
                    <strong>You must delete all food related to this category</strong>
                </div>
                @endif
                <input type="hidden" name="id" value="{{$category->id}}">
                <div class="form-group">
                    <label for ="name">Name</label>
                    <input type="text" class="form-control" id="name" 
                    name="name" value="{{old('name')?? $category->name}}" disabled>
                </div>

                @if ($shouldDelete)
                <div class="form-group text-center mt-3">
                    <button type="submit" class="btn btn-danger">Delete</button>
                    <a href="{{route('category')}}" class="btn btn-info">Cancel</a>
                </div>
                @endif
            </form>
        </div>
    </div>
  </div>
</div>
@endsection

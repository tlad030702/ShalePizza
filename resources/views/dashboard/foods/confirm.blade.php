@extends('template.dashboard')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-lg">
            <div class="card-body">
                <form action="{{ route('foods.delete', $food->id) }}" method="post" enctype="multipart/form-data">
                    <h1 class="text-content">Modify food {{ $food->name }}</h1>
                    
                    @csrf
                    <div class="form-group">
                        <label for="name" class="font-weight-bold">Food</label>
                        <input type="text" name="name" class="form-control" value="{{ $food->name }}" disabled>
                    </div>
                    
                    <div class="form-group">
                        <label for="price" class="font-weight-bold">Price</label>
                        <input type="number" name="price" class="form-control" value="{{ $food->price }}" disabled>
                    </div>
                    
                    <div class="form-group">
                        <label for="image" class="font-weight-bold">Image</label>
                        <div class="container-fluid">
                            <img src="{{ asset($food->image) }}" alt="" width="200px" height="200px" class="col-md-6">
                            <input type="text" name="image" value="{{ $food->image }}" class="col-md-5" disabled>
                        </div>
                    </div>
                        
                    
                    <div class="form-group">
                        <label for="description" class="font-weight-bold">Description</label>
                        <input type="text" name="description" class="form-control" value="{{ $food->description }}" disabled>
                    </div>

                    @php
                        $cId = $food->category_id;
                    @endphp
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select name="category_id" id="category" class="form-control" disabled>
                            <option value="">Category</option>
                            @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}" {{ $cId != null && $cId == $cat->id ? 'selected' : '' }}>
                                    {{ $cat->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group text-center mt-3">
                        <button type="submit" class="btn btn-danger">Delete Food</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
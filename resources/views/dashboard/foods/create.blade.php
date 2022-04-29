@extends('template.dashboard')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('foods.store') }}" method="post" enctype="multipart/form-data">
                    <h1 class="text-content">Create new food</h1>
                    
                    @csrf

                    <label for="name">Food</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                    @error('name')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror

                    <label for="price">Price</label>
                    <input type="number" name="price" class="form-control" value="{{ old('price') }}">
                    @error('price')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                    
                    <label for="image">Image</label>
                    <input type="file" name="image" class="form-control" value="{{ old('image') }}">
                    @error('image')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                    

                    <label for="description">Description</label>
                    <input type="text" name="description" class="form-control" value="{{ old('description') }}">
                    
                    @php
                        $cId = old('category') ?? $food->category_id ?? null;
                    @endphp
                    <div class="form-group">
                        <label for="category" class="font-weight-bold">Category</label>
                        <select name="category_id" id="category" class="form-control">
                            <option value="">Category</option>
                            @php($categories=App\Repositories\CategoryRepos::getAll())
                            @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}" {{ $cId != null && $cId == $cat->id ? 'selected' : '' }}>
                                    {{ $cat->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group text-center mt-3">
                        <button type="submit" class="btn btn-success">Create Food</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
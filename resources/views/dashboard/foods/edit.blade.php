@extends('template.dashboard')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-lg">
            <div class="card-body">
                <form action="{{ route('manager.foods.update', $food->id) }}" method="post" enctype="multipart/form-data">
                    <h1 class="text-content">Modify food {{ $food->name }}</h1>
                    
                    @csrf
                    <div class="form-group">
                        <label for="name" class="font-weight-bold">Food</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name',$food->name ?? null) }}">
                        @error('name')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="price" class="font-weight-bold">Price</label>
                        <input type="number" name="price" class="form-control" value="{{ old('price', $food->price ?? null) }}">
                        @error('price')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="image" class="font-weight-bold">Image</label>
                        <div class="custom-file">
                            <input type="file" multiple class="custom-file-input">
                            <label class="custom-file-label" for="inputGroupFile01">Choose files</label>
                        </div>
                    </div>
                    @error('image')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror 
                    <img src="{{ asset($food->image) }}" alt="" width="200px" height="200px" class="col-md-6">
                    <input type="text" name="image" value="{{ $food->image }}" class="col-md-5" disabled>
                    
                    <div class="form-group">
                        <label for="description" class="font-weight-bold">Description</label>
                        <input type="text" name="description" class="form-control" value="{{ old('description', $food->description ?? null) }}">
                    </div>

                    @php
                        $cId = old('category') ?? $food->category_id ?? null;
                    @endphp
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select name="category_id" id="category" class="form-control">
                            <option value="">Category</option>
                            {{-- @php($categories=App\Repositories\CategoryRepos::getAll()) --}}
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
                        <button type="submit" class="btn btn-success">Update Food</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('template.dashboard')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">

            <form action="{{ route('customer.update', $customer->id) }}" method="post">
                <h1 class="text-center">Modify Customer {{ $customer->name }}</h1>

                @csrf

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" placeholder="Your name" class="form-control" value="{{ old('name',$customer->name ?? null) }}">
                    @error('name')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Your email" class="form-control" value="{{ old('email',$customer->email ?? null) }}">
                    @error('email')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="phone">Phone number</label>
                    <input type="text" name="phone" placeholder="Your phone number" class="form-control" value="{{ old('phone',$customer->phone ?? null) }}">
                    @error('phone')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" placeholder="Your address" class="form-control" value="{{ old('address',$customer->address ?? null) }}">
                    @error('address')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="country">Country</label>
                    <input type="text" name="country" placeholder="Your country" class="form-control" value="{{ old('country',$customer->country ?? null) }}">
                    @error('country')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="gender">Gender</label>  
                    <select name="gender" id ="Gender" class="card" style="padding: 0.375rem 0.75rem;">
                        <option value="{{ $customer->gender }}">{{ $customer->gender }}</option>
                        <option value="Female">Female</option>
                        <option value="Male">Male</option>
                        <option value="Other">Other</option>
                    </select>
                    @error('gender')
                        <small class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

               
                <div class="form-group text-center mt-3">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>
@endsection

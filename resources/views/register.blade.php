@extends('template.public')
@push('styles')
<style>
.auth {
    display: grid;
    place-items: center;
    min-width: 80vh;
}
</style>
@endpush
@section('content')
<form action="{{ route('register.store') }}" style="min-width: 400px;" method="POST">
   

    @csrf
    <div class="container">
        <div class="auth">
            <div class="card shadow-lg mt-3 mb-3">
                <div class="card-body">
                    <h3 class="text-center">Customer Register</h3>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" placeholder="Your name" class="form-control" value="{{ old('name') }}">
                        @error('name')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" placeholder="Your email" class="form-control" value="{{ old('email') }}">
                        @error('email')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone number</label>
                        <input type="text" name="phone" placeholder="Your phone number" class="form-control" value="{{ old('phone') }}">
                        @error('phone')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" name="address" placeholder="Your address" class="form-control" value="{{ old('address') }}">
                        @error('address')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="country">Country</label>
                        <input type="text" name="country" placeholder="Your country" class="form-control" value="{{ old('country') }}">
                        @error('country')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    @php
                        $Gender = old('gender') ?? null;
                    @endphp
                    <div class="form-group">
                        <label for="gender">Gender</label>  
                        <select name="gender" id ="Gender" class="card" style="padding: 0.375rem 0.75rem;">
                            <option value="">Gender</option>
                            <option value="Male" {{ $Gender != null && $Gender == 'Male' ? 'selected':'' }}>Male</option>
                            <option value="Female" {{ $Gender != null && $Gender == 'Female' ? 'selected':'' }}>Female</option>
                            <option value="Other" {{ $Gender != null && $Gender == 'Other' ? 'selected':'' }}>Other</option>
                        </select>
                        @error('gender')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    

</form>
@endsection
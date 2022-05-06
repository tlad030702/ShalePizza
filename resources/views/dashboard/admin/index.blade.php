@extends('template.dashboard')
@push('styles')
    {{-- <style>
        .card{
            width: 30rem;
        }
    </style> --}}
@endpush
@section('content')
    <div class ="card shadow-lg">
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <h1>
                        Admin
                    </h1> 
                </div>
            </div>

                <table class ="table table-striped ">
                     <thead>
                         <tr>
                            <th>#</th>
                             <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($admin as $ad)
                        <tr>
                            <td scope="row">{{ $loop->iteration }}</td>
                            <td>{{ $ad->name }}</td>
                            <td>{{ $ad->email }}</td>
                             <td>
                                 <ul class="table-controls">
                                     <li>
                                        <a class="btn btn-primary" href="{{ route('admin.edit', $ad->id) }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
                                        </a>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                        @endforeach
                     </tbody>
                 </table>
                </div>
            </div>
        </div>
    </div>
     @endsection

@push('scripts')
@endpush

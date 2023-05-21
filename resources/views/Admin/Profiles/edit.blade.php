@extends('layouts.admin')

@section('content')
    <div class="container mt-5">

        @if (session('message'))
            <div class="alert alert-danger">
                {{ session('message') }}
            </div>
        @endif

        <div class="col-6 mx-auto">

            <form class="needs-validation mb-5" novalidate action="{{ route('admin.profiles.update', auth()->user()->id) }}"
                enctype="multipart/form-data" method="POST">
                @csrf
                @method('PUT')

                <div class="d-flex">
                    <div class="me-4">
                        <label class="form-label" for="name">Name:*</label>
                        <input class="form-control @error('name') is-invalid @enderror" required type="text"
                            value="{{ old('name', $profile->name) }}" id="name" name="name" autocomplete="name"
                            autofocus>
    
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-8">
                        <label class="form-label" for="surname">Surname:*</label>
                        <input class="form-control @error('surname') is-invalid @enderror" type="text"
                            value="{{ old('surname', $profile->surname) }}" id="surname" name="surname" required
                            autocomplete="surname">
                        @error('surname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                </div>

                <div class="mt-3">
                    <label class="form-label" for="email">Email:*</label>
                    <input class="form-control @error('email') is-invalid @enderror" type="email"
                        value="{{ old('email', $profile->email) }}" id="email" name="email" required
                        autocomplete="email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mt-3">
                    <label class="form-label" for="performance">Performance:</label>
                    <input class="form-control" type="text"
                        value="{{ old('performance', $profile->user_detail?->performance) }}" id="performance"
                        name="performance">
                </div>

                <div class="mt-3">
                    <label class="form-label" for="photo">Photo:</label>
                    <input class="form-control" type="file" id="photo" name="photo">
                </div>

                <div class="mt-3">
                    <label class="form-label" for="curriculum">Curriculum:</label>
                    <input class="form-control" type="file" id="curriculum" name="curriculum">
                </div>

                <div class="d-flex justify-content-between">
                    <div class="mt-3 col-4">
                        <label class="form-label" for="phone">Phone:</label>
                        <input class="form-control" type="text" value="{{ old('phone', $profile->user_detail?->phone) }}"
                            id="phone" name="phone">
                    </div>
    
                    <div class="mt-3 col-7">
                        <label class="form-label" for="address">Address:*</label>
                        <input class="form-control @error('address') is-invalid @enderror" type="text"
                            value="{{ old('address', $profile->user_detail?->address) }}" id="address" name="address"
                            required autocomplete="address">
    
                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
    
                    </div>
                </div>


                <div class="mt-3">
                    <label class="form-label" for="description">Description:</label>
                    <textarea class="form-control" rows="4
                    " type="text" id="description"
                        name="description">
                        {{ $profile->user_detail?->description}}
                    </textarea>
                </div>

                <div class="mt-3">
                    <h6>Specializzations:*</h6>
                    <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
                    @foreach ($specializations as $specialization)
                        <div class="col">
                            <input
                            class="form-check-input @error('specialization-{{ $specialization->id }}') is-invalid @enderror"
                            name="specializations[]" type="checkbox" id="specialization-{{ $specialization->id }}"
                            value="{{ $specialization->id }}" @checked($profile->specializations->contains($specialization))>
                            <label class=" form-check-label"
                                for="specialization-{{ $specialization->id }}">{{ $specialization->title }}</label>
                                @error('specialization-{{ $specialization->id }}')
                                    <div>
                                        {{ $message }}
                                    </div>
                                @enderror
                        </div>

                        
                        @endforeach
                    </div>
                </div>

                <button type="submit-edit" class="btn btn-primary mt-4">Save</button>

            </form>

        </div>
    </div>
@endsection

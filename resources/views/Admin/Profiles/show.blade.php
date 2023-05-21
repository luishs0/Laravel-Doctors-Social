@extends('layouts.admin')

@section('content')
    <div class="container mt-5">

        @if (session('message'))
            <div class=" col-8 mx-auto alert text-dark alert-primary">
                {{ session('message') }}
            </div>
        @endif

        <div class="row justify-content-center mb-3">

            <div class="bg-doc col-8 d-lg-flex justify-content-around py-4 bd-radius">
                @if ($profile->user_detail->photo)
                    <div class="img-container mx-auto mx-lg-0">
                        <img src="{{ asset('storage/' . $profile->user_detail->photo) }}" alt="">
                    </div>
                @else
                    <div class="img-container mx-auto mx-lg-0">
                        <img src="{{ asset('storage/images/4025200.png') }}" alt="">
                    </div>
                @endif
                <div class="info-container mt-3">
                    <div class="text-center text-lg-start">
                        <div>
                            <h5> {{ $profile->name }} {{ $profile->surname }}</h5>
                            <span class="doctor-email mb-2">
                                <i class="fa-solid fa-envelope"></i> {{ $profile->email }}
                            </span>
                        </div>

                        @if ($profile->user_detail?->phone)
                            <p class="">
                                <i class="fa-solid fa-phone"></i> {{ $profile->user_detail?->phone }}
                            </p>
                        @endif


                        <p>{{ $profile->user_detail?->performance }}</p>

                        <p>
                            <i class="fa-solid fa-house"></i> {{ $profile->user_detail?->address }}
                        </p>
                    </div>
                </div>
            </div>
        </div>


        <div class="row justify-content-center bg-doc bd-radius col-8 mx-auto mb-3">

            <div class="mx-auto py-3 bd-radius">

                <div class="row flex-wrap">
                    @foreach ($profile->specializations as $spec)
                        <div class="col-12 col-sm-6 col-lg-4 col-xl-3 mx-auto  text-center fw-bold">
                            #{{ $spec->title }}
                        </div>
                    @endforeach

                </div>

            </div>
        </div>


        <div class="row justify-content-center  mb-3">
            <div class="col-8 bg-doc px-3 py-5 bd-radius">
                <div class="col-9 mx-auto">

                    <h2 class="mb-3">Description:</h2>

                    {{ $profile->user_detail?->description }}
                </div>
            </div>
        </div>

        <div class="row col-11 justify-content-end mb-5">

            <div class="d-flex justify-content-end">
                <a class="btn btn-primary mt-3" href=" {{ route('admin.profiles.edit', auth()->user()->id) }}">edit
                    profile
                </a>
            </div>
        </div>

    </div>
@endsection

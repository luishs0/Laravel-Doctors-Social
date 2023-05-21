@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-doc">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h4 class="text-center my-4">
                            Welcome Back DR. {{ Auth::user()->name }} {{Auth::user()->surname}}
                        </h4>

                        <p class="ms-4">You have a total of {{$messages}} messages.</p>
                        <p class="ms-4">You got {{$feedbacks}} feedbacks with an avegare vote of {{floor($avgVote)}}.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

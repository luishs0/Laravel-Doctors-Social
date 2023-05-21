@extends('layouts.admin')

@section('content')
    <h2 class="text-center mt-3">Message of {{ $message->name }}</h2>
    <div class="container mt-5">
        <div class="row d-flex bg-doc rounded col-10 mx-auto justify-content-center text-center pt-3">

            <h4 class="col-12">Send at</h4>
            <p class="">{{ date('d-m-Y', strtotime($message->created_at)) }}</p>
            <hr>
            <h4 class="col-12">Email</h4>
            <p class="">{{ $message->email }}</p>
            <hr>
            <h4 class="col-12">Text</h4>
            <p>{{ $message->text }}</p>
        </div>
        <a href="{{ route('admin.message')}}"> <i class="fa-solid fa-circle-arrow-left fs-3"> </i> </a>
    @endsection

@extends('layouts.admin')

@section('content')
    <h2 class="text-center mt-3">Feedback of {{ $review->reviewer_name }}</h2>

    <div class="container mt-5">
        <div class="row d-flex bg-doc rounded col-10 mx-auto justify-content-center text-center pt-3">

            <h4 class="col-12">Vote</h4>
            <p>{{ $review->vote }}</p>
            <hr>
            <h4 class="col-12">Send at</h4>
            <p class="">{{ date('d-m-Y', strtotime($review->created_at)) }}</p>
            <hr>
            <h4 class="col-12">Review</h4>
            <p class="">{{ $review->review }}</p>
        </div>

        <a href="{{ route('admin.feedback')}}"> <i class="fa-solid fa-circle-arrow-left fs-3"> </i> </a>

    </div>
@endsection

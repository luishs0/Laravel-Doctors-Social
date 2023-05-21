@extends('layouts.admin')
@section('content')
    <h2 class="text-center mt-3">Feedback</h2>
    <div class="container mt-5">


        <div class="col-12 col-md-10 mx-auto table-responsive">
            <table class="table table-striped " style="background-color: #d5e9f4;">
                <thead>
                    <tr>
                        <th scope="col">Reviewer Name</th>
                        <th scope="col">Vote</th>
                        <th scope="col">Send at</th>
                        <th scope="col">Text</th>
                        <th scope="col">Info</th>

                    </tr>
                </thead>
                <tbody class="table-group-divider">

                    @foreach ($feedback as $review)
                        <tr>
                            <td>{{ $review->reviewer_name }}</th>
                            <td>{{ $review->vote }}</td>
                            <td class=""> {{ date('d-m-Y', strtotime($review->created_at)) }}</td>
                            <td class="text-truncate" style="max-width: 150px;">{{ $review->review }}</td>
                            <td>
                                <a class="btn btn-primary" href="{{ route('admin.feedback.show', $review) }}"> Info </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

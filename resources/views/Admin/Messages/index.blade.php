@extends('layouts.admin')

@section('content')
    <h2 class="text-center mt-3">Messages</h2>
    <div class="container mt-5">

        <div class="col-12 col-md-10 mx-auto table-responsive">
            <table class="table table-msgs table-striped" style="background-color: #d5e9f4;">
                <thead>
                    <tr class="">
                        <th scope="col">Sender Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Send at</th>
                        <th scope="col">Text</th>
                        <th scope="col">Info</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($messages as $message)
                        <tr class="">
                            <td>{{ $message->name }}</th>
                            <td>{{ $message->email }}</td>
                            <td> {{ date('d-m-Y', strtotime($message->created_at)) }}</td>
                            <td class="text-truncate" style="max-width: 150px;">{{ $message->text }}</td>
                            <td> <a class="btn btn-primary" href="{{ route('admin.message.show', $message->id) }}">Info</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection

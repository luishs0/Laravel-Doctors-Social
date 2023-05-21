@extends('layouts.admin')

@section('content')
    <div class="container mt-5">

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="col-6 mx-auto">

            <div class="{{ strToLower($sponsor->title) }} rounded  py-3 px-5 mt-3">
                <h2>{{ $sponsor->title }}</h2>
                @if ($sponsor->id === 1)
                    <h6 class="mb-3">24 hours of sponrship!</h6>
                @elseif ($sponsor->id === 2)
                    <h6 class="mb-3">72 hours of sponrship!</h6>
                @else
                    <h6 class="mb-3">144 hours of sponrship!</h6>
                @endif
                <p>{{ $sponsor->description }}</p>
                <p>
                    Price:
                    <span class="fw-bold">
                        ${{ $sponsor->price }}
                    </span>
                </p>
            </div>


            <form action="{{ route('admin.sponsor.store', $sponsor) }}" method="POST" id="payment-form">
                @csrf

                <input class="d-none" type="integer" value="{{ $sponsor->id }}" id="id" name="id">

                <section>
                    {{-- <label for="amount">
                            <span class="input-label">Price:</span>
                            <div class="input-wrapper amount-wrapper">
                                <div id="amount" name="amount">
                                    {{ $sponsor->price }} €
                                </div>
                            </div>
                        </label> --}}

                    <div class="bt-drop-in-wrapper">
                        <div id="bt-dropin"></div>
                    </div>
                </section>

                <input id="nonce" name="payment_method_nonce" type="hidden" />
                <button class="button btn btn-primary" type="submit">buy!</button>

            </form>
        </div>
        <a href="{{ route('admin.sponsor')}}"> <i class="fa-solid fa-circle-arrow-left fs-3"> </i> </a>

    </div>
    <script src="https://js.braintreegateway.com/web/dropin/1.33.7/js/dropin.min.js"></script>
    <script>
        var form = document.querySelector('#payment-form');
        var client_token = '{{ $token }}'

        braintree.dropin.create({
                authorization: client_token,
                selector: '#bt-dropin',

            },

            function(createErr, instance) {
                if (createErr) {
                    console.log('Create Error', createErr);
                    return;
                }
                form.addEventListener('submit', function(event) {
                    event.preventDefault();

                    instance.requestPaymentMethod(function(err, payload) {
                        if (err) {
                            console.log('Request Payment Method Error', err);
                            return;
                        }

                        // Add the nonce to the form and submit
                        document.querySelector('#nonce').value = payload.nonce;
                        form.submit();
                    });
                });
            });
    </script>
@endsection

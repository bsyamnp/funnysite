@extends('layouts.app')
@section('content')
    <div class="card mb-4 mb-lg-0">
        <div class="card-body">
            <p><strong>We accept</strong></p>
            <img class="me-2" width="45px"
                 src="https://mdbcdn.b-cdn.net/wp-content/plugins/woocommerce-gateway-stripe/assets/images/visa.svg"
                 alt="Visa" />
            <img class="me-2" width="45px"
                 src="https://mdbcdn.b-cdn.net/wp-content/plugins/woocommerce-gateway-stripe/assets/images/amex.svg"
                 alt="American Express" />
            <img class="me-2" width="45px"
                 src="https://mdbcdn.b-cdn.net/wp-content/plugins/woocommerce-gateway-stripe/assets/images/mastercard.svg"
                 alt="Mastercard" />
            <img class="me-2" width="45px"
                 src="https://mdbcdn.b-cdn.net/wp-content/plugins/woocommerce/includes/gateways/paypal/assets/images/paypal.webp"
                 alt="PayPal acceptance mark" />
        </div>
    </div>
    <div class="container">
        <form action="{{route('balance.store')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="balance">Money:</label>
                <input type="text" class="form-control @error('model') is-invalid @enderror" name="balance">
            </div>
            <input type="hidden" name="user_id" value="{{ Auth::user()->id}}">
            <button type="submit" class="btn btn-success">Ok</button>
        </form>
    </div>
@endsection

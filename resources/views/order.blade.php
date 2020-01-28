@extends('layouts.master')

@section('content')
    <div class="container margin-top25">
        @if($cart->totalPrice()->format()>0)
            <div class="row">
                <div class="col-sm-8">
                    @include('partials.order.form')
                </div>
                <div class="col-sm-4">
                    <div class="well" id="cartSidebar">@include('partials.sidebar.order')</div>
                </div>
            </div>
        @else
            <div class="col-sm-8 col-sm-offset-2">
                @include('partials.order.form')
            </div>
        @endif
    </div>
    @include('partials.ajax.message')
@endsection
@extends('layouts.master')

@section('content')
    <div class="container margin-top25">
        <div class="row">
            <div class="col-sm-12">
                <h4>Наш магазин находится по адресу: Донецкая область, г.Донецк, ул.Щорса, 15.</h4>
                <hr>

                <h5>Телефоны:</h5>
                <ul>
                    <li><a href="tel:+380710000000">Водафон +38(071)000-00-00</a></li>
                    <li><a href="tel:+380710000000">Феникс +38(071)000-00-00</a></li>
                </ul>

                <h5>Viber:</h5>

                <ul>
                    <li><a href="tel:+380710000000">Водафон +38(071)000-00-00</a></li>
                    <li><a href="tel:+380710000000">Феникс +38(071)000-00-00</a></li>
                    <li><a href="mailto:test@gmail.com">test@gmail.com</a></li>
                </ul>

            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">

                <iframe src="https://yandex.ua/map-widget/v1/-/CCsVmJlW" style="width:100%;height: 400px;border:none;"
                        allowfullscreen="true"></iframe>
            </div>
        </div>
    </div>
    @include('partials.ajax.message')
@endsection



@extends('layouts.master')

@section('content')
    {{ Breadcrumbs::render('more') }}
    <h2 class="text-center color-black">@lang('page.more')</h2>

    <div class="container">

        @isset($moreproducts)
            @if(count($moreproducts)>0)
            <div class="row">
                <div class="col-sm-12 form-horizontal">
                    <table class="table more-product-list">
                        <thead>
                        <tr class="color-black">
                            <th></th>
                            <th>Наименование</th>
                            <th>Артикул</th>
                            <th>Кол-во</th>
                            <th>Примечание</th>
                        </tr>
                        </thead>
                        <tbody>


                        @foreach($moreproducts as $mprod)
                            <tr>
                                <td>
                                    <a href="{{url("/moreproducts/remove/".$mprod->id)}}">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </td>
                                <td>{{$mprod->title}}</td>
                                <td>{{$mprod->article}}</td>
                                <td>{{$mprod->count}}</td>
                                <td>{{$mprod->info}}</td>
                            </tr>
                        @endforeach

                      </tbody>
                    </table>
                </div>
            </div>
            @endif
        @endisset

        <form action="{{route("moreproducts.add")}}" method="post">
            {{csrf_field()}}
            <div class="row">
                <div class="col-sm-12 form-horizontal">
                    @include("partials.cart.more2")
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <div class="col-md-4">
                            <a href="{{route("cart")}}" class="btn btn-info">Перейти в корзину</a>
                        </div>
                    </div>

                </div>
            </div>
        </form>
        <hr>


    </div>

@endsection
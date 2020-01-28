@extends('layouts.master')

@section('content')
    {{ Breadcrumbs::render('vin') }}
    <h2 class="text-center color-black">@lang('page.vin')</h2>
    <div class="container">
        <ul id="vinTabs" class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#vinPanel">Vin-запрос</a></li>

            <li><a data-toggle="tab" href="#tyresPanel">Поиск шин</a></li>
            <li><a data-toggle="tab" href="#discsPanel">Поиск дисков</a></li>
            @isset($vinrequestlist)
                @if(count($vinrequestlist)>0)
                    <li><a data-toggle="tab" href="#historyPanel">История Vin-запросов</a></li>
                @endif
            @endisset
        </ul>
        <div class="tab-content">
            <div id="vinPanel" class="tab-pane fade in active">
                <form action="{{route("vin.create")}}" method="post">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-sm-6 form-horizontal">
                            @include("partials.vin.form")
                        </div>
                        <div class="col-sm-6 form-horizontal">
                            @include("partials.vin.additionalform")
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="vinsubmit"></label>
                                <div class="col-md-4">
                                    <button type="submit" name="vinsubmit" class="btn btn-main">Отправить запрос
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
            <div id="tyresPanel" class="tab-pane fade">
                @include("partials.vin.tyres")
            </div>
            <div id="discsPanel" class="tab-pane fade">
                @include("partials.vin.discs")
            </div>
            <div id="historyPanel" class="tab-pane fade">
                @isset($vinrequestlist)
                    @if(count($vinrequestlist)>0)
                        <div class="row">
                            <div class="col-sm-12">

                                @foreach($vinrequestlist as $vin)

                                    <div class="panel panel-info">
                                        <div class="panel-heading">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <a href="{{ url('vin/'.$vin->id) }}" class="btn btn-link">
                                                        {{$vin->created_at}}
                                                    </a>
                                                    <a href="{{url('vin/remove/'.$vin->id)}}" class="btn btn-link"><i
                                                                class="fas fa-trash"></i>
                                                    </a>
                                                </div>
                                                <div class="col-sm-6"
                                                     style="display:flex;justify-content: space-around;">

                                                    @if($vin->getTyresRequestsCount()>0)
                                                        <a href="{{ url('tyres') }}" target="_blank"
                                                           class="btn btn-link">
                                                            Запросов на шины: {{$vin->getTyresRequestsCount()}}
                                                        </a>
                                                    @endif
                                                    @if($vin->getDisksRequestsCount()>0)
                                                        <a href="{{url('disks')}}" target="_blank" class="btn btn-link">
                                                            Запросов на диски: {{$vin->getDisksRequestsCount()}}
                                                        </a>
                                                    @endif
                                                </div>
                                            </div>

                                        </div>
                                        <div class="panel-body">

                                            <a href="{{ url('moreproducts/'.$vin->id) }}" class="btn btn-link">
                                                {{$vin->vincode}}
                                            </a>
                                        </div>
                                    </div>

                                @endforeach

                            </div>
                        </div>
                    @endif
                @endisset
            </div>
        </div>
    </div>

@endsection
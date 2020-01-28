
@extends('home')

@section('home-content')
    @isset($vinrequestlist)
        @if(count($vinrequestlist)>0)
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1 margin-top25">

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
@endsection
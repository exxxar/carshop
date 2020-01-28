<h5 class="color-black"><strong>Названия и описания требуемых запчастей</strong></h5>
<p>Если вы не нашли требуемые запчасти, то заполните в данной таблице известную информацию об интересующих
    запчастях и мы постараемся найти информацию по ним. Для добавления строк используйте кнопку добавить
    строку в конце таблицы. Для удаления - кнопку удалить строку в соответствующей строке.</p>
<table class="table more-product-list">
    <thead>
    <tr class="color-black">
        <th></th>
        <th>Vin-code</th>
        <th>Наименование</th>
        <th>Артикул</th>
        <th>Кол-во</th>
        <th>Примечание</th>
    </tr>
    </thead>
    <tbody>


    @isset($moreproducts)
        @foreach($moreproducts as $mprod)
            <tr>
                <td>
                    <a href="{{url("/moreproducts/remove/".$mprod->id)}}">
                        <i class="fa fa-times"></i>
                    </a>

                </td>
                <td><a href="{{url('moreproducts/'.$mprod->getVin()->id)}}">{{$mprod->getVin()->vincode}}</a></td>
                <td>{{$mprod->title}}</td>
                <td>{{$mprod->article}}</td>
                <td>{{$mprod->count}}</td>
                <td>{{$mprod->info}}</td>
            </tr>
        @endforeach
    @endisset
    <form id="more-product-form" action="{{ route('moreproducts.add') }}" method="post">

        <tr>
            {{ csrf_field() }}

            <td></td>
            @isset($vinrequestlist)
                <td>
                    @if (count($vinrequestlist)>0)
                        <select name="vinrequest_id" id="vinrequest_id">
                            @foreach($vinrequestlist as $vin)
                                <option value="{{$vin->id}}">{{$vin->vincode}}</option>
                            @endforeach
                        </select>
                    @else
                        <a href="{{url('vin')}}" class="btn btn-info">Создать Vin-запрос</a>

                    @endif
                </td>
            @endisset
            <td><input name="title" type="text" placeholder="Название детали"></td>
            <td><input name="article" type="text" placeholder="Артикул"></td>
            <td><input name="count" type="number" placeholder="Количество деталей"></td>
            <td><input name="info" type="text" placeholder="Дополнительная информация"></td>

        </tr>
        @isset($vinrequestlist)
            @if (count($vinrequestlist)>0)
                <tr>
                    <th colspan="6" class="text-right">

                        <a href="{{url("moreproducts/clear")}}" class="btn btn-link ">Очистить</a>
                        <button type="submit" class="btn btn-info">Добавить</button>

                    </th>
                </tr>
            @endif
        @endisset
    </form>
    <tr>
        <td colspan="6" class="text-center">
            @if (count($moreproducts)==0)
                <a href="{{ route('order') }}" class="my-btn btn-black btn-order"
                   style="display: none">@lang('button.checkout')</a>
            @else
                <a href="{{ route('buy') }}" class="my-btn btn-black btn-order">@lang('button.checkout')</a>

            @endif
        </td>
    </tr>

    </tbody>
</table>


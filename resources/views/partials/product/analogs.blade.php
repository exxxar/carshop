
@isset($analogs)
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Номер</th>
            <th>Название производителя</th>
            <th>Название автозапчасти</th>
            <th>Дата, время на которое актуальны данные</th>
            <th>Цена</th>
            <th>Кол-во позиций на складе</th>
            <th>Кол-во позиций доступных под заказ</th>
            <th>Средний срок поставки</th>
            <th>Минимальное кол-во для заказа</th>
            <th>Действие</th>

        </tr>
        </thead>
        <tbody>

        @foreach($analogs as $analog)

            <tr>
                <td>{{$analog["nr"]}}</td>
                <td>{{$analog["brand"]}}</td>
                <td>{{$analog["name"]}}</td>
                <td>{{$analog["upd"]}}</td>
                <td>{{$analog["price"]}} {{$analog["currency"]}}</td>
                <td>{{$analog["stock"]}}</td>
                <td>{{$analog["sorder"]}}</td>
                <td>{{$analog["delivery"]}}</td>
                <td>{{$analog["minq"]}}</td>
                <td>
                    <button class="my-btn btn-black addAnalogItemToCart"
                            data-route="{{ route('cart.analog.add') }}"
                            data-gid="{{ $analog["gid"] }}"
                    >{{Lang::get('button.add_to_cart')}}
                    </button>
                </td>
            </tr>


        @endforeach

        </tbody>
    </table>
@endisset

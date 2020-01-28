@isset($products)
    <div class="pos-rel">
        @include('partials.loader')

        <table class="table table-striped">
            <thead>
            <tr>
                    <th>Название производителя</th>
                <th>Название автозапчасти</th>
                <th>Дата, время на которое актуальны данные</th>
                <th>Цена</th>
                <th>Кол-во позиций на складе</th>
                <th>Кол-во позиций доступных под заказ</th>

                <th>Действие</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>
                        {{ $product->brandName()->title }}
                        @if($product->is_top)
                            <span class="top">(Top)</span>
                        @elseif($product->is_new)
                            <span class="new">(New)</span>
                        @endif
                    </td>
                    <td><a style="color:orangered" href="{{ route('product', ['product' => $product->id]) }}"
                           class="title">{{ $product->title }}</a></td>

                    <td>{{ $product->updated_at }}</td>
                    <td> @include('partials.product.price')</td>
                    <td>   {{ $product->reviews->count() }}</td>
                    <td> {{ $product->min_in_pack }}</td>

                    <td>@include('partials.buttons.add_to_cart')</td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
    @if($products->isEmpty())
        <h2 class="color-black text-center">@lang('page.products_empty')</h2>
    @endif
    {{ $products->links() }}
@endisset
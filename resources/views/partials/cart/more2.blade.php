<h5 class="color-black"><strong>Названия и описания требуемых запчастей</strong></h5>
<p>Если вы не нашли требуемые запчасти, то заполните в данной таблице известную информацию об интересующих
    запчастях и мы постараемся найти информацию по ним. Для добавления строк используйте кнопку добавить
    строку в конце таблицы. Для удаления - кнопку удалить строку в соответствующей строке.</p>
<table class="table more-product-list">
    <thead>
    <tr class="color-black">
        <th>Наименование</th>
        <th>Артикул</th>
        <th>Кол-во</th>
        <th>Примечание</th>
    </tr>
    </thead>
    <tbody>

    <tr>
        <form action="{{ url('moreproducts/add') }}" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="vinrequest_id" value="{{$id}}">
            <td><input name="title" type="text" placeholder="Название детали"></td>
            <td><input name="article" type="text" placeholder="Артикул"></td>
            <td><input name="count" type="number" placeholder="Количество деталей"></td>
            <td><input name="info" type="text" placeholder="Дополнительная информация"></td>
        </form>
    </tr>
    <tr>
        <th colspan="4" class="text-right">
            <a href="{{url("moreproducts/clear")}}" class="btn btn-link">Очистить</a>
            <button class="btn btn-info">Добавить</button>
        </th>
    </tr>


    </tbody>
</table>


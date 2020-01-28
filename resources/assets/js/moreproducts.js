
$(".add-more-product").click(function () {


    var title = $("input[name='title']");
    var article = $("input[name='article']");
    var count = $("input[name='count']");
    var info = $("input[name='info']");

    if(title.val()==''||article.val()==''||count.val()==''||info.val()=='')
        return;

    console.log($("#more-product-form").serialize());
    $.ajax({
        url: '/moreproducts/add',
        type: 'post',
        data: $("#more-product-form").serialize(),
        dataType: 'json',
        success: function (response) {
            var id = response.id;
            $(".more-product-list tbody").prepend(`
                <tr>
                    <td>
                        <button class="removeMoreProductItem" data-route="/moreproducts/remove/"
                            data-id="${id}">
                            <i class="fa fa-times"></i>
                        </button>
                    </td>
                    <td>{}</td>
                    <td>${title.val()}</td>
                    <td>${article.val()}</td>
                    <td>${count.val()}</td>
                    <td>${info.val()}</td>
                </tr>
            `);

            $("#more-product-form")[0].reset();
            $(".btn-order").show();
            $("#cartCount").text(response.totalQuantity);
            $('#totalPrice').text(response.totalPrice);

        },
        error: function (jqXHR) {
            ajaxError(jqXHR)
        }
    });
});

$(".removeall-more-product").click(function(){
    var last = $(".more-product-list tbody tr").length;
    $(".more-product-list tbody tr").each(function (i,el) {
        if (i<last-3)
            el.remove();
    });

    $(".btn-order").hide();

    $.ajax({
        url: `/moreproducts/clear`,
        type: 'get',
        dataType: 'json',
        success: function (response) {
            $("#cartCount").text(response.totalQuantity);
            $('#totalPrice').text(response.totalPrice);
        },
        error: function (jqXHR) {

        }
    });
});
$(document).on("click", ".removeMoreProductItem", function () {
    var id = $(this).attr("data-id");
    var el = $(this);
    el.parent().parent().remove();

    if ($(".more-product-list tbody tr").length==2)
        $(".btn-order").hide();

    $.ajax({
        url: `/moreproducts/remove/${id}`,
        type: 'get',
        dataType: 'json',
        success: function (response) {
            $("#cartCount").text(response.totalQuantity);
            $('#totalPrice').text(response.totalPrice);

        },
        error: function (jqXHR) {

        }
    });
});


function ajaxError(jqXHR) {
    if (jqXHR.status === 501) {
        $('.popup h4').empty().append(jqXHR.responseJSON.message);
        $('.popup').show();
    } else {
        $('.popup h4').empty().append($("#ajaxError").data('error'));
        $('.popup').show();
    }
}
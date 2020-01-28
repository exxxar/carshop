$(".open-vin-tab").click(function(){
    $('#vinTabs a[href="#vinPanel"]').tab('show');
});

$("#category").change(function () {
    var catId = $(this).val();

    $("#model").attr({"disabled":"true"});
    $("#carmake").attr({"disabled":"true"});
    $("#body_type").attr({"disabled":"true"});
    $("#drive").attr({"disabled":"true"});
    $("#gearbox_type").attr({"disabled":"true"});

    var urls = [
        {"url":"marks","id":"#carmake"},
        {"url":"body","id":"#body_type"},
        {"url":"drive","id":"#drive"},
        {"url":"gear","id":"#gearbox_type"},
        ];

    urls.forEach(function(item) {
        $.ajax({
            url: `vin/${item.url}/${catId}`,
            type: 'get',
            dataType: 'json',
            success: function (response) {
                var list = response;
                $(item.id).empty();
                $(item.id).removeAttr("disabled");
                list.forEach(function(element) {
                    $(item.id).append(`
                    <option value='${element.value}'>${element.name}</option>
                `)
                });

                $(item.id).prepend(`<option value="-1">не выбрано</option>`);

            },
            error: function (jqXHR) {
                ajaxError(jqXHR)
            }
        });
    });



});

$("#carmake").change(function () {
    var catId = $("#category").val();
    var markId =  $(this).val();

    $.ajax({
        url: `vin/models/${catId}/${markId}`,
        type: 'get',
        dataType: 'json',
        success: function (response) {
            var list = response;
            $("#model").empty();
            $("#model").removeAttr("disabled");
            list.forEach(function(element) {
                $("#model").append(`
                    <option value='${element.value}'>${element.name}</option>
                `)
            });

            $("#model").prepend(`<option value="-1">не выбрано</option>`);
        },
        error: function (jqXHR) {
            ajaxError(jqXHR)
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
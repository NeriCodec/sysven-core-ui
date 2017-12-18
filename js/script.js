$(document).ready(function () {

    var count = 0;

    $('#button-add-input').click(function () {

        var product_input = $('#measure').val().split("-");
        var quantity = $('#quantity').val();

        if (quantity === "") {
            alert("Debe ingresar una cantidad para el insumo");
        }
        else if (product_input === null) {
            alert("Debe ingresar un insumo");
        }
        else {
            var myInputs = $('#my-inputs');
            myInputs.append('<input type="hidden" id="product-input-' + count + '" name="inputs[' + count + '][product_input]" value="' + product_input[0] + ' de ' + product_input[1] + '" />');
            myInputs.append('<input type="hidden" id="quantity-input-' + count + '" name="inputs[' + count + '][quantity]" value="' + quantity + '" />');
            myInputs.append('<input type="hidden" id="name-input-' + count + '" name="inputs[' + count + '][name_input]" value="' + product_input[1] + '" />');
            myInputs.append('<button type="button" id="button-' + count + '" style="margin: 5px 5px 5px 5px;" id="button-add-input" class="btn btn-primary" data-val="' + count + '">' + quantity + ' ' + product_input + '</button> ');

            $('#button-' + count).off('click');
            $('#button-' + count).on('click', function () {
                var val = $(this).data('val');
                $('#button-' + val).remove();
                $('#product-input-' + val).remove();
                $('#quantity-input-' + val).remove();
            });

            $('#quantity').val('');
            count = count + 1;
        }
    });


    var urlSearchProduct = "sale-detail/search";

    var options = {
        url: urlSearchProduct,

        getValue: "name",

        list: {

            match: {
                enabled: true
            },
            onClickEvent: function () {
                $('#button-search-product').disabled = false;
            },
            maxNumberOfElements: 8

        },

        theme: "square"
    };

    $('#productName').easyAutocomplete(options);

    $.notify({
        // options
        message: $('#message').val()
    }, {
        // settings
        element: '#notification',
        position: null,
        type: $('#type_alert').val(),
        allow_dismiss: true,
        placement: {
            from: "top",
            align: "center"
        },
        offset: {
            x: 50,
            y: 10
        },
        spacing: 10,
        z_index: 1031,
        delay: 5000,
        timer: 1000,
        animate: {
            enter: 'animated fadeInDown',
            exit: 'animated fadeOutUp'
        }
    });

});


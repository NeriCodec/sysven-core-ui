$(document).ready(function () {

    var count = 0;

    $("#button-add-input").click(function () {

        var product_input = $('#measure').val();
        var quantity = $('#quantity').val();

        if (quantity === "") {
            alert("Debe ingresar una cantidad para el insumo");
        }
        else if (product_input === null) {
            alert("Debe ingresar un insumo");
        }
        else {
            $('#form-product').append('<input type="hidden" id="product-input-' + count + '" name="inputs[' + count + '][product_input]" value="' + product_input + '" />');
            $('#form-product').append('<input type="hidden" id="quantity-input-' + count + '" name="inputs[' + count + '][quantity]" value="' + quantity + '" />');
            $('#my-inputs').append('<button type="button" id="button-' + count + '" style="margin: 5px 5px 5px 5px;" id="button-add-input" class="btn btn-primary" data-val="' + count + '">' + quantity + ' ' + product_input + '</button> ');

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
});
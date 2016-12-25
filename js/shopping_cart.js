function calTotalQty(data) {
    var count = 0;
    for (var s in data) {
        count += data[s];
    }
    $('.cart_qty').text(count);
}
// $('.remove-item').click(function () {
function remove_item_click() {
    console.log('remove item!');
    var sid = $(this).closest('i').attr('data-sid');
    var one_product = $(this).closest('.one_product');

    $.get('add_to_cart.php', {sid: sid}, function (data) {
        console.log(data);
        calTotalQty(data);
        one_product.remove();
        calTotal();
    }, 'json');

}


var calTotal = function () {

    var total = 0;
    $('span[data-sid]').each(function () {
        total += $(this).val();
        console.log($(this))
        //console.log($(this).find('td').eq(3).text(),  $(this).find('.qty_sel').val());
    });

    $('#totalPrice').text(total);
};

calTotal();
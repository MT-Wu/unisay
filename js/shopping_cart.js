// 初始化選取數量
var qty_sel = $('.qty_sel');
qty_sel.each(function () {
    var qty = $(this).attr('data-qty');
    $(this).val(qty);
});
// 選取數量一改變執行下面
qty_sel.change(function () {

    var sid = $(this).attr('data-sid');
    var qty = $(this).val();
    var price = $(this).attr('data-price');
    var total_price = price * qty;

    $.get('add_to_cart.php', {sid: sid, qty: qty}, function (data) {
        console.log(data);
        calTotalQty(data);
        // main: shopping cart
        $('.p8 div[data-sid=' + sid + ']').text(total_price);

        // side: shopping cart
        console.log($('.calculate_price div span[data-sid=' + sid + ']'))
        $('.calculate_price div span[data-sid=' + sid + ']').text(total_price);
        calTotal();
    }, 'json');

});

$('.remove-item').click(function () {
    console.log('remove item!');
    var sid = $(this).closest('i').attr('data-sid');
    var one_product = $(this).closest('.one_product');
    var sid = one_product.attr('data-sid');

    $.get('add_to_cart.php', {sid: sid}, function (data) {
        console.log(data);
        calTotalQty(data);
        one_product.remove();
        calTotal();
    }, 'json');

});

function calTotalQty(data) {
    var count = 0;
    for (var s in data) {
        count += data[s];
    }
    $('.cart_qty').text(count);
}

var calTotal = function () {

    var total = 0;
    $('.one_product').each(function () {
        total += parseInt($(this).children('div.product_info').children('div.calculate_price').children('div').children('span').text(), 10);
        console.log(total);
    });

    $('#totalPrice').text(total);
    $('#totalPricePay').text(total);
    $('#totalPriceHome').text(total+60);
};

calTotal();
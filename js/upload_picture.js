var _picture_blob = $('#c')[0].toDataURL();

// $.post('add_custom.php', {price: _price, picture: _picture_blob}, function () {
// }, 'json').done(function (response) {
//     console.log(response);
// })
$.post('add_custom.php', {price: _price, picture: _picture_blob}, function () {
}, 'json').done(function (sid) {
    console.log(sid);
    $.get('add_to_cart.php',
        {
            sid: sid,
            qty: 1
        },
        function (data) {
            console.log(data);

            calTotalQty(data);
//            $(".cart_sidebar").load("cart_and_member.php .cart_sidebar_content");
            alert('商品已加入購物車');
            $('.cart_sidebar').load("side_cart.php");
        }, 'json');
})


var settings = {
  "async": true,
  "crossDomain": true,
  "url": "https://imgur-apiv3.p.mashape.com/3/image",
  "method": "POST",
  "headers": {
    "x-mashape-key": "yHpwWR4wd0mshfPb5xnwmpZujMkCp1ssn9ajsnwaQ80g9BybI2",
    "authorization": "Client-ID 464998e2d2de440",
    "content-type": "application/x-www-form-urlencoded",
    "accept": "application/json"
  },
  "data": $('#c')[0].toDataURL()
}

$.ajax(settings).done(function (response) {
  console.log(response);
});

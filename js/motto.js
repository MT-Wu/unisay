
// 開場頁選擇時
$('.select_frame .icon_img').click(function(){
    // 把圖片關起來
    $(this).addClass('bye').parent().siblings('.frames').find('.icon_img').addClass('bye');
    // 加上class:openNow，把別人的丟掉
    $(this).parent().addClass('openNow').siblings().removeClass('openNow');
    // 丟掉class:clickme，幫別人加上
    $(this).parent().removeClass('clickme').siblings().addClass('clickme');

})
// 內頁切換時
$('.select_frame .frames').click(function(){
    // 把圖片關起來（手機和平板的）
    $(this).find('.icon_img').addClass('bye')
    $(this).siblings('.frames').find('.icon_img').addClass('bye');
    // 把開頭文字關起來（手機和平板的）
    $(this).addClass('bye').siblings('.frames').addClass('bye');

    // 加上class:openNow，把別人的丟掉
    $(this).addClass('openNow').siblings().removeClass('openNow');
    // 丟掉class:clickme，幫別人加上 
    $(this).removeClass('clickme').siblings().addClass('clickme');
    // 把自己的內頁拉進來
    $(this).find('.group').addClass('show');
    // 其他人的內頁隱藏
    $(this).siblings().find('.group').removeClass('show');
})



var f=$('#f');
var e=$('#e')

// 改變格言
f.click(function(){

    $('.bg_friend').load('motto2.php');

})

e.click(function(){
    $('.bg_encourage').load('motto3.php');

})

$('#l').click(function(){
    $('.bg_love').load('motto4.php');
    // $('body').load("motto.php?type=3");
})


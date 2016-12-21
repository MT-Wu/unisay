





// ===========心測頁面開場=============================

$('.find_title img.FA04').hover(function(){
    $('.find_title img.FA02').addClass('touch');
},
    function(){
    $('.find_title img.FA02').removeClass('touch');
}
)







// ==========================尋找守護精靈================
// 取得幻燈片數量
var _count = $('.find_bg ul li').length;
// 設進度線的索引值
var _line_index = 0;
// 取得每個幻燈片長度，待會做推移
var _slides_w = $('.find_bg ul li').width();

$('a.choose').click(function(){
    // 下一頁
    _line_index++;
    // left不能下％，像這樣抓li長度去推移會有BUG，要再寫下面那段window resize才能解bug
    $('.find_bg ul').stop(true,false).animate({left:_slides_w*_line_index*-1});   
})

// 當視窗改變大小時，要重抓一次li的長度
$(window).resize(function(){
    // 雖然前面有執行過，但那是舊資料，現在要更新它的資料
    _slides_w = $('.find_bg ul li').width();
    $('.find_bg ul').css({left: _slides_w*_line_index*-1 })
})
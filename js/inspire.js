// ===========初始頁=============================

// 進入守護精靈心測頁面
$('.left_banner').click(function(){
    $('.inspire').addClass('come');
    $('.findAnimal').addClass('come');
})







// ===========心測頁面開場=============================

// HOVER到木板後，再讓松鼠說話
$('.find_title img.FA04').hover(function(){
    $('.find_title img.FA02').addClass('touch');
    $('.talk').addClass('showup');
},
    function(){
    $('.find_title img.FA02').removeClass('touch');
    $('.talk').removeClass('showup');
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


// --------------------換動物圖

// 存字串
var mbti='';
// 字串長度
var _MBTI_len=0;
var $a=$('.down_text a');
var $icon_img=$('.find_bg ul li.step5 .ani_icon_img');

$a.click(function(){
    // 組字串
    mbti+= $(this).attr('data-MBTI');
    console.log(mbti);

    // 更新長度
    _MBTI_len =mbti.length; 



    if(_MBTI_len==4){
        
        // 呼叫ajax
        $('.group').load("find.php?mbti=" + mbti ,function(){
            
            //  判斷是哪種動物
            var $icon_img=$('.find_bg ul li.step5 .ani_icon_img');
            // console.log(mbti);
            switch(mbti){
                case "IPNT":
                    $icon_img.addClass('owl');
                    break;

                case "EPST":
                    $icon_img.addClass('fox');
                    break;

                case "IPSF":
                    $icon_img.addClass('rabbit');
                    break;

                case "EPST":
                    $icon_img.addClass('fox');
                    break;

                case "EJNT":
                    $icon_img.addClass('lion');
                    break;

                case "IJSF":
                    $icon_img.addClass('deer');
                    break;

                case "IJNT":
                    $icon_img.addClass('eagle');
                    break;

                case "IPST":
                    $icon_img.addClass('cat');
                    break;

                case "EPSF":
                    $icon_img.addClass('bird');
                    break;

                case "IJNF":
                    $icon_img.addClass('wolf');
                    break;

                case "EPNF":
                    $icon_img.addClass('monkey');
                    break;

                case "EJST":
                    $icon_img.addClass('bee');
                    break;

                case "IJST":
                    $icon_img.addClass('squirrel');
                    break;

                case "EJNF":
                    $icon_img.addClass('dog');
                    break;

                case "IPNF":
                    $icon_img.addClass('porcupine');
                    break;

                case "EPNT":
                    $icon_img.addClass('parrot');
                    break;

                case "EJSF":
                    $icon_img.addClass('elephant');
                    break;
                }

        });
    }

})














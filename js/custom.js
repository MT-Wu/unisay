// =====================換頁===========================

// 取得幻燈片數量
var _count = $('.cus_slideshow ul.cus_slides li').length;
// 設進度線的索引值
var _line_index = 0;
// 取得每個幻燈片長度，待會做推移
var _slides_w = $('.cus_slideshow ul.cus_slides li').width();

// 第一頁不要出現上一頁按鈕
var checkIndex =function(){
if(_line_index==0){
    $('a.con_prev').hide();
}else{
    $('a.con_prev').show();
};
}
checkIndex();


$('a.con_next').click(function(){
    // 檢查是不是最後一頁
    if(_line_index==4){
        confirm('確定要加入購物車了嗎？');
        return false;
    }

    // 下一頁
    _line_index++;
    // left不能下％，像這樣抓li長度去推移會有BUG，要再寫下面那段window resize才能解bug
    $('.cus_slideshow ul.cus_slides').stop(true,false).animate({left:_slides_w*_line_index*-1});   
    $('.cus_navbar li').eq(_line_index).addClass('on');
    checkIndex();

    // 最後一頁換icon
    if(_line_index==4){
        var img = $("<img>").attr({
                    'src': 'images/custom/go_cart.svg'});
        $('.controller .con_next i').remove();
        $('.controller .con_next').append(img);
    }
})

$('a.con_prev').click(function(){
    // 檢查要不要加i回去
    if(_line_index==4){
        var $iTag = $("<i>").attr({
                    'class': 'fa fa-chevron-circle-right',
                    'aria-hidden':'true'
                    });
        $('.controller .con_next img').remove();
        $('.controller .con_next').append($iTag);
    }    
    // 上一頁
    $('.cus_navbar li').eq(_line_index).removeClass('on');
    _line_index--;
    // left不能下％，像這樣抓li長度去推移會有BUG，要再寫下面那段window resize才能解bug
    $('.cus_slideshow ul.cus_slides').stop(true,false).animate({left:_slides_w*_line_index*-1});  
    checkIndex();
    
})

// 當視窗改變大小時，要重抓一次li的長度
$(window).resize(function(){
    // 雖然前面有執行過，但那是舊資料，現在要更新它的資料
    _slides_w = $('.cus_slideshow ul.cus_slides li').width();
    $('.cus_slideshow ul.cus_slides').css({left: _slides_w*_line_index*-1 })
})





//=====================小樹亮燈========================
var $light_image = $('.cus_navbar li .light_image')

$('div .ok_buy ').click(function(){
    $light_image.eq(_line_index).css({"background-position":"0% 100%"});
}) 
//=====================小樹滅燈========================
$('div .skip ').click(function(){
    $light_image.eq(_line_index).css({"background-position":"0% 0%"});
}) 








//=========================幻燈片02========================= 
// 抓手機殼的寬給CANVAS的寬
var c=document.getElementById('c');
//用手機殼的0.9倍寬(為了讓CANVAS的框在手機殼內) 
var _caseWidth = $('#aaa').width()*.9;
var _caseHeight =$('#aaa').height();

c.width=_caseWidth;
c.height=_caseHeight;

// 隨視窗改變大小（但會有點秀逗
// $(window).resize(function(){
// c.width=caseWidth;
// });


// CANVAS置入圖片
var canvas = new fabric.Canvas('c');
fabric.Image.fromURL('images/custom/try-cat.png', function(img) {
  img.scale(0.5).set({
    left: 0,
    top: 100,
    angle: 0
  });
  canvas.add(img).setActiveObject(img);
});

var info = document.getElementById('info');

canvas.on({
  'touch:gesture': function() {
    var text = document.createTextNode(' Gesture ');
    info.insertBefore(text, info.firstChild);
  },
  'touch:drag': function() {
    var text = document.createTextNode(' Dragging ');
    info.insertBefore(text, info.firstChild);
  },
  'touch:orientation': function() {
    var text = document.createTextNode(' Orientation ');
    info.insertBefore(text, info.firstChild);
  },
  'touch:shake': function() {
    var text = document.createTextNode(' Shaking ');
    info.insertBefore(text, info.firstChild);
  },
  'touch:longpress': function() {
    var text = document.createTextNode(' Longpress ');
    info.insertBefore(text, info.firstChild);
  }
});


//=========================幻燈片03========================= 



// 建立table
var addTable =function(id){
    
    // 把#tpl_a template裡的資料放進變數中
    var tpl_func = _.template( $('#tpl_a').text() );
    // 把收到的參數id，塞進script資料裡的<%= id %>
    return tpl_func({id:id});

};


var $tabNav = $('.cus_slideshow ul li .step .con_text  ul.tt li ');
var $tabTable = $('.cus_slideshow ul li .step .con_text .text_table');
var $size_bar= $('.cus_slideshow ul li .step .con_text .text_table .size_bar');
// TAB名稱用的編號
var _tab_count = 1;

// 增加text table
$('a.addText').click(function () {
    // 更新資料
    $tabNav = $('.cus_slideshow ul li .step .con_text  ul.tt li ');
    $tabTable = $('.cus_slideshow ul li .step .con_text .text_table');
    $size_bar= $('.cus_slideshow ul li .step .con_text .text_table .size_bar');
    // 目前li個數+1
    var _num_tabs = $('div#tabs ul li.tab').length + 1; 
    // 檢查目前個數
    if(_num_tabs>5){
            alert("文字框最多使用五個");
            return false;
    }  
    // 新增一個li 
    _tab_count++;

    $('div#tabs ul').append(
        '<li class="tab"><a href="javascript:;">TEXT '  + _tab_count + '</a></li>');
    
    // 建立一個他的table
    // 給_tab_count作為參數
    $('div#tabs').append( addTable(_tab_count) );
                
    // 當下位置的li加上class:edit
    var $tabNav = $('.cus_slideshow ul li .step .con_text  ul li');
    $tabNav.eq(_num_tabs-1).addClass('edit').siblings('.edit').removeClass('edit');
    // 把對應面板拉到最上層
    $tabTable.eq(_num_tabs-1).addClass('edit').siblings('.edit').removeClass('edit');


    // 更新目前的li數量
    $tabNav = $('.cus_slideshow ul li .step .con_text  ul.tt li ');

    // 切換時，把對應面板拉到最上層
    $tabNav.click(function(){
        // 把面板加上class:edit
        $(this).addClass('edit').siblings('.edit').removeClass('edit');
        // 抓到此tab的index
        var _tab_index ;
        _tab_index = $(this).index();
        // 更新資料
        $tabTable = $('.cus_slideshow ul li .step .con_text .text_table')
        $tabTable.eq(_tab_index).addClass('edit').siblings('.edit').removeClass('edit');
    });
    
    resetSliderEvents();
});

// 移除text table
$('a.clearText').click(function () {
    // 更新資料
    $tabNav = $('.cus_slideshow ul li .step .con_text  ul.tt li ');
    $tabTable = $('.cus_slideshow ul li .step .con_text .text_table');
    // 目前li個數
    var _num_tabs = $tabNav.length
    // 檢查目前個數
    if(_num_tabs==1){
            alert("文字框至少要有一個");
            return false;
    }  
    // 抓到目前欄位的index並移除相關底板
    var _delete_index = $tabNav.index($('.cus_slideshow ul li .step .con_text  ul.tt li.edit '));
    $tabNav.eq(_delete_index).remove();
    $tabTable.eq(_delete_index).remove();

    // 替補的底板加上class
    $tabNav.eq(_delete_index-1).addClass('edit');
    $tabTable.eq(_delete_index-1).addClass('edit')
});

// ==========字型設定======

// 同步文字
$('.motto_word').on('change keyup paste', function() {
  var newText = $(this).val();
  $('.cus_slideshow ul li.slide03 .case_img .test textarea').html(newText);
});

// 同步字型
$('select.font').on('change', function() {

  /*Get the chosen font from the select box*/
  var chosenFont = $(this).val();
  var fontFamily;

  /*Apply your font family here*/
  if (chosenFont === "微軟正黑體") {
    fontFamily = '微軟正黑體';
  }

  if (chosenFont === "圓體") {
    fontFamily = 'cwTeXYen';
  }

  if (chosenFont === "Slabo") {
    fontFamily = '"Slabo 27px"';
  }

  if (chosenFont === "Indie_Flower") {
    fontFamily = '"Indie Flower"';
  }

  if (chosenFont === "Ubuntu") {
    fontFamily = 'Ubuntu';
  }

  if (chosenFont === "Nova_Mono") {
    fontFamily = '"Nova Mono"';
  }

  $('.cus_slideshow ul li.slide03 .case_img .test textarea').css(
    'font-family', fontFamily);
});

// 移動文字框



// =============range slider================

// 當滑軌移動時，將值更新在左欄裡



function range_slider_change(event){
    // console.log('range_slider_change');
    
    // 取得此物件ID尾巴的編號
    var id = $(this).attr('id');
    id = id.slice(id.length-1);

    var _sizeNow = $(this).val();
    $('#size'+id).val(_sizeNow);
    // console.log('#size'+id,  $('#size'+id));
    
    // 同步字型大小
     $('.cus_slideshow ul li.slide03 .case_img .test textarea').css('font-size', _sizeNow+'px');

} 

function input_size_change(event){
    // console.log('input_size_change');
    
    var id = $(this).attr('id');
    id = id.slice(id.length-1);

    var slider = $('#range_slider'+id);
    // console.log('#range_slider'+id, slider);

    var _sizeNow = $(this).val();

    // 鎖定輸入範圍
    if(_sizeNow<8){
        $(this).val('8');
        slider.val('8');
    }else if(_sizeNow>50){
        $(this).val('50');
        slider.val('50');
    }else{

    slider.val(_sizeNow);
    // 同步字型大小
    $('.cus_slideshow ul li.slide03 .case_img .test textarea').css('font-size', _sizeNow+'px');

    }
} 

function resetSliderEvents(){
    // console.log('resetSliderEvents');

    var input_size = $('.input_size');
    var range_slider = $('.range_slider');

    input_size.off('change');
    range_slider.off('change mousemove');

    input_size.on('change', input_size_change);
    range_slider.on('change mousemove', range_slider_change);

}


resetSliderEvents();



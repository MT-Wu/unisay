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
    $('div.con_prev').hide();
}else{
    $('div.con_prev').show();
};
}
checkIndex();


$('div.con_next').click(function(){
    // 檢查是不是最後一頁
    if(_line_index==4){

        if(confirm('確定要加入購物車了嗎？')) {
          alert('正在處理您的客製化商品，請稍候，等待商品加入購物車... ^_^');
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
            "data": $('#c')[0].toDataURL().slice(22)
          }

          $.ajax(settings).done(function (response) {
            console.log(response);
            $.post('add_custom.php', {price: _price, picture: response.data.link}, function () {
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
                        alert('商品已加入購物車');
                        $('.cart_sidebar').load("side_cart.php");
                    }, 'json');
            });
          });
        } else {

        }

        return false;
    }


    // 下一頁
    _line_index++;
    // left不能下％，像這樣抓li長度去推移會有BUG，要再寫下面那段window resize才能解bug
    $('.cus_slideshow ul.cus_slides').stop(true,false).animate({left:_slides_w*_line_index*-1});
    $('.cus_navbar li').eq(_line_index).addClass('on');

    checkIndex();

    //檢查:把選單隱藏
    if(_line_index==1){
        $('.cus_slideshow ul li.slide01 .step').stop(true,false).animate({opacity:0},100);
    }else if(_line_index==2){
        $('.cus_slideshow ul li.slide02 .step').stop(true,false).animate({opacity:0},100);

        // 文字方塊出現
        addTextbox.set({
            opacity: 1,
            hasControls: true,
            hasBorders: true
        });
        canvas.renderAll();

    }else if(_line_index==3){
        $('.toTop').hide();
    }

    // 最後一頁換icon
    if(_line_index==4){
        var img = $("<img>").attr({
                    'src': 'images/custom/go_cart.svg'});
        $('.controller .con_next i').remove();
        $('.controller .con_next').append(img);
    }
})

$('div.con_prev').click(function(){
    // 檢查要不要加i回去
    if(_line_index==4){
        var $iTag = $("<i>").attr({
                    'class': 'fa fa-chevron-circle-right',
                    'aria-hidden':'true'
                    });
        $('.controller .con_next img').remove();
        $('.controller .con_next').append($iTag);
    }

    //檢查:把選單打開
    if( _line_index==1){
        $('.cus_slideshow ul li.slide01 .step').stop(true,false).animate({opacity:1},1000);
    }else if( _line_index==2){
        $('.cus_slideshow ul li.slide02 .step').stop(true,false).animate({opacity:1},1000);
    }else if( _line_index==3){
        $('.toTop').show(500);
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
//=====================價格變動========================

var $light_image = $('.cus_navbar li .light_image')
var _price =parseInt(800);

$('div .ok_buy ').click(function(){

    //先判斷有沒有加過了，價格才不會重複累加
    if(! $light_image.eq(_line_index).hasClass('bling') ){
        // 取得加購價
        var _addpay = $(this).parent().siblings('.price').attr('data-paid')
        _addpay = parseInt(_addpay);
        // 計算價格並更新
        _price+=_addpay;
        $('.price span').html(_price);
    }

    $light_image.eq(_line_index).addClass('bling');


})
//=====================小樹滅燈========================
//=====================價格變動========================

$('div .skip ').click(function(){

    //先判斷有沒有減過了，價格才不會重複減
    if( $light_image.eq(_line_index).hasClass('bling') ){
        // 取得加購價
        var _addpay = $(this).parent().siblings('.price').attr('data-paid')
        _addpay = parseInt(_addpay);
        // 計算價格並更新
        _price-=_addpay;
        $('.price span').html(_price);
    }

    $light_image.eq(_line_index).removeClass('bling');

    // 取消加購動物圖
    if( _line_index==1 ){
        if(window.animal_img){
        window.animal_img.remove();
        }
    };

    // 取消加購文字
    if( _line_index==2 ){
       // 待寫
    };



})


//=========================幻燈片-canvas畫布設定=========================



// 抓手機殼的寬給CANVAS的寬
var c=document.getElementById('c');
//用手機殼的0.9倍寬(為了讓CANVAS的框在手機殼內)
var _caseWidth = $('#aaa').width();
var _caseHeight =$('#aaa').height();

c.width=_caseWidth;
c.height=_caseHeight;


// 設定一個變數來存目前的木頭圖片名稱
var wood_img = null;
// 設定一個變數來存目前的動物圖片名稱
var animal_img = null;
// 用來存動態輸入的文字
var newText;

// CANVAS置入圖片
var canvas = new fabric.Canvas('c');



// ----------------手機殼底圖設定-------------------
fabric.Image.fromURL('images/product/classic/01-cherry-wood.png', function(img0) {
    img0.scale(0.5).set({
    left: 0,
    top: 0,
    lockMovementX :true,
    lockMovementY : true,
    lockScalingX : true,
    lockScalingY : true,
    hasControls: false,
    hasBorders: false,
    selectable :false
  });
  canvas.add(img0).sendBackwards(img0);
  wood_img = img0;
});



// 換手機材質圖
$('.cus_slideshow ul li .step .case_wood a').click(function(){
    var wood = $(this).attr('data-wood');
    // console.log(wood);

    // 如果畫面上有圖，先把它移除
    if(window.wood_img){
        window.wood_img.remove();
    }

    // 將目前點擊的圖的data-pic塞進資料裡，使CANVAS重新跑一次
    fabric.Image.fromURL('images/product/classic/'+wood+'.png', function(img0) {
      img0.scale(0.5).set({
        left: 0,
        top: 0,
        lockMovementX :true,
        lockMovementY : true,
        lockScalingX : true,
        lockScalingY : true,
        hasControls: false,
        hasBorders: false,
        selectable :false
      });
      canvas.add(img0).sendBackwards(img0);
      // 回傳值（全域變數）回去ＣＡＮＶＡＳ函式
      window.wood_img = img0;
    });

})


// ------------------動物圖設定-----------------



fabric.Image.fromURL('', function(img) {
  img.scale(0.5).set({
    // 一開始先不要出現框框和圖
    left: -10,
    top: 100,
    angle: 0
  });
  canvas.add(img).setActiveObject(img);
  animal_img = img;
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

//---換動物圖囉

$('.productclass_secondnav').click(function(event){
    var target = $(event.target);
    // 抓圖片的data-pic
    var data_pic = target.attr('data-pic');


// 檢查機制：如果沒有圖就不要繼續下去
    if(! data_pic){
        return;
    }
    // 如果畫面上有圖，先把它移除
    if(window.animal_img){
        window.animal_img.remove();
    }

    // 將目前點擊的圖的data-pic塞進資料裡，使CANVAS重新跑一次
    fabric.Image.fromURL('images/custom/ani_img/'+data_pic+'.png', function(img) {
      img.scale(0.5).set({
        left: 0,
        top: 100,
        angle: 0
      });
      canvas.add(img).setActiveObject(img);
      // 回傳值（全域變數）回去ＣＡＮＶＡＳ函式
      window.animal_img = img;
    });

});

// ===============建立文字方塊======================



// 新增文字方塊
var addTextbox = new fabric.Text('Type here', {
  fontFamily: '"Indie Flower"',
  left:10,
  top:50,
  fill:'#333',
  opacity:0,
  hasControls: false,
  hasBorders: false,
  selectable :true
});
// 把方塊放進畫布裡並且讓他可被縮放
canvas.add(addTextbox).setActiveObject(addTextbox);





// 同步文字
$('.motto_word').on('change keyup paste', function() {
  newText = $(this).val();
  // 把文字更新
  addTextbox.setText(newText);
  // 畫布再整理一次
  canvas.renderAll();


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

  // 把字型更新
  addTextbox.set({
      fontFamily: fontFamily
    });
  // 畫布再整理一次
  canvas.renderAll();


});



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
    // 把字型大小更新
    addTextbox.set({
      fontSize: _sizeNow
    });
     // 畫布再整理一次
    canvas.renderAll();


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
    // 把字型大小更新
     addTextbox.set({
      fontSize: _sizeNow
    });
     // 畫布再整理一次
    canvas.renderAll();


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


//=========================幻燈片04=========================


// 用來存動態輸入的文字
var toWho,saySth;

// 抓到ＩＤ叫s4-1的畫布
var canvasS4 = new fabric.Canvas('s4-1');
// 新增文字方塊-兩塊
var addTextbox2 = new fabric.Text('＿＿＿＿', {
  fontFamily: 'cwTeXYen',
  fontFamily: '"Indie Flower"',
  fontSize:18,
  fill:"#603813",
  left:70,
  top:27,
  hasControls: false,
  hasBorders: false
});
var addTextbox3 = new fabric.Text('saysomethig...', {
  fontFamily: 'cwTeXYen',
  fontFamily: '"Indie Flower"',
  fontSize:24,
  fill:"#C69C6D",
  left:20,
  top:63,
  hasControls: false,
  hasBorders: false
});
// 把方塊放進畫布裡並且讓他可被縮放
canvasS4.add(addTextbox2).setActiveObject(addTextbox2);
canvasS4.add(addTextbox3).setActiveObject(addTextbox3);

// 同步文字
$('.cus_slideshow ul li .step .to_who input').on('change keyup paste', function() {
  toWho = $(this).val();
  // 把文字更新
  addTextbox2.setText(toWho);
  // 畫布再整理一次
  canvasS4.renderAll();

});

$('.cus_slideshow ul li .step .msg textarea').on('change keyup paste', function() {
  saySth = $(this).val();
  // 把文字更新
  addTextbox3.setText(saySth);
  // 畫布再整理一次
  canvasS4.renderAll();

});

//=========================幻燈片05=========================


// 換禮物盒子圖
$('.cus_slideshow ul li .step .box a').click(function(){
    var gift = $(this).attr('data-gift');
    $('.cus_slideshow ul li.slide05 .case_img img').attr('src','images/custom/'+gift+'.png');
})

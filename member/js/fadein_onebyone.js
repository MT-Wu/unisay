// team分頁圖片進場動畫

// 抓出要做動畫的元件DOM
var $animation_elements = $('.onesection');
// 抓出 window DOM
var $window = $(window);

// 這個function目的是check那些想要做動畫的元件是否有出現在我們視窗中
function check_if_in_view() {
  // 抓 目前裝置的 實際高
  var window_height = $window.height();
  // 抓 目前視窗的頂部座標，比方剛開始load進網頁時，理論上座標就是0
  var window_top_position = $window.scrollTop();
  // 頂座標＋裝置的實際高＝底座標
  var window_bottom_position = (window_top_position + window_height);
   
  // 抓出每個要做動畫的元件出來
  $.each($animation_elements, function() {
    // 抓自己
    var $element = $(this);
    // 抓自己的外高(含border padding在內)
    var element_height = $element.outerHeight();
    // 抓自己的頂 offset 了多少，也就是抓他的頂部座標
    var element_top_position = $element.offset().top;
    // 自己頂部座標 ＋ 外高 ＝ 底部座標
    var element_bottom_position = (element_top_position + element_height);
 
    // 判斷： 動畫元件是否位於我的目前視窗(viewport)內
    // 準備進場：元件的頂座標 我視窗的底座標 ～ 準備出場：元件的底座標 我視窗的頂座標 
    if ((element_bottom_position >= window_top_position) &&
        (element_top_position <= window_bottom_position)) {
      // 進場
  	  $element.addClass('inview');
      // $element.fadeIn();
    } else {
      // 出場
      // $element.removeClass('inview'); 
      // $element.fadeOut();
    }
  });
}

// 表示當我的裝置 一 滾動 或 一改變視窗大小， 就跑一次check_if_in_view來check
$window.on('scroll resize', check_if_in_view);

// 因為有可能載入畫面時，剛好停在有動畫元件的位置，這時就寫下面這行，window一載入就觸發scroll事件，
// 讓他跑:40行的 $window.on('scroll resize', check_if_in_view)，來確定他是否要進場。
$window.trigger('scroll');


// 捲動到某區段

$('.secondbanner li').click(function(){
    
    var _num_a = $(this).index(); //按到第幾個鈕
    $('html,body').stop(true,false).animate({scrollTop: $('h2').eq(_num_a).offset().top - 192},2000);
    // 往上移動到offset距離，再扣回banner總高
})





// 分頁的第二選單動畫
var secondbanner_ul = $(".secondbanner ul");

$window.on("scroll resize", function(e) {

	// 依照實際排版偵測各個區段的界限
    // console.log(this.scrollY);

  var h2_topic2_top = $('h2').eq(1).offset().top - 265 ; //動態抓h2_topic2標籤的位置
	var h2_topic3_top = $('h2').eq(2).offset().top - 265 ; //動態抓h2_topic3標籤的位置
	var h2_topic4_top = $('h2').eq(3).offset().top - 265 ; //動態抓h2_topic4標籤的位置
	
	// 移到第二個標籤
    if (this.scrollY >= h2_topic2_top && this.scrollY < h2_topic3_top){
      secondbanner_ul.addClass('h2_topic2');
    }else{
      secondbanner_ul.removeClass('h2_topic2');
    }

	// 移到第三個標籤
    if (this.scrollY >= h2_topic3_top && this.scrollY < h2_topic4_top){
      secondbanner_ul.addClass('h2_topic3');
    }else{
      secondbanner_ul.removeClass('h2_topic3');
    }

	// 移到第四個標籤
    if (this.scrollY >= h2_topic4_top){
      secondbanner_ul.addClass('h2_topic4');
    }else{
      secondbanner_ul.removeClass('h2_topic4');
    }


});


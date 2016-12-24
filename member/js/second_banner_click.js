// 切換到某頁面區段

$('.secondbanner li').click(function(){
    
    var _num_a = $(this).index(); //按到第幾個鈕
    $('.onepage').eq(_num_a).addClass('flyin').siblings().removeClass('flyin');
})


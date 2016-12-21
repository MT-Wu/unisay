// 切換到某頁面區段

$('.secondbanner li').click(function(){
    
    var _num_a = $(this).index(); //按到第幾個鈕
    $('.onepage').eq(_num_a).addClass('flyin').siblings().removeClass('flyin');
})


		$("超連結").on('click', function(event){

		  // 取消瀏覽器預設動作，在此範例中是取消跳到錨點的行為動作
		  event.preventDefault();
		  var scrollTarget = $('html, body');
		  var hash = this.hash; // 取得目前點擊連結的錨點位置
		  scrollTarget.animate({
		  		scrollTop: $(hash).offset().top}, 
		    	800, 
		    	function(){
		    		window.location.hash = hash; // 將錨點連結為值放到網址中
		  		}
		  );
		});

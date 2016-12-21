    var $window = $(window);
    var wrap = $(".wrap");
    var banner = $(".banner");
    var logo = $(".logo");


    // 視差捲動，木板logo上去header再出現
    var header = $("header");
    var section01_downbottom2 = $(".section01_downbottom2");
    var section03_window = $(".section03_window");
    var secondbannerulli = $('.secondbanner ul li');
    
    parallax.on("scroll", function(e) {
        if (this.scrollTop > (0.5*parallax.outerHeight()-150)) {
        header.removeClass('header2');
        } 
        else {
        header.addClass('header2');
        }


        // 向下鈕 旋轉
        if (this.scrollTop > 0) {
        section01_downbottom2.addClass("section01_downbottom2_02");
        } 
        else {
        section01_downbottom2.removeClass("section01_downbottom2_02");
        }


        // 雲彩背景出現
        if (this.scrollTop > parallax.outerHeight()*1.5) {
        section03_window.addClass("section03_window02"); 
        } 
        else {
        section03_window.removeClass("section03_window02");
        }


        // 左邊的secondbanner加上目前所在位置
        var _num_li = Math.floor(this.scrollTop/parallax.outerHeight());
        var i;

        for(i=0;i<5;i++){
            if(i==_num_li){
                secondbannerulli.eq(i).addClass("secondbannerhere");
            }else{
                secondbannerulli.eq(i).removeClass("secondbannerhere");
            }
        }
        
    });



    // 導向產品頁
    var section05_wood = $(".section05_wood");
    var section05_animal = $(".section05_animal");
    var section05_motto = $(".section05_motto");

        section05_wood.click(function(){
            location.href = "product.html?page=wood";
        });
        section05_animal.click(function(){
            location.href = "product.html?page=animal";
        });
        section05_motto.click(function(){
            location.href = "product.html?page=motto";
        });



    // 捲動到某區段

    secondbannerulli.click(function(){
        var _num_a = $(this).index(); //按到第幾個鈕
        parallax.stop(true,false).animate({scrollTop: parallax.outerHeight()*_num_a},1500);
    });



// 因為有可能載入畫面時，剛好停在有動畫元件的位置，這時就寫下面這行，window一載入就觸發scroll事件
$window.trigger('scroll');


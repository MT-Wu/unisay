    var $window = $(window);
    var wrap = $(".wrap");
    var header = $("header");



// 木頭按鈕

    var click_this_woodicon = $(".product_info .product_option div.woodicon div");
    var wood_bigpic = $(".product_content .product_img .product_img_big img");
    var wood_smallpic = $(".product_content .product_img .product_img_small ul li");

    click_this_woodicon.click(function(){
        // 先全部移除this_woodicon
        click_this_woodicon.removeClass("this_woodicon");

        // 再抓classname
        var woodicon_name=$(this).attr("class");
        var wood_name=woodicon_name.slice(7);
        var this_wood_index=$(this).index();
        var this_wood_smallpic = wood_smallpic.eq(this_wood_index).children().attr("src");


        // 大圖換圖
        wood_bigpic.attr("src",this_wood_smallpic);
        // 小圖換圖
        wood_smallpic.removeClass("this_pic");
        wood_smallpic.eq(this_wood_index).addClass("this_pic");


        // 再變色
        $(this).addClass("this_woodicon");
    });



    wood_smallpic.click(function(){

        var this_wood_smallpic = $(this).children().attr("src");

        // 大圖換圖
        wood_bigpic.attr("src",this_wood_smallpic);
        // 小圖換圖
        wood_smallpic.removeClass("this_pic");
        $(this).addClass("this_pic");

    });



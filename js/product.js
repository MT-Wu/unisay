    var $window = $(window);
    var wrap = $(".wrap");
    var header = $("header");


    var product_logo = $(".product_logo div");
    var productclass_intro_content = $(".productclass_intro_content");
    var productclass_secondnav = $(".productclass_secondnav");
    var product_item = $(".product_item");


    //抓點進來的頁面
    var page = window.location.search.slice(6);

    if(page){
        var product_class_html = "product_" + page + ".html";

        // logo全部先移除
        product_logo.removeClass("this_productclass");
        // 加上新logo
        $(".product_logo div.product_" + page).addClass("this_productclass");

        // ajax
        productclass_intro_content.load("ajax/" + product_class_html + " .productclass_intro_p");
        productclass_secondnav.load("ajax/" + product_class_html + " ." + page + "icon", function(){

            // load好再重抓一次
            var click_this_icon = $(".productclass_secondnav div div");
            
            if(page=="wood"){
                click_this_icon.off('click');
                click_this_icon.on('click', woodicon_click);
            };
            if(page=="animal"){
                click_this_icon.off('click');
                click_this_icon.on('click', animalicon_click);
            };
            if(page=="motto"){
                click_this_icon.off('click');
                click_this_icon.on('click', mottoicon_click);
            };

        });
        product_item.load("ajax/" + product_class_html + " .product_item_content");

    }else{
        // 一開始產品頁導進來先預設是wood經典款
        page = "wood" ;
        var product_class_html = "product_" + page + ".html";

        // ajax
        productclass_intro_content.load("ajax/" + product_class_html + " .productclass_intro_p");
        productclass_secondnav.load("ajax/" + product_class_html + " ." + page + "icon", function(){

            var click_this_icon = $(".productclass_secondnav div div");
            click_this_icon.off('click');
            click_this_icon.on('click', woodicon_click);

        });
        product_item.load("ajax/" + product_class_html + " .product_item_content");
    };





    product_logo.click(function(){
        // 全部先移除
        product_logo.removeClass("this_productclass");

        // 取得現在點擊的類別字串
        var product_class_name = $(this).attr("class");
        var class_name = product_class_name.slice(8);
        var product_class_html = product_class_name + ".html" ; //字串串接出檔案名稱


        // 加上新類別換內容
        $(this).addClass("this_productclass");


        // ajax
        productclass_intro_content.load("ajax/" + product_class_html + " .productclass_intro_p");
        productclass_secondnav.load("ajax/" + product_class_html + " ." + class_name + "icon", function(){

            var click_this_icon = $(".productclass_secondnav div div");
            
            if(class_name=="wood"){
                click_this_icon.off('click');
                click_this_icon.on('click', woodicon_click);
            };
            if(class_name=="animal"){
                click_this_icon.off('click');
                click_this_icon.on('click', animalicon_click);
            };
            if(class_name=="motto"){
                click_this_icon.off('click');
                click_this_icon.on('click', mottoicon_click);
            };

        });
        product_item.load("ajax/" + product_class_html + " .product_item_content");


    });



// 經典分頁
    
    var woodicon_click = function(){
        // 先全部移除this_woodicon
        $(this).siblings().removeClass("this_woodicon");
        $(this).removeClass("this_woodicon");

        // 再抓classname
        var woodicon_name=$(this).attr("class");
        var wood_name=woodicon_name.slice(7);

        // 再變色
        $(this).addClass("this_woodicon");

        // 格言名字title
        var this_woodname = $(".this_woodname div");
        this_woodname.text(wood_name);



        // 按鈕點擊後往上捲到第二選單(才看得到下面有產品出來)
        $('html,body').stop(true,false).animate({scrollTop:(productclass_secondnav.offset().top - header.outerHeight())},1000);

    };



// 動物分頁

    var animalicon_click = function(){
        // 先全部移除this_animalicon
        $(this).siblings().removeClass("this_animalicon");
        $(this).removeClass("this_animalicon");
        $(this).parent().siblings().children().removeClass("this_animalicon");


        // 再抓classname
        var animalicon_name=$(this).attr("class");
        var animal_name=animalicon_name.slice(13);

        // 再變色
        $(this).addClass("this_animalicon");

        // 下面換圖
        var this_animalicon_large = $(".product_item .this_animalicon_large div");
        this_animalicon_large.removeClass();
        this_animalicon_large.addClass(animalicon_name);

        // 動物名字title
        var this_animalname = $(".this_animalname div");
        this_animalname.text(animal_name);



        // 按鈕點擊後往上捲到第二選單(才看得到下面有產品出來)
        $('html,body').stop(true,false).animate({scrollTop:(productclass_secondnav.offset().top - header.outerHeight())},1000);

    };



// 格言分頁

    var mottoicon_click = function(){
        // 先全部移除this_mottoicon
        $(this).siblings().removeClass("this_mottoicon");
        $(this).removeClass("this_mottoicon");

        // 再抓classname
        var mottoicon_name=$(this).attr("class");
        var motto_name=mottoicon_name.slice(12);

        // 再變色
        $(this).addClass("this_mottoicon");

        // 格言名字title
        var this_mottoname = $(".this_mottoname div");
        this_mottoname.text(motto_name);



        // 按鈕點擊後往上捲到第二選單(才看得到下面有產品出來)
        $('html,body').stop(true,false).animate({scrollTop:(productclass_secondnav.offset().top - header.outerHeight())},1000);

    };



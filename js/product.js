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
        location.href = product_class_html;
    };


    product_logo.click(function(){
        // 全部先移除
        product_logo.removeClass("this_productclass");

        // 取得現在點擊的類別字串
        var product_class_name = $(this).attr("class");
        var product_class_html = product_class_name + ".html" ; //字串串接出檔案名稱

        // 加上新類別換內容
        $(this).addClass("this_productclass");


        // ajax
        // productclass_intro_content.load("ajax/product_animal.html");

        location.href = product_class_html; //暫時先換頁

        console.log(product_class_html);

    })



// 經典分頁

    var click_this_woodicon = $(".productclass_secondnav div.woodicon div");
    var this_woodname = $(".this_woodname div");

    click_this_woodicon.click(function(){
        // 先全部移除this_woodicon
        click_this_woodicon.removeClass("this_woodicon");

        // 再抓classname
        var woodicon_name=$(this).attr("class");
        var wood_name=woodicon_name.slice(7);

        // 再變色
        $(this).addClass("this_woodicon");

        // 格言名字title
        this_woodname.text(wood_name);



        // 按鈕點擊後往上捲到第二選單(才看得到下面有產品出來)
        $('html,body').stop(true,false).animate({scrollTop:(productclass_secondnav.offset().top - header.outerHeight())},1000);

    });



// 動物分頁

    var click_this_animalicon = $(".productclass_secondnav div.animalicon div");
    var this_animalicon_large = $(".product_item .this_animalicon_large div");
    var this_animalname = $(".this_animalname div");

    click_this_animalicon.click(function(){
        // 先全部移除this_animalicon
        click_this_animalicon.removeClass("this_animalicon");

        // 再抓classname
        var animalicon_name=$(this).attr("class");
        var animal_name=animalicon_name.slice(13);

        // 再變色
        $(this).addClass("this_animalicon");

        // 下面換圖
        this_animalicon_large.removeClass();
        this_animalicon_large.addClass(animalicon_name);

        // 動物名字title
        this_animalname.text(animal_name);



        // 按鈕點擊後往上捲到第二選單(才看得到下面有產品出來)
        $('html,body').stop(true,false).animate({scrollTop:(productclass_secondnav.offset().top - header.outerHeight())},1000);

    });



// 格言分頁

    var click_this_mottoicon = $(".productclass_secondnav div.mottoicon div");
    var this_mottoname = $(".this_mottoname div");

    click_this_mottoicon.click(function(){
        // 先全部移除this_mottoicon
        click_this_mottoicon.removeClass("this_mottoicon");

        // 再抓classname
        var mottoicon_name=$(this).attr("class");
        var motto_name=mottoicon_name.slice(12);

        // 再變色
        $(this).addClass("this_mottoicon");

        // 格言名字title
        this_mottoname.text(motto_name);



        // 按鈕點擊後往上捲到第二選單(才看得到下面有產品出來)
        $('html,body').stop(true,false).animate({scrollTop:(productclass_secondnav.offset().top - header.outerHeight())},1000);

    });



// 因為有可能載入畫面時，剛好停在有動畫元件的位置，這時就寫下面這行，window一載入就觸發scroll事件
$window.trigger('scroll');


    var $window = $(window);
    var wrap = $(".wrap");
    var logo = $(".logo");
    var secondbanner = $(".secondbanner");


$window.on("scroll", function(e) {
    // console.log(this.scrollY);
    // console.log(wrap.height());
  if (this.scrollY > 45) {
    logo.addClass("logo2");
    secondbanner.addClass("secondbanner2");
  } 
  else {
    logo.removeClass("logo2");
    secondbanner.removeClass("secondbanner2");
  }
  
});



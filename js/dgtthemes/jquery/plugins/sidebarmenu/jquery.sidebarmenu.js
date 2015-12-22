$dgt(function($){
    var body = $('body'),
        container = $('.dgt-container'),
        wrapper = $('.dgt-wrapper'),
        siteOverlay = $('.site-overlay'),
        close = $('.close-canvas'),
        pushyActiveClass = "dgt-effect-slide dgt-menu-open",
        menu = $('.dgt-menu'),
        containerClassActive = "dgt-container-active",
        menuWidth = menu.width() + "px",
        menuSpeed = 500,
        menuBtn = $('.dgt-canvas-button');
    function toggleMenu(){
        body.toggleClass(pushyActiveClass);
        wrapper.toggleClass(containerClassActive);
        menu.css('height', container.height());
    }

    function openMenuFallback(){
        body.addClass(pushyActiveClass);
        menu.animate({left: "0px", visibility: 'visible'}, menuSpeed);
        wrapper.animate({left: menuWidth}, menuSpeed); //css class to add pushy capability
    }

    function closeMenuFallback(){
        body.removeClass(pushyActiveClass);
        menu.animate({left: "-" + menuWidth, visibility: 'hidden'}, menuSpeed);
        wrapper.animate({left: "0px"}, menuSpeed); //css class to add pushy capability
    }

    $(window).resize(function(){
        var mainWidth = $(window).width();
        if(mainWidth > 767){
            body.removeClass(pushyActiveClass);
            if(!Modernizr.csstransforms3d){
                closeMenuFallback();
            }
        }
    });

    if(Modernizr.csstransforms3d){
        //toggle menu
        menuBtn.click(function() {
            toggleMenu();
        });
        //close menu when clicking button clone
        close.click(function(){
            toggleMenu();
        });//close menu when clicking site overlay
        siteOverlay.click(function(){
            toggleMenu();
        });
    }else{
        //jQuery fallback
        menu.css({left: "-" + menuWidth}); //hide menu by default
        container.css({"overflow-x": "hidden"}); //fixes IE scrollbar issue

        //keep track of menu state (open/close)
        var state = true;

        //toggle menu
        menuBtn.click(function() {
            if (state) {
                openMenuFallback();
                state = false;
            } else {
                closeMenuFallback();
                state = true;
            }
        });

        //close Menu
        close.click(function() {
            if (state) {
                openMenuFallback();
                state = false;
            } else {
                closeMenuFallback();
                state = true;
            }
        });

        //close menu when clicking site overlay
        siteOverlay.click(function(){
            if (state) {
                openMenuFallback();
                state = false;
            } else {
                closeMenuFallback();
                state = true;
            }
        });
    }
});
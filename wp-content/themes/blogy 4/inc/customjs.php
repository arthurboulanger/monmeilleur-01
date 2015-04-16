<?php
function Theme2035_customjs() {
global $theme_prefix; 
?>
<script type="text/javascript">

<?php
if(is_single()){
$blog_type = $theme_prefix['blog-post-page-type'];
$temp_blog_type = get_post_meta( get_the_ID(), 'theme2035_pagetype', true );
if($temp_blog_type == ""){$temp_blog_type = $blog_type;}
if($blog_type != $temp_blog_type){
    $blog_type = $temp_blog_type;
}
if($blog_type == "modern"){
        if($theme_prefix['modern-effect'] == 1){
?>
var mobileMe = {
    Android: function() {
        return navigator.userAgent.match(/Android/i);
    },
    BlackBerry: function() {
        return navigator.userAgent.match(/BlackBerry/i);
    },
    iOS: function() {
        return navigator.userAgent.match(/iPhone|iPad|iPod/i);
    },
    Opera: function() {
        return navigator.userAgent.match(/Opera Mini/i);
    },
    Windows: function() {
        return navigator.userAgent.match(/IEMobile/i);
    },
    any: function() {
        return (mobileMe.Android() || mobileMe.BlackBerry() || mobileMe.iOS() || mobileMe.Opera() || mobileMe.Windows());
    }
};
if(!mobileMe.any()){
if(jQuery('#modern-post-effect').length){
            (function() {
                // detect if IE : from http://stackoverflow.com/a/16657946      
                var ie = (function(){
                    var undef,rv = -1; // Return value assumes failure.
                    var ua = window.navigator.userAgent;
                    var msie = ua.indexOf('MSIE ');
                    var trident = ua.indexOf('Trident/');

                    if (msie > 0) {
                        // IE 10 or older => return version number
                        rv = parseInt(ua.substring(msie + 5, ua.indexOf('.', msie)), 10);
                    } else if (trident > 0) {
                        // IE 11 (or newer) => return version number
                        var rvNum = ua.indexOf('rv:');
                        rv = parseInt(ua.substring(rvNum + 3, ua.indexOf('.', rvNum)), 10);
                    }

                    return ((rv > -1) ? rv : undef);
                }());


                // disable/enable scroll (mousewheel and keys) from http://stackoverflow.com/a/4770179                  
                // left: 37, up: 38, right: 39, down: 40,
                // spacebar: 32, pageup: 33, pagedown: 34, end: 35, home: 36
                var keys = [32, 37, 38, 39, 40], wheelIter = 0;

                function preventDefault(e) {
                    e = e || window.event;
                    if (e.preventDefault)
                    e.preventDefault();
                    e.returnValue = false;  
                }

                function keydown(e) {
                    for (var i = keys.length; i--;) {
                        if (e.keyCode === keys[i]) {
                            preventDefault(e);
                            return;
                        }
                    }
                }

                function touchmove(e) {
                    preventDefault(e);
                }

                function wheel(e) {
                    // for IE 
                    //if( ie ) {
                        //preventDefault(e);
                    //}
                }

                function disable_scroll() {
                    window.onmousewheel = document.onmousewheel = wheel;
                    document.onkeydown = keydown;
                    document.body.ontouchmove = touchmove;
                }

                function enable_scroll() {
                    window.onmousewheel = document.onmousewheel = document.onkeydown = document.body.ontouchmove = null;  
                }

                var docElem = window.document.documentElement,
                    scrollVal,
                    isRevealed, 
                    noscroll, 
                    isAnimating,
                    container = document.getElementById( 'modern-post-effect' );

                function scrollY() {
                    return window.pageYOffset || docElem.scrollTop;
                }
                
                function scrollPage() {
                    scrollVal = scrollY();
                    
                    if( noscroll && !ie ) {
                        if( scrollVal < 0 ) return false;
                        // keep it that way
                        window.scrollTo( 0, 0 );
                    }

                    if( classie.has( container, 'notrans' ) ) {
                        classie.remove( container, 'notrans' );
                        return false;
                    }

                    if( isAnimating ) {
                        return false;
                    }
                    
                    if( scrollVal <= 0 && isRevealed ) {
                        toggle(0);
                    }
                    else if( scrollVal > 0 && !isRevealed ){
                        toggle(1);
                    }
                }

                function toggle( reveal ) {
                    isAnimating = true;
                    
                    if( reveal ) {
                        classie.add( container, 'modify' );
                    }
                    else {
                        noscroll = true;
                        disable_scroll();
                        classie.remove( container, 'modify' );
                    }

                    // simulating the end of the transition:
                    setTimeout( function() {
                        isRevealed = !isRevealed;
                        isAnimating = false;
                        if( reveal ) {
                            noscroll = false;
                            enable_scroll();
                        }
                    }, 1200 );
                }

                // refreshing the page...
                var pageScroll = scrollY();
                noscroll = pageScroll === 0;
                
                disable_scroll();
                
                if( pageScroll ) {
                    isRevealed = true;
                    classie.add( container, 'notrans' );
                    classie.add( container, 'modify' );
                }
                
                window.addEventListener( 'scroll', scrollPage );
            })();

           }}
          
<?php
}}}
?>


</script>

<?php }
add_action( 'wp_footer', 'Theme2035_customjs', 20 );
?>
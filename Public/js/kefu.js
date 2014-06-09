/**
 * Created with JetBrains PhpStorm.
 * User: stu
 * Date: 14-1-11
 * Time: 下午2:12
 * To change this template use File | Settings | File Templates.
 */
(function($) {
    $.fn.kefu=function(){
        $(window).scroll(function(){
            $('#keFu').animate({
                top:$(window).scrollTop()+60+'px',
                left:'30px'
            },{duration:900,queue:false});
        });
    }
})(jQuery);


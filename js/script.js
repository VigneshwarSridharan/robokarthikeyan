(function ($) {
    
    function count()
    {
        
    }
    
    $(document).ready(function () {
        count();
    });
    $(window).load(function() {
        
        $('.btn-move').each(function(k,el) {
            var paddingRight;
            if($(el).hasClass('btn-large'))
                {
                    paddingRight = 70;
                }
            else 
                {
                    paddingRight = 36;
                }
            $(el).css({
                width:$(el).find('span').outerWidth()+paddingRight
            });
            console.log($(el).find('span').outerWidth()+$(el).css('padding-right'));
        });
            
            
        
    });
})(jQuery)



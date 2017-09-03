(function ($) {
    
    function count()
    {
        
    }
    
    function gridShift()
    {
        $('.post-items-grid:even').addClass('left');
        $('.post-items-grid:odd').each(function() {
            var $child = $(this).find('.row').children();
            $(this).addClass('right');
            $child.each(function(k) {
                var grid = 12 - Number($(this).attr('class').split('-')[2]);
                if(k%2)
                    {
                        $(this).addClass('col-sm-pull-'+grid)
                    }
                else
                    {
                        $(this).addClass('col-sm-push-'+grid)
                    }
            })
        });
    }
    
    $(document).ready(function () {
        count();
        gridShift();
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
        });
            
            
        
    });
})(jQuery)



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
    
    function navigation()
    {
        $('.nav-btn,.close-nav').click(function() {
            $('body').toggleClass('menu-open');
            if($('body').hasClass('menu-open'))
                {
                    $('.links li').each(function(k,el) {
                        setTimeout(function() {
                            $(el).addClass('visble');
                        },k*150);
                    });
                }
            else
                {
                    $('.links li').removeClass('visble');
                }
            
        });
    }
    
    function search()
    {
        var aj;
        $('.search-box [name="s"]').on('input',function() {
            var search = $(this).val();
            if(search != "")
                {
                     $('.search-content').show();
                     clearTimeout(aj);
                     aj = setTimeout(function() {
                        $('.page-content,header .page-title').hide();
                        $.ajax({
                            method: "POST",
                            url: "http://spiderznet.com/karthikeyan/",
                            data: { s: search },
                            success: function(data) {
                                
                                $('.search-content').html(data);
                                gridShift();
                                moveButton();
                            },
                            error: function()
                            {
                                
                            }
                        });
                    },1000);
                }
            else
                {
                    clearTimeout(aj);
                    $('.page-content,header .page-title').show();
                    $('.search-content').hide();
                }
            
        })
    }
    
    function moveButton()
    {
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
    }
    
    function wp_ajax()
    {
        $.ajax({
            type: 'POST',
            url: 'http://spiderznet.com/karthikeyan/wp-admin/admin-ajax.php',
            data : ({
                action : 'add_foobar'
            }),
            success : function(data)
            {
                console.log(data);
            }
        });
    }
    
    $(document).ready(function () {
        count();
        navigation();
        gridShift();
        search();
        
        $('.call').click(function() {
            wp_ajax();
        });
    });
    $(window).load(function() {
        moveButton();
    });
})(jQuery)



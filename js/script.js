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
        $('.nav-btn,[toggle-nav]').click(function() {
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
        var redirct = false;
        $.ajax({
            type: 'POST',
            url: 'http://spiderznet.com/karthikeyan/wp-admin/admin-ajax.php',
            data : ({
                action : 'add_foobar',
                uname : $('[name="uname"]').val(),
                email : $('[name="email"]').val(),
                pword : $('[name="pword"]').val()
            }),
            success : function(data)
            {
                var jdata = JSON.parse(data);
                console.log(jdata);
                if(jdata.username_exists == false && jdata.email_exists == false)
                    {
                        
                        console.log('redirct to :'+jdata.redirect);
                        redirct = jdata.redirect;
                    }
            }
        });
        
    }
    
    function opentab()
    {
        var data; 
        $('[data-tab-open]').on('click', function() {
            data =$(this).data('tab-open');
        });
        
        $('#User-login').on('show.bs.modal',function() {
            $('[href="'+data+'"]').tab('show');
        });
        
        $('[href="#login"],[href="#register"]').on('shown.bs.tab',function() {
            moveButton();
        });
    }
    
    function fixedNavigation(top)
    {
        if(top > 100)
            {
                $('.fixed-nav').addClass('active');
            }
        else
            {
                $('.fixed-nav').removeClass('active');
            }
    }
    
    $(document).ready(function () {
        count();
        navigation();
        gridShift();
        search();
        moveButton();
        opentab();
        $('.call').click(function() {
            wp_ajax();
        });
    });
    $(window).load(function() {
        moveButton();
    });
    
    $(window).on('scroll', function() {
        var top = $(window).scrollTop();
        fixedNavigation(top);
    });
})(jQuery)



(function ($) {
    
    $( "#slider" ).slider({
        max: 200,
        value:$('#slider').data('value'),
        slide: function( event, ui ) {
            $($(this).data('target')).css({
                backgroundSize: ui.value + '%'
            });
            $('[name="img-size"]').val(ui.value);
        }
    });
    
    var mediaUploader;
    
    $('[data-trigger="media"]').on('click', function(e) {
        e.preventDefault();
        var data = $(this).data();
        if(mediaUploader)
            {
                mediaUploader.open();
                return;
            }
        
        mediaUploader = wp.media.frames.file_frame = wp.media({
            title: data.message,
            multiple: false
        });
        
        mediaUploader.on('select', function() {
            attachment = mediaUploader.state().get('selection').first().toJSON();
            $(data.target).val(attachment.id);
            if(data.isbg)
                {
                    var change = $(data.preview).find('img').attr('src').replace('blank','empty');
                    $(data.preview).css({
                        backgroundImage: 'url('+attachment.url+')'
                    });
                    
                    $(data.preview).find('img').attr('src',change);
                }
            else
                {
                    $(data.preview).attr('src',attachment.url);
                }
             
        });
        
        mediaUploader.open();
        
    });
    $('.post-image-option .controls').children().on('click mousedown',  function() {
        var $el = $(this);
        var diraction = $el.attr('class');
        var x = $('[name="img-pos-x"]').val();
        var y = $('[name="img-pos-y"]').val();
        
        if(diraction == 'left' && x > 0)
            {
                x--;
                $('[name="img-pos-x"]').val(x);
                $('[name="img-pos-x"]').trigger('change');
            }
        if(diraction == 'right' && x < 100)
            {
                x++;
                $('[name="img-pos-x"]').val(x);
                $('[name="img-pos-x"]').trigger('change');
            }
        if(diraction == 'top' && y > 0)
            {
                y--;
                console.log($('[name="img-pos-y"]'));
                $('[name="img-pos-y"]').val(y);
                $('[name="img-pos-y"]').trigger('change');
            }
        if(diraction == 'bottom' && y < 100)
            {
                y++;
                $('[name="img-pos-y"]').val(y);
                $('[name="img-pos-y"]').trigger('change');
            }
    });
    
    $('.post-image-option .form-group').on('input', function(){
        $(this).trigger('change');
    });
    
    $('.post-image-option .form-control').on('change', function() {
        $('.post-image-option .form-control').each(function(k,el){
            var data = $(el).data('position');
            if(data == 'x')
                {
                    $('#img-1').css({
                        backgroundPositionX:$(el).val() + '%'
                    });
                }
            if(data == 'y')
                {
                    $('#img-1').css({
                        backgroundPositionY:$(el).val() + '%'
                    });
                }
        });
    });
})(jQuery)
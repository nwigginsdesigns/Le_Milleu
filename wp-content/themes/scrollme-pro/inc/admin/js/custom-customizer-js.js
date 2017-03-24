jQuery(document).ready(function ($) {
    /** Select Multiple Categories **/
    $('.ex-cat-wrap input:checkbox').on('change', function (e) {
        e.preventDefault();
        var chkbox = $(this).parents('.ex-cat-wrap').find('input:checkbox');//$('#ex-cat-wrap input:checkbox');
        var id = '';
        
        $.each( chkbox, function () {
            var oid = $(this).val(); 
            
            if($(this).attr('checked')) {
                id += oid;
                id += ','; 
            }
        });
        
        $(this).parents('.ex-cat-wrap').next('input:hidden').val(id).change();
    });

    /** Reorder Home Page Sections **/
    $('#tm-sections-reorder').sortable({
        cursor: 'move',
        axis: 'y',
        update: function(event, ui) {
            var section_ids = '';
            $('#tm-sections-reorder li').css('cursor','default').each(function() {
            var section_id = jQuery(this).attr( 'data-section-name' );
            section_ids = section_ids + section_id + ',';
            //section_ids = section_ids.slice(0,-1);
            });
            $('#shortui-order').val(section_ids);
            $('#shortui-order').trigger('change');
        }
    });

    /** Preloader Selection **/
    $(".cmizer-preloader").click(function (e) {
        e.preventDefault();
        var preloader = $(this).attr("preloader");
        
        $(this).parents(".cmizer-preloader-container").find('.cmizer-preloader').removeClass('active');
        $(this).addClass('active');
        $(this).parents(".cmizer-preloader-container").next('input:hidden').val(preloader).change();
    });

    /** Datepicker **/
    $('.datepicker').on('focus', function () {
        $(this).datepicker();
    });
});
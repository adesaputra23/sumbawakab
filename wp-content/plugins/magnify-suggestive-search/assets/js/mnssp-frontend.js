jQuery(document).ready(function($) {
    $(".mnssp-icon").on('click', function(){
        $(".mnssp-wrap, .search-input").toggleClass("active");
        $("input[type='search']").focus();
    });

    $('.mnssp-overlay-template.openBtn').on('click', function(){
        $('#mnssp-overlay-template').show();
    });

    $('#mnssp-overlay-template .closebtn').on('click',  function(){
        $('#mnssp-overlay-template').hide();
    });

    // Get the bar_id and color settings from the form
    var mnssp_bar_id = $('#mnssp-autocomplete-form').data('bar-id') || 0;
    var resultsBgColor = $('#mnssp-autocomplete-form').data('results-bg') || '#ffffff';
    var resultsTextColor = $('#mnssp-autocomplete-form').data('results-text') || '#333333';
    var resultsHoverColor = $('#mnssp-autocomplete-form').data('results-hover') || '#f5f5f5';

    $('#mnssp-autocomplete-input').autocomplete({
        source: function(request, response) {
            $.ajax({
                url: mnssp_frontend_object.ajaxurl,
                dataType: 'json',
                data: {
                    action: 'mnssp_autocomplete_search',
                    term: request.term,
                    post_types: $('#mnssp-autocomplete-form input[name="post_type"]').val(),
                    bar_id: mnssp_bar_id,
                    mnssp_autocomplete_nonce: mnssp_frontend_object.nonce
                },
                success: function(data) {
                    response($.map(data, function(item) {
                        return {
                            label: item.label,
                            value: item.value
                        };
                    }));
                }    
            });
        },
        select: function(event, ui) {            
            if (ui.item.value !== '#') {
                window.location.href = ui.item.value;
            } else {
                event.preventDefault();
            }
        },
        minLength: mnssp_frontend_object.minimum_character,
        open: function(event, ui) {
            // Apply custom colors when menu opens
            $('.ui-autocomplete').css({
                'background-color': resultsBgColor,
                'color': resultsTextColor,
                'border': '1px solid #ccc'
            });
        }
    }).autocomplete("instance")._renderItem = function(ul, item) {
        // Custom render to apply colors to each item
        return $("<li>")
            .append("<div style='padding: 5px 10px; background-color: " + resultsBgColor + "; color: " + resultsTextColor + ";'>" + item.label + "</div>")
            .appendTo(ul)
            .hover(function() {
                $(this).find('div').css('background-color', resultsHoverColor);
            }, function() {
                $(this).find('div').css('background-color', resultsBgColor);
            });
    };
});

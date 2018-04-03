(function($) {

var elementName = false;

$.ajax({
  type: 'GET',
  dataType: 'json',
  url: window.location.origin+'/bedrock/wp-content/plugins/formation-autocomplete/get-autocomplete-values.php',
  success: function(results) {
    elementName =  $('input[name="' + results['element'] + '"]');
    values = results['values'];

    if (elementName) {
      $(elementName).keyup(function(e){
        if (e.keyCode != 40 && e.keyCode != 38) {
          $('#autocompleteResults').remove();
          if (elementName.val().length > 1) {
            var autocompleteValues = [];
            for (var i = 0; i < values.length; i++) {
              var string = values[i].toLowerCase(),
                  substring = elementName.val().toLowerCase();

              if (string.indexOf(substring) >= 0) {
                autocompleteValues.push(values[i]);
              }
            }

            if (autocompleteValues.length > 0) {
              html = '<ul id="autocompleteResults">';
              for (var i = 0; i < autocompleteValues.length; i++) {
                html += '<li tabindex="-1">' + autocompleteValues[i] + '</li>';
              }
              html += '</ul>';
              $(elementName).parent().append(html);
            }
          }
        }
      });
    }

    $('body').on('mousedown', '#autocompleteResults li', function(){
      $(elementName).val($(this).html());
      $('#autocompleteResults li.selected').removeClass('selected');
      $('#autocompleteResults').remove();
    });

    $('body').keydown(function(e){
      if (e.keyCode === 38) { // Up
        e.preventDefault();
        if ($(elementName).is(':focus')) {
          if (!$('#autocompleteResults li.selected').length) {
            $('#autocompleteResults li').last().addClass('selected');
          } else {
            var element = $('#autocompleteResults li.selected');
            $(element).removeClass('selected');
            if (!(element).is(':first-child')) {
              $(element).prev().addClass('selected');
            } else {
              $('#autocompleteResults li').last().addClass('selected');
            }
          }
        }
        $(elementName).val($('#autocompleteResults li.selected').html());
      } else if (e.keyCode === 40) { // Down
        e.preventDefault();
        if ($(elementName).is(':focus')) {
          if (!$('#autocompleteResults li.selected').length) {
            $('#autocompleteResults li').first().addClass('selected');
          } else {
            var element = $('#autocompleteResults li.selected');
            $(element).removeClass('selected');
            if (!(element).is(':last-child')) {
              $(element).next().addClass('selected');
            } else {
              $('#autocompleteResults li').first().addClass('selected');
            }
          }
        }
        $(elementName).val($('#autocompleteResults li.selected').html());
      } else if (e.keyCode === 13) { // Enter
        if ($('#autocompleteResults li.selected').length) {
          e.preventDefault();
          $(elementName).val($('#autocompleteResults li.selected').html());
          $('#autocompleteResults li.selected').removeClass('selected');
          $('#autocompleteResults').remove();
          $(elementName).blur();
        }
      }
    });

    $(elementName).blur(function(e){
      $('#autocompleteResults li.selected').removeClass('selected');
      $('#autocompleteResults').remove();
    });

    $('<style type="text/css">#autocompleteResults li.selected, #autocompleteResults li:hover { color:'+results['text_colour']+'; background:'+results['background_colour']+';} </style>').appendTo('head');
  },
  error: function() {

  }
});

})( jQuery );

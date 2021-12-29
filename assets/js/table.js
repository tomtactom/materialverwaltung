// Quelle: Yogesh Singh. (2021). Editable Table with jQuery AJAX (Demo 2) [JavaScript]. Makitweb. https://makitweb.com/make-live-editable-table-with-jquery-ajax/.

$(document).ready(function() {

  // Allow only numbers at <input type="number"> fields
  var next = true;
  $('input[type="number"]').bind('keydown', function(event) {
    switch (event.keyCode) {
      case 8: // Backspace
      case 9: // Tab
      case 13: // Enter
      case 37: // Left
      case 38: // Up
      case 39: // Right
      case 40: // Down
        break;
      default:
        var regex = new RegExp("^[0-9]+$");
        var key = event.key;
        if (!regex.test(key)) {
          event.preventDefault();
          return false;
        }
        break;
    }
  });

  // Show Input element
  $('.edit').click(function() {
    $('.txtedit').hide();
    $(this).next('.txtedit').show().focus();
    $(this).hide();
  });

  $(".txtedit").focusout(function() {

    var table = this.getAttribute('table');
    var entry = this.getAttribute('entry');
    var value = String(this.value);
    var id = this.getAttribute('rowid');
    var securitycode = this.getAttribute('securitycode');

    // Rucksack/Box (pack)
    if (entry == 'pack_id') {
      var selected_row_id = $(this).prev(".edit").attr('selected_row_id') + "xD";
      console.log(selected_row_id);
    }


    // GET packing_degree from product_id
    if ("date" == $(this).attr('type')) {

      var packing_degree = $.ajax({
        url: 'information.php?packing_degree=1',
        type: 'post',
        data: {
          product_id: id,
          securitycode: securitycode
        },
        success: function(response) {
          return response
        },
        async: false
      });
      console.log("packing_degree → " + packing_degree.responseText);
      if (packing_degree.responseText == "2" || packing_degree.responseText == "3" || packing_degree.responseText == "4") {
        if (String(this.value) == "0" || String(this.value) == false) {
          $(this).hide();
          $(this).prev('.edit').show();
          var alertmessage = "Dieses Produkt benötigt ein Ablaufdatum.";
          $('#alertarea').html('<div id="warning_alertblock" class="alert alert-warning alert-dismissible fade show" role="alert" style="display:none;"><p>' + alertmessage + '</p><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
          return false;
        }
      }
    }

    if (next = true) {
      // Get edit id, field name and value
      var field_name = $('option:selected', this).attr('called');
      if ($(this).attr('type')) {
        field_name = String(this.value);

        if (field_name == "0" || field_name == false) {
          if ("number" == $(this).attr('type')) {
            field_name = "1";
            this.value = "1";
          }

          if ("date" == $(this).attr('type')) {
            field_name = "<i>Kein Ablaufdatum</i>";
          }
        }
      }

      // Hide Input element
      $(this).hide();

      // Hide and Change Text of the container with input element
      $(this).prev('.edit').show();
      $(this).prev('.edit').html(field_name);

      // Sending AJAX request
      $.ajax({
        url: 'update.php',
        type: 'post',
        data: {
          table: table,
          entry: entry,
          value: value,
          id: id,
          securitycode: securitycode
        },
        success: function(response) {
          if (response) {
            console.log('Erfolgreich gespeichert.');
            console.log(response);
          } else {
            console.log("Nicht gespeichert.");
            console.log(response);
          }
        }
      });
    }
  });
});
// Quelle: https://makitweb.com/make-live-editable-table-with-jquery-ajax/
$(document).ready(function(){

 // Show Input element
 $('.edit').click(function(){
  $('.txtedit').hide();
  $(this).next('.txtedit').show().focus();
  $(this).hide();
 });

 // Save data
 $(".txtedit").focusout(function(){

  // Get edit id, field name and value
  var id = this.id;
  var split_id = id.split("_");
  //var field_name = split_id[0];

  var field_name = this.value

  var edit_id = split_id[1];
  var value = $(this).val();

  // Hide Input element
  $(this).hide();

  // Hide and Change Text of the container with input elmeent
  $(this).prev('.edit').show();
  $(this).prev('.edit').text(value);

  // Sending AJAX request
  $.ajax({
   url: 'update.php',
   type: 'post',
   data: { field:field_name, value:value, id:edit_id },
   success:function(response){
      if(response == 1){
         console.log('Erfolgreich gespeichert.');
      }else{
         console.log("Nicht gespeichert.");
      }
   }
  });

 });

});

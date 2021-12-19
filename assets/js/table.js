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
  var id = this.value;
  var split_id = id.split("_");
  var field_name = this.called;
  var securitycode = this.securitycode
  var entry = this.entry
  var table = this.table

  var value = $(this).val();

  // Hide Input element
  $(this).hide();

  // Hide and Change Text of the container with input elmeent
  $(this).prev('.edit').show();
  $(this).prev('.edit').text(field_name);

  // Sending AJAX request
  $.ajax({
   url: 'update.php',
   type: 'post',
   data: { table:table, entry:entry, id:id, securitycode:securitycode },
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

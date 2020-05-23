$(function(){
 
 var oldVal, newVal, id, idelem;
 $('.edit_admin_about').focus(function(){
 oldVal = $(this).text();
 id = $(this).data('id');
 idelem=$(this).attr('id');
 }).blur(function(){
 newVal = $(this).text();
 if(newVal != oldVal){
 $.ajax({
 url: "/application/views/edit_admin_about.php",
 type: 'POST',
 dataType: 'json',
 data: {new_val: newVal, id: id, row: idelem},

success: function(res) {
console.log(res);
},
error: function(eee) {
console.log(eee);
}
 });
 }
 return false;
 });
 
});
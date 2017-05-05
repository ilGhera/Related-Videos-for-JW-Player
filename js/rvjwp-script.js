//SHOW FIELD ONLY FOR A SPECIFIC SELECT/ SHOW/HIDE REQUIRED
jQuery(document).ready( function($) {

	//CUSTOM FIELD
	$('#thumbnail').on('change',function(){
        if( $(this).val() == "Custom field" ){
	        $("#field").show()
	        $("#field").attr('required', 'reuired');
        }
        else{
	        $("#field").hide();
	        $("#field").removeAttr('required');
        }
    });

})
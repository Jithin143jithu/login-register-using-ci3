/**
 * @author Jithin VP
 */

/*To delete school for admin*/
jQuery(document).ready(function(){

	jQuery(document).on("click", ".deleteUser", function(){
		var userId = $(this).data("userid"),
			hitURL = baseURL + "deleteUser",
			currentRow = $(this);
		
		var confirmation = confirm("Are you sure to delete this User.?");
		
		if(confirmation)
		{
			jQuery.ajax({
			type : "POST",
			dataType : "json",
			url : hitURL,
			data : { userId : userId } 
			}).done(function(data){
				//console.log(data);
				currentRow.parents('tr').remove();
				if(data.status = true) { alert("User successfully deleted");  window.location.reload(); }
				else if(data.status = false) { alert("User deletion failed");  window.location.reload(); }
				else { alert("Access denied..!");  window.location.reload(); }
			});
		}
	});
	
});


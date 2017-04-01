function Foster(){
	this.empty = 0;
	this.deleteCheck = function(id){
		return $.ajax({
			url : APP_PATH+"fosters/checkAssociations/"+id,
			context : this
		}).done(function(result){
			this.empty = result;
		});
	}

}

$(document).ready(function() {
	// add an existing tag
  $('a[data-ix="add-tag"]').click(function() {
		$('.add-tag').css('display','flex');
		$('.add-tag-inner').css('display','flex');
		$('.add-tag-inner').css('opacity','1');
  });

  $('.cancel').click(function() {
		$('.add-tag').css('display','none');
		$('.add-tag-inner').css('display','none');
		$('.add-tag-inner').css('opacity','0');
  });


});
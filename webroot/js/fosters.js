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

	/*this.deleteTag = function(tag_id, foster_id){
		return $.ajax({
            url : "<?= $this->Url->build(['controller'=>'fosters','action'=>'deleteTag']); ?>",
            type : 'POST',
            data : {
                'tag_id' : tag_id,
                'foster_id' : foster_id
            }
        }).done(function(result) {
            result = JSON.parse(result);
            console.log(result);
            //result.fadeOut();
            //$('#tag').append('<option value="'+result['tag_id']+'">'+result['label']+'</option>');
        });
	}*/
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

  $('a[data-ix="delete-tag"]').click(function() {
		$('.delete-tag').css('display','flex');
		$('.tag-remove-inner').css('display','flex');
		$('.tag-remove-inner').css('opacity','1');
  });

  $('.cancel').click(function() {
		$('.delete-tag').css('display','none');
		$('.tag-remove-inner').css('display','none');
		$('.tag-remove-inner').css('opacity','0');
  });

});
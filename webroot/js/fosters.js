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
});

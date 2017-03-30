function calculateAndPopulateAgeFields() {
	var cat_dob_divs = $('.cat-dob');
	var cat_age_divs = $('.cat-age');

	for(var i = 0; i < cat_dob_divs.length; i++) {
		// get and parse the DOB field on the page
		var cat_dob = cat_dob_divs[i].innerHTML;
		var cat_dob_details = cat_dob.split("/");
		
		var month = parseInt(cat_dob_details[0]) - 1;
		var day = parseInt(cat_dob_details[1]);
		var year = parseInt(cat_dob_details[2]) + 2000;

		// create js and moment date objects
		var jsdob = new Date(year, month, day);
		var momentdob = moment(jsdob);

		// get string and set it on the page
		var ageString = momentdob.fromNow(1);
		cat_age_divs[i].innerHTML = ageString;
	}
}

/* The Main Cat Object*/
var Cat = function(){
	/**
	 * This is the Object that holds the adopter info
	**/
	this.adopter_info_card = {};

	/**
	 * Return Adopter Card Object
	**/
	this.getAdopterCard = function(){
		return this.adopter_info_card;
	}
	/**
	 * Get A specific field from the Adopter Card Object
	**/
	this.getAdopterCardField = function(field){
		return this.adopter_info_card[field];
	}

	/**
	 * Call the Attach ADopter via AJAX.
	 * Return the call so we can use $.when()
	**/
	this.attachAdopter = function(adopter_id,cat_id){
		return $.ajax({
			url : APP_PATH+"cats/attachAdopter/"+adopter_id+"/"+cat_id,
			context : this
		}).done(function(result){
			this.adopter_info_card = JSON.parse(result);
		});
	}	

	/**
	 * We don't want a refresh, so lets manually build the card
	 * Once we build the card, we attach it to the passed in parent dom
	**/
	this.buildAdopterCard = function(adopter_id,card_parent_dom){
		//Parent Dom
		var profile_content = $('<div/>');
		profile_content.addClass("profile-content-cont");

		//Label Dom
		var profile_text_header = $('<div/>');
		profile_text_header.addClass("profile-text-header");
		profile_text_header.text("Adopter");

		//Anchor Tag Parent
		var card_cont = $('<div/>');
		card_cont.addClass("card-cont card-wrapper w-dyn-item");
		
		//Time to build the big Anchor
		var a_card = $('<a/>');
		a_card.addClass("card w-clearfix w-inline-block");
		a_card.attr('href',APP_PATH+"adopters/view/"+adopter_id);


		//build and append the collar img
		var img = $('<img/>');
		img.addClass("card-pic");
		img.attr('src',APP_PATH+"img/adopter-menu.png");
		a_card.append(img);

		//The Adopter Name Div
		var card_h1 = $('<div/>');
		card_h1.addClass("new-adopter-name card-h1");
		card_h1.text(this.getAdopterCardField('first_name')+" "+this.getAdopterCardField('last_name'));
		a_card.append(card_h1);

		//This parent DOM is for the fields.
		var card_field_wrap = $('<div/>');
		card_field_wrap.addClass("card-field-wrap");

		//I wanna iterate instead of typing a lot...
		var card_fields_text = {
			'notes':'Notes',
			'email':'Email',
			'phone':'Phone',
			'address':'Address'
		};

		//Within the $.each() the context is switched, which means "this" inside the $.each() does not reference
		// the cat object, so let's assign it
		var that = this;
		$.each(card_fields_text,function(i,e){
			//Field Wrapper
			var cf_dom = $('<div/>');
			cf_dom.addClass("card-field-cont");

			//Field Label
			var cf_h3 = $('<div/>');
			cf_h3.addClass("card-h3");
			cf_h3.text(e+":");

			//FIeld Content
			var cf_field_text = $('<div/>');
			cf_field_text.text(that.getAdopterCardField(i));

			//Attach to parent
			cf_dom.append(cf_h3);
			cf_dom.append(cf_field_text);

			//Attach Fields to Parent wrapper
			card_field_wrap.append(cf_dom);
		});

		//We don't need that anymore...
		delete(that);

		//Append fields to anchor
		a_card.append(card_field_wrap);

		//append anchor to parent
		card_cont.append(a_card);

		//alter html of super parent with the title 
		profile_content.html(profile_text_header);

		//append the content
		profile_content.append(card_cont);

		//Finally attach created DOM to passed in parent
		card_parent_dom.html(profile_content);
	}

	/**
	 * This is the Object that holds the foster info
	**/
	this.foster_info_card = {};

	/**
	 * Return Foster Card Object
	**/
	this.getFosterCard = function(){
		return this.foster_info_card;
	}
	/**
	 * Get A specific field from the Foster Card Object
	**/
	this.getFosterCardField = function(field){
		return this.foster_info_card[field];
	}

	/**
	 * Call the Attach ADopter via AJAX.
	 * Return the call so we can use $.when()
	**/
	this.attachFoster = function(foster_id,cat_id){
		return $.ajax({
			url : APP_PATH+"cats/attachFoster/"+foster_id+"/"+cat_id,
			context : this
		}).done(function(result){
			this.foster_info_card = JSON.parse(result);
		});
	}	

	/**
	 * We don't want a refresh, so lets manually build the card
	 * Once we build the card, we attach it to the passed in parent dom
	**/
	this.buildFosterCard = function(foster_id,card_parent_dom){
		//Parent Dom
		var profile_content = $('<div/>');
		profile_content.addClass("profile-content-cont");

		//Anchor Tag Parent
		var card_cont = $('<div/>');
		card_cont.addClass("card-cont card-wrapper w-dyn-item");
		
		//Time to build the big Anchor
		var a_card = $('<a/>');
		a_card.addClass("card w-clearfix w-inline-block");
		a_card.attr('href',APP_PATH+"fosters/view/"+foster_id);


		//build and append the collar img
		var img = $('<img/>');
		img.addClass("card-pic");
		img.attr('src',APP_PATH+"img/foster-menu.png");
		a_card.append(img);

		//The Adopter Name Div
		var card_h1 = $('<div/>');
		card_h1.addClass("new-foster-name card-h1");
		card_h1.text(this.getFosterCardField('first_name')+" "+this.getFosterCardField('last_name'));
		a_card.append(card_h1);

		//This parent DOM is for the fields.
		var card_field_wrap = $('<div/>');
		card_field_wrap.addClass("card-field-wrap");

		//I wanna iterate instead of typing a lot...
		var card_fields_text = {
			'rating':'Rating',
			'email':'Email',
			'phone':'Phone',
			'address':'Address',
			'avail':'Availability'
		};

		//Within the $.each() the context is switched, which means "this" inside the $.each() does not reference
		// the cat object, so let's assign it
		var that = this;
		$.each(card_fields_text,function(i,e){
			//Field Wrapper
			var cf_dom = $('<div/>');
			cf_dom.addClass("card-field-cont");

			//Field Label
			var cf_h3 = $('<div/>');
			cf_h3.addClass("card-h3");
			cf_h3.text(e+":");

			//FIeld Content
			var cf_field_text = $('<div/>');
			cf_field_text.text(that.getFosterCardField(i));

			//Attach to parent
			cf_dom.append(cf_h3);
			cf_dom.append(cf_field_text);

			//Attach Fields to Parent wrapper
			card_field_wrap.append(cf_dom);
		});

		//We don't need that anymore...
		delete(that);

		//Append fields to anchor
		a_card.append(card_field_wrap);

		//append anchor to parent
		card_cont.append(a_card);

		//append the content
		profile_content.append(card_cont);

		//Finally attach created DOM to passed in parent
		card_parent_dom.html(profile_content);
	}
}

$(function () {
	//Show me the new select option
	$('a[data-ix="add-adopter-click-desktop"]').click(function(){
		$('.add-adopter').css('display','flex');
		$('.add-adopter-inner').css('display','flex');
		$('.add-adopter-inner').css('opacity','1');
	});

	//I don't want to see the select
	$('.cancel').click(function(){
		$('.add-adopter').css('display','none');
		$('.add-adopter-inner').css('display','none');
		$('.add-adopter-inner').css('opacity','0');
	});

	//Show me the new select option
	$('a[data-ix="add-foster-click-desktop"]').click(function(){
		$('.add-foster').css('display','flex');
		$('.add-foster-inner').css('display','flex');
		$('.add-foster-inner').css('opacity','1');
	});

	//I don't want to see the select
	$('.cancel').click(function(){
		$('.add-foster').css('display','none');
		$('.add-foster-inner').css('display','none');
		$('.add-foster-inner').css('opacity','0');
	});

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


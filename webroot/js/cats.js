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

$(function () {
	
});
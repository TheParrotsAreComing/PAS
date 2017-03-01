$(document).ready(function() {
  $('.switch-dna').on('click', function() {
	if ($('.adopt-yes').is(':visible')) {
      $('.dna-reason').slideDown();
      $('#dna-reason').attr('required', true);
    } else {
      $('.dna-reason').slideUp();
      $('#dna-reason').attr('required', false);
    }
  });
});

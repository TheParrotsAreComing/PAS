$(function() {

  if ((typeof dna !== 'undefined') && dna) {
    $('.dna-reason').show();
    $('#dna-reason').attr('required', true);
    $('.adopt-yes').hide();
    $('.adopt-no').show();
  }

  $('.switch-dna').on('click', function(e) {
    if ($('.dna-reason').is(':visible')) {
      $('.dna-reason').slideUp();
      $('#dna-reason').attr('required', false);
      $('.adopt-no').hide();
      $('.adopt-yes').show();
    } else {
      $('.dna-reason').slideDown();
      $('#dna-reason').attr('required', true);
      $('.adopt-yes').hide();
      $('.adopt-no').show();
    }
    e.stopPropagation();
  });

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

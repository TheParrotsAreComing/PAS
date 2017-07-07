<?= $this->Html->script('cats.js'); ?>

<style>
	.search-field{
		margin: 0.5em;
	}
	.btn-search{
		text-align:center;
		margin: 0.5em;
	}
	.card-pic-cont{
		top:0;
	}
</style>
<div class="body">
  <div class="add-view column">
    <div class="button-add-signal" data-ix="add-mobile-showhide-2"></div>
    <div class="add-cont scroll1" data-ix="page-load-fade-in">
      <div class="add-header">
        <div class="add-field-h1">Add Cat to "<?= $litter['litter_name']; ?>"</div>
      </div>
      <?= $this->Form->create('Existing');?>
	  <div class="search-field">
		  <?= $this->Form->input('Search',['class'=>'w-input']); ?>
      </div>
	  <div class="btn-search">
		  <button type="button" id="SearchBtn"> Search </button>
      </div>
	  <div id="Results" class=""></div>
      <?= $this->Form->end();?>
    </div>
  </div>
</div>

<script>

var cat_url = "<?= $this->Url->build(['controller' => 'litters', 'action' => 'ajaxFindCat']); ?>";

function buildDom(cat_name,sex,type,dob,age,breed,id){

	var dyn_item = $('<div class="card-cont card-wrapper w-dyn-item"/>');

	var card_a = $('<a/>'); // Main anchor
	card_a.attr('href','javascript:void(0);');
	card_a.addClass('card w-clearfix w-inline-block');

	var div_card_cont = $('<div class="card-pic-cont"/>'); //Image container

	var cat_img = $('<img class="card-pic"/>');
	cat_img.attr('src','/img/cat-menu.png'); //Cat IMG here
	cat_img.attr('alt','Cat Picture');

	div_card_cont.append(cat_img);

	card_a.append(div_card_cont);

	var div_card_h1 = $('<div class="card-h1"/>');
	div_card_h1.text(cat_name); //Cat Name Here

	card_a.append(div_card_h1);

	var div_card_h2_cont = $('<div class="card-h2-cont"/>');
	var div_h2_symbol = $('<div class="card-h2-symbol"/>');
	div_h2_symbol.addClass(sex); //Add Gender 'male' or 'female'	
	div_h2_symbol.text("D");

	div_card_h2_cont.append(div_h2_symbol);

	var div_card_h2_type = $('<div/>');
	div_card_h2_type.addClass(sex); //Add Gender 'male' or 'female'	
	div_card_h2_type.text(type); //Cat or Kitten here.

	div_card_h2_cont.append(div_card_h2_type);

	card_a.append(div_card_h2_cont);


	var div_card_field_wrap = $('<div class="card-field-wrap"/>');
		var div_card_field_cont_1 = $('<div class="card-field-cont"/>');

			var div_card_field_cont_2 = $('<div class="card-field-cont"/>');

				var div_card_h3 = $('<div class="card-h3"/>');
				div_card_h3.text('DOB:');

				var div_card_field_text_1 = $('<div class="card-field-text cat-dob"/>');
				div_card_field_text_1.text(dob); //DOB

			div_card_field_cont_2.append(div_card_h3);
			div_card_field_cont_2.append(div_card_field_text_1);

			var div_card_field_cont_3 = $('<div class="card-field-cont"/>');

				var div_card_h3_2 = $('<div class="card-h3"/>');
				div_card_h3_2.text('Age:');

				var div_card_field_text_2 = $('<div class="card-field-text cat-age"/>');
				div_card_field_text_2.text(age); //Age

			div_card_field_cont_3.append(div_card_h3_2);
			div_card_field_cont_3.append(div_card_field_text_2);
		div_card_field_cont_1.append(div_card_field_cont_2);
		div_card_field_cont_1.append(div_card_field_cont_3);

		var div_card_field_cont_4 = $('<div class="card-field-cont"/>');
			var div_card_field_cont_5 = $('<div class="card-field-cont"/>');

					var div_card_h3_3 = $('<div class="card-h3"/>');
					div_card_h3_3.text('Breed:');

					var div_card_field_text_3 = $('<div class="card-field-text"/>');
					div_card_field_text_3.text(breed); //Breed
				div_card_field_cont_5.append(div_card_h3_3);
				div_card_field_cont_5.append(div_card_field_text_3);

		div_card_field_cont_4.append(div_card_field_cont_5);

	div_card_field_wrap.append(div_card_field_cont_1);
	div_card_field_wrap.append(div_card_field_cont_4);
	
	card_a.append(div_card_field_wrap);
	dyn_item.append(card_a);

	return dyn_item;


}
$(document).ready(function() {

	var ajax_requests = [];
		
	$('form').submit(function(e){
		e.preventDefault();
		$('#SearchBtn').click();
	});

	$('#SearchBtn').click(function(){

		var val = $('#search').val();

		// Prevent Stacking AJAX Calls
		$.each(ajax_requests,function(){
			this.abort();
			//this.remove();
		});

		ajax_requests.push(
			$.ajax({
				url : cat_url+"/"+val,
				type : "POST"
			}).done(function(result){
				var cats = JSON.parse(result);
				$('#Results').html('');

				$.each(cats,function(){
					//buildDom(cat_name,sex,type,dob,age,breed){
					var sex = this.is_female ? "female" : "male";
					var type = this.is_kitten ? "Kitten" : "Cat";
					var dob = moment(this.dob).format('MM/DD/gg');
					var dyn_item = buildDom(this.cat_name,sex,type,dob,"",this.breed.breed,this.id);

					$('#Results').append(dyn_item);
				});
				calculateAndPopulateAgeFields();
			})
		);
	});
    

});

</script>

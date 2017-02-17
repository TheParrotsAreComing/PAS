
<?= $this->Form->create($foster) ?>
  <div class="body">
    <div class="add-view column">
      <div class="button-add-signal" data-ix="add-mobile-showhide-2"></div>
      <div class="add-cont scroll1">
        <div class="add-header">
          <div class="add-field-h1">Create a Foster</div><img class="add-picture" height="90" src="http://uploads.webflow.com/img/image-placeholder.svg" width="90">
        </div>
        <div class="add-input-form-wrap w-form">
          <form class="add-input-form" data-name="Email Form 4" id="email-form-4" name="email-form-4">
            <label class="add-field-h2" for="First-Name">Personal Information</label>
            <div class="add-field-seperator"></div>
            <label class="add-field-h3" for="First-Name">First Name:</label>
			<?= $this->Form->input('first_name', ['class'=>'add-input w-input', 'data-name'=>'First-Name', 'label'=>false]);?>
            <label class="add-field-h3" for="First-Name-2">Last Name:</label>
            <?= $this->Form->input('last_name', ['class'=>'add-input w-input', 'data-name'=>'First-Name-2', 'label'=>false]);?>
            <label class="add-field-h3" for="E-mail">E-mail:</label>
			<?= $this->Form->input('email', ['class'=>'add-input w-input', 'data-name'=>'E-mail', 'label'=>false]);?>
            <label class="add-field-h2" for="First-Name">Contact Information</label>
            <div class="add-field-seperator"></div>
            <label class="add-field-h3" for="Address">Address:</label>
			<?= $this->Form->input('address', ['class'=>'add-input w-input', 'data-name'=>'Address', 'label'=>false]);?>
            <label class="add-field-h3" for="Phone">Phone:</label>
			<?= $this->Form->input('phone', ['class'=>'add-input w-input', 'data-name'=>'Phone', 'label'=>false]);?>
			<label class="add-field-h3" for="Experience">Experience:</label>
			<?= $this->Form->input('exp', ['class'=>'add-input w-input', 'data-name'=>'Experience', 'label'=>false]);?>
			<label class="add-field-h3" for="Pets">Pets:</label>
			<?= $this->Form->input('pets', ['class'=>'add-input w-input', 'data-name'=>'Pets', 'label'=>false]);?>
            <label class="add-field-h3" for="Kids">Kids:</label>
			<?= $this->Form->input('kids', ['class'=>'add-input w-input', 'data-name'=>'Kids', 'label'=>false]);?>
			<label class="add-field-h3" for="Availability">Availability:</label>
			<?= $this->Form->input('avail', ['class'=>'add-input w-input', 'data-name'=>'Availability', 'label'=>false]);?>
			<label class="add-field-h3" for="Rating">Rating:</label>
			<?= $this->Form->input('rating', ['class'=>'add-input w-input', 'data-name'=>'Rating', 'label'=>false]);?>
			<label class="add-field-h3" for="Notes">Notes:</label>
			<?= $this->Form->input('notes', ['class'=>'add-input w-input', 'data-name'=>'Notes', 'label'=>false]);?>
			<label class="add-field-h3" for="Tags">Tags:</label>
			<?= $this->Form->input('tags._ids', ['class'=>'add-input w-input', 'data-name'=>'Tags', 'label'=>false]);?>
			<?= $this->Form->input('is_deleted', ['class'=>'add-input w-input', 'label'=>false, 'type'=>'hidden', 'value'=>'0']);?>
			<?= $this->Form->submit() ?>
          </form>
          <div class="w-form-done">
            <div>Thank you! Your submission has been received!</div>
          </div>
          <div class="w-form-fail">
            <div>Oops! Something went wrong while submitting the form</div>
          </div>
        </div>
      </div>
    </div>
  </div>
 <?= $this->Form->end()?>
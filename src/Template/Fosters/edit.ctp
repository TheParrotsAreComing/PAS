
<div class="body">
  <div class="add-view column">
    <div class="button-add-signal" data-ix="add-mobile-showhide-2"></div>
    <div class="add-cont scroll1" data-ix="page-load-fade-in">
      <div class="add-header">
        <div class="add-field-h1">Edit a Foster</div><img class="add-picture" height="90" src="http://uploads.webflow.com/img/image-placeholder.svg" width="90">
      </div>
      <?= $this->Form->create($foster);?>
      <div class="add-input-form-wrap w-form">
        <form class="add-input-form" data-name="Email Form 4" id="email-form-4" name="email-form-4">
          <label class="add-field-h2" for="First-Name">Personal Information</label>
          <div class="add-field-seperator"></div>
          <label class="add-field-h3" for="First-Name">First Name<span class="required-field-indicator"><span class="pre"></span></span>:</label>
          <?= $this->Form->input('first_name', ['class'=>'add-input w-input', 'data-name'=>'First-Name', 'label'=>false, 
          'placeholder'=>'Enter First Name']);?>
          <label class="add-field-h3" for="Last-Name">Last Name<span class="required-field-indicator"><span class="pre"></span></span>:</label>
          <?= $this->Form->input('last_name', ['class'=>'add-input w-input', 'data-name'=>'Last-Name', 'label'=>false, 
          'placeholder'=>'Enter Last Name']);?>
          <label class="add-field-h3" for="E-mail">E-mail<span class="required-field-indicator"><span class="pre"></span></span>:</label>
          <?= $this->Form->input('email', ['class'=>'add-input w-input', 'data-name'=>'E-mail', 'label'=>false, 
          'placeholder'=>'Enter Valid Email Address']);?>
          <label class="add-field-h2" for="First-Name">Contact Information</label>
          <div class="add-field-seperator"></div>
          <label class="add-field-h3" for="Address">Address<span class="required-field-indicator"><span class="pre"></span></span>:</label>
          <?= $this->Form->input('address', ['class'=>'add-input w-input', 'data-name'=>'Address', 'label'=>false, 
          'placeholder'=>'Enter Address']);?>
          <label class="add-field-h3" for="Phone">Phone<span class="required-field-indicator"><span class="pre"></span></span>:</label>
          <?= $this->Form->input('phone', ['class'=>'add-input w-input', 'data-name'=>'Phone', 'label'=>false, 
          'placeholder'=>'Enter Phone Number']);?>
          <label class="add-field-h3" for="Experience">Experience<span class="required-field-indicator"><span class="pre"></span></span>:</label>
          <?= $this->Form->input('exp', ['class'=>'add-input w-input', 'data-name'=>'Experience', 'label'=>false, 
          'placeholder'=>'Describe Foster Experience', 'type'=>'textarea']);?>
          <label class="add-field-h3" for="Availability">Availability<span class="required-field-indicator"><span class="pre"></span></span>:</label>
          <?= $this->Form->input('avail', ['class'=>'add-input w-input', 'data-name'=>'Availability', 'label'=>false, 'type'=>'textarea', 
          'placeholder'=>'Enter Possible Availability to Foster']);?>
          <label class="add-field-h3" for="Rating">Rating<span class="required-field-indicator"><span class="pre"></span></span>:</label>
          <?= $this->Form->input('rating', ['class'=>'add-input w-input', 'data-name'=>'Rating', 'label'=>false, 
          'placeholder'=>'Enter Rating', 'options'=>array_combine(range(1,5), range(1,5))]);?>
          <label class="add-field-h3" for="Notes">Notes<span class="required-field-indicator"><span class="pre"></span></span>:</label>
          <?= $this->Form->input('notes', ['class'=>'add-input w-input', 'data-name'=>'Notes', 'label'=>false, 
          'placeholder'=>'Comments/Concerns']);?>
          <div class="add-button-cont">
            <?= $this->Html->link('Cancel', ['controller'=>'fosters','action'=>'view', $foster->id],['class'=>'add-cancel w-button', 'id'=>'FosterCancel']); ?>
            <?= $this->Form->submit("Submit", ['class'=>'add-submit w-button','id'=>'FosterEdit'])?>
          </div>
        </form>
        <div class="w-form-done">
          <div>Thank you! The foster profile has been edited!</div>
        </div>
        <div class="w-form-fail">
          <div>Oops! Something went wrong while editing this foster's profile!</div>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->Form->end();?>

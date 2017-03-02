<?= $this->Html->script('adopters.js'); ?>

<div class="body">
  <div class="add-view column">
    <div class="button-add-signal" data-ix="add-mobile-showhide-2"></div>
    <div class="add-cont scroll1" data-ix="page-load-fade-in">
      <div class="add-header">
        <div class="add-field-h1">Create an adopter</div><img class="add-picture" height="90" src="http://uploads.webflow.com/img/image-placeholder.svg" width="90">
      </div>
  <?= $this->Form->create($adopter);?>
      <div class="add-input-form-wrap w-form">
        <form class="add-input-form" data-name="Email Form 4" id="email-form-4" name="email-form-4">

          <label class="add-field-h2" for="do_not_adopt">Adopt to this person?</label>
          <div class="switch switch-dna w-embed" data-ix="gender-switch">
            <div class="switch switch-dna white">
              <input value="0" type="radio" name="do_not_adopt" id="adopt" checked>
              <input value="1" type="radio" name="do_not_adopt" id="do_not_adopt">
              <span class="toggle"></span>
            </div>
          </div>
          <div class="gender-male adopt-yes">OK to Adopt</div>
          <div class="gender-female adopt-no">DO NOT ADOPT!</div>

          <div class="dna-reason">
            <label class="add-field-h3" for "dna_reason">Reason to not adopt</label>
            <?= $this->Form->input('dna_reason', ['class'=>'add-input multi-line w-input', 'data-name'=>'DNA Reason', 'label'=>false, 'type'=>'textarea']); ?>
          </div>

          <label class="add-field-h2" for="First-Name">Personal Information</label>
          <div class="add-field-seperator"></div>
          <label class="add-field-h3" for="First-Name">First Name<span class="required-field-indicator"><span class="pre"></span></span>:</label>
          <?= $this->Form->input('first_name', ['class'=>'add-input w-input', 'data-name'=>'First Name', 'label'=>false, 
  'placeholder'=>'Enter First Name']);?>
          <label class="add-field-h3" for="Last-Name">Last Name<span class="required-field-indicator"><span class="pre"></span></span>:</label>
          <?= $this->Form->input('last_name', ['class'=>'add-input w-input', 'data-name'=>'Last Name', 'label'=>false, 
  'placeholder'=>'Enter Last Name']);?>
          <label class="add-field-h3" for="E-mail">E-mail<span class="required-field-indicator"><span class="pre"></span></span>:</label>
    <?= $this->Form->input('email', ['class'=>'add-input w-input', 'data-name'=>'E-mail', 'label'=>false, 
  'placeholder'=>'Enter Valid Email']);?>            
    <label class="add-field-h2" for="First-Name">Contact Information</label>
          <div class="add-field-seperator"></div>
          <label class="add-field-h3" for="Address">Address<span class="required-field-indicator"><span class="pre"></span></span>:</label>
    <?= $this->Form->input('address', ['class'=>'add-input w-input', 'data-name'=>'Address', 'label'=>false, 
  'placeholder'=>'Address']);?>
          <label class="add-field-h3" for="Phone">Phone<span class="required-field-indicator"><span class="pre"></span></span>:</label>
          <?= $this->Form->input('phone', ['class'=>'add-input w-input', 'data-name'=>'Phone', 'label'=>false, 
  'placeholder'=>'Enter Phone Number']);?>
          <?= $this->Form->input('notes', array('type' => 'textarea', 'label' =>['text' => 'Notes<span class="required-field-indicator"><span class="pre"></span></span>:', 
      'class' => 'add-field-h3','escape' => false],'class' => 'add-input multi-line w-input','placeholder' => 'Comments/Concerns')); ?>
  <div class="add-button-cont">
    <?= $this->Html->link("Cancel", ['controller'=>'adopters', 'action'=>'view', $adopter->id], ['id'=>'AdopterCancel', 'class'=>'add-cancel w-button']); ?>
    <?= $this->Form->submit("Submit",['id'=>'AdopterAdd', 'class'=>'add-submit w-button']); ?>
  </div>
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
<?= $this->Form->end();?>

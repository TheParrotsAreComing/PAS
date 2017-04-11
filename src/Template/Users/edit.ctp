
<div class="body">
  <div class="add-view column">
    <div class="button-add-signal" data-ix="add-mobile-showhide-2"></div>
    <div class="add-cont scroll1" data-ix="page-load-fade-in">
      <div class="add-header">
        <div class="add-field-h1">Edit User</div><img class="add-picture" height="90" src="http://uploads.webflow.com/img/image-placeholder.svg" width="90">
      </div>
      <?= $this->Form->create($user, ['class'=>'add-input-form', 'data-name'=>'Email Form 4', 'id'=>'email-form-4', 'name'=>'email-form-4']);?>
      <div class="add-input-form-wrap w-form">
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
        <div class="add-button-cont">
          <?= $this->Html->link('Change Password', ['controller'=>'users','action'=>'change_password'],['class'=>'add-submit w-button', 'id'=>'ChangePassword']); ?>
        </div>
    
        <label class="add-field-h2" for="First-Name">Contact Information</label>
        <div class="add-field-seperator"></div>
        <label class="add-field-h3" for="Address">Address<span class="required-field-indicator"><span class="pre"></span></span>:</label>
        <?= $this->Form->input('address', ['class'=>'add-input w-input', 'data-name'=>'Address', 'label'=>false, 
        'placeholder'=>'Enter Address']);?>
        <label class="add-field-h3" for="Phone">Phone<span class="required-field-indicator"><span class="pre"></span></span>:</label>
        <?= $this->Form->input('phone', ['class'=>'add-input w-input', 'data-name'=>'Phone', 'label'=>false, 
        'placeholder'=>'Enter Phone Number']);?>
        <div class="add-button-cont">
          <?= $this->Html->link('Cancel', ['controller'=>'users','action'=>'view', $user->id],['class'=>'add-cancel w-button', 'id'=>'UserCancel']); ?>
          <?= $this->Form->submit("Save User", ['class'=>'add-submit w-button','id'=>'UserEdit'])?>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->Form->end();?>

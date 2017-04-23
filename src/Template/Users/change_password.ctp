<div class="body">
  <div class="add-view column">
    <div class="button-add-signal" data-ix="add-mobile-showhide-2"></div>
    <div class="add-cont scroll1" data-ix="page-load-fade-in">
      <div class="add-header">
        <div class="add-field-h1">Change Password</div>
      </div>
      <?= $this->Form->create('ChangePassword', ['id'=>'ChangePwForm']);?>
      
      <div class="add-input-form-wrap w-form">

        <div class="clearfix"></div>
        <label class="add-field-h3" for="Email">Old Password <span class="required-field-indicator"><span class="pre"></span></span>:</label>
        <?= $this->Form->input('password', ['class'=>'add-input w-input', 'data-name'=>'Old Password', 'label'=>false, 'type'=>'password', 'value'=>'']);?>

        <label class="add-field-h3" for="Role">New Password <span class="required-field-indicator"><span class="pre"></span></span>:</label>
        <?= $this->Form->input('new_password', ['class'=>'add-input w-input', 'data-name'=>'New Password', 'label'=>false, 'type'=>'password', 'value'=>'']);?>

        <label class="add-field-h3" for="Role">Confirm New Password <span class="required-field-indicator"><span class="pre"></span></span>:</label>
        <?= $this->Form->input('confirm_new_password', ['class'=>'add-input w-input', 'data-name'=>'Confirm New Password', 'label'=>false, 'type'=>'password', 'value'=>'']);?>

        <div class="add-button-cont">
          <?= $this->Form->submit("Save Password", ['class'=>'add-submit w-button','id'=>'save'])?>
        </div>
      </div>
      <?= $this->Form->end();?>
    </div>
  </div>
</div>

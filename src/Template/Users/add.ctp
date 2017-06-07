<div class="body">
  <div class="add-view column">
    <div class="button-add-signal" data-ix="add-mobile-showhide-2"></div>
    <div class="add-cont scroll1" data-ix="page-load-fade-in">
      <div class="add-header">
        <div class="add-field-h1">Invite New User</div>
      </div>
      <?= $this->Form->create($user);?>
      
      <div class="add-input-form-wrap w-form">

          <div class="clearfix">
          <label class="add-field-h3" for="Email">Email <span class="required-field-indicator"><span class="pre"></span></span>:</label>
          <?= $this->Form->input('email', ['class'=>'add-input w-input', 'data-name'=>'Email', 'label'=>false, 'placeholder'=>'Enter Valid Email']);?>

          <label class="add-field-h3" for="Role">User Type <span class="required-field-indicator"><span class="pre"></span></span>:</label>
          <?= $this->Form->input('role', ['class'=>'add-input w-input', 'data-name'=>'Role', 'label'=>false, 'options'=>$user_types, 'value'=>'3']);?>

          <div class="add-button-cont">
            <?= $this->Html->link('Cancel', ['controller'=>'users','action'=>'index'],['class'=>'add-cancel w-button', 'id'=>'UserCancel']); ?>
            <?= $this->Form->submit("Create User", ['class'=>'add-submit w-button','id'=>'UserAdd'])?>
          </div>
      </div>
      <?= $this->Form->end();?>
    </div>
  </div>
</div>

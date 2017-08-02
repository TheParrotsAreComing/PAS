<div class="body">
  <div class="login-registration-wrapper w-form">
    <?= $this->Form->create('Login', ['class'=>'login-cont', 'data-name'=>'Email Form', 'id'=>'email-form', 'name'=>'email-form']); ?>
      <div>
        
        <?= $this->Form->control('email', ['class'=>'login-field w-input', 'data-name'=>'Email', 'id'=>'email', 'maxlength'=>256, 'name'=>'email', 'placeholder'=>'Email', 'required'=>true, 'label'=>false]); ?>
        <?= $this->Form->control('password', ['class'=>'login-field w-input', 'data-name'=>'Password', 'id'=>'password', 'maxlength'=>256, 'name'=>'password', 'placeholder'=>'Password', 'required'=>true, 'label'=>false, 'type'=>'password']); ?>
      </div>
      <div class="registration-buttons">
        <?= $this->Form->submit('Login', ['class'=>'login-submit w-inline-block']); ?>
      </div>
    </form>
    <?= $this->Form->end(); ?>
  </div>
</div>

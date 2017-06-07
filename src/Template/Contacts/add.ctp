

<div class="body">
  <div class="add-view column">
    <div class="button-add-signal" data-ix="add-mobile-showhide-2"></div>
    <div class="add-cont scroll1" data-ix="page-load-fade-in">
      <div class="add-header">
        <div class="add-field-h1">Create a Contact</div><img class="add-picture" height="90" src="http://uploads.webflow.com/img/image-placeholder.svg" width="90">
      </div>
      <?= $this->Form->create($contact);?>
      <div class="add-input-form-wrap w-form">
        <form class="add-input-form" data-name="Email Form 4" id="email-form-4" name="email-form-4">
          <label class="add-field-h2" for="First-Name">Contact Information</label>
          <div class="add-field-seperator"></div>
          <label class="add-field-h3" for="Contact-Name">Contact Name<span class="required-field-indicator"><span class="pre"></span></span>:</label>
          <?= $this->Form->input('contact_name', ['class'=>'add-input w-input', 'data-name'=>'First-Name', 'label'=>false, 
          'placeholder'=>'Enter Contact Name']);?>
          <label class="add-field-h3" for="E-mail">E-mail<span class="required-field-indicator"><span class="pre"></span></span>:</label>
          <?= $this->Form->input('email', ['class'=>'add-input w-input', 'data-name'=>'E-mail', 'label'=>false, 
          'placeholder'=>'Enter Valid Email Address']);?>
          <label class="add-field-h2" for="First-Name">Organization Information</label>
          <div class="add-field-seperator"></div>
          <label class="add-field-h3" for="Organzation-Name">Organization<span class="required-field-indicator"><span class="pre"></span></span>:</label>
          <?= $this->Form->input('organization', ['class'=>'add-input w-input', 'data-name'=>'Organzation-Name', 'label'=>false, 
          'placeholder'=>'Enter Organization Name']);?>
          <label class="add-field-h3" for="Address">Address<span class="required-field-indicator"><span class="pre"></span></span>:</label>
          <?= $this->Form->input('address', ['class'=>'add-input w-input', 'data-name'=>'Address', 'label'=>false, 
          'placeholder'=>'Enter Address']);?>

          <label class="add-field-h2" for="First-Name">Add Phone Number(s)</label>
          <div class="add-field-seperator"></div>

          <label class="add-field-h3">Type<span class="required-field-indicator"><span class="pre"></span></span>:</label>
          <?= $this->Form->input('phones[phone_type][]', ['required'=>true, 'class'=>'w-select', 'label'=>false, 'options'=>['Mobile', 'Home','Organization', 'Other']]); ?>
          <?= $this->Form->input('phones[phone_num][]', ['class'=>'add-input w-input', 'id'=>'Phone', 'label'=>false, 'type'=>'tel', 'maxLength'=>10,'minLength'=>10, 'placeholder'=>'Enter Number']);?>
          
          <div class="medical-wrap">
            <a class="profile-add-cont add-phone-btn" id="add-phone" href="#">+ Add Additional Phone Number</a>
          </div>

          <div class="add-button-cont">
            <?= $this->Html->link('Cancel', ['controller'=>'contacts','action'=>'index'],['class'=>'add-cancel w-button', 'id'=>'ContactCancel']); ?>
            <?= $this->Form->submit('Submit', ['class'=>'add-submit w-button','id'=>'ContactAdd'])?>
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
<script>
  $(document).ready(function(){
      $('.add-phone-btn').click(function(e){
        e.preventDefault();

        var data = {
            '0': 'Mobile',
            '1': 'Home',
            '2': 'Organization',
            '3': 'Other'
        }
        var inputType = $('<select />');
        inputType.attr('name', 'phones[phone_type][]');
        inputType.addClass('w-select');
        inputType.attr('id', 'phones-phone-type');
        for(var val in data) {
            $('<option />', {value: val, text: data[val]}).appendTo(inputType);
        }

        $('#add-phone').before(inputType);
        var selectedType = $('#phones-phone-type').val();
        inputType.val(selectedType);

        var inputNum = $('<input/>');
        inputNum.attr('name', 'phones[phone_num][]');
        inputNum.addClass('add-input w-input');
        inputNum.attr('id', 'phones-phone-num');
        inputNum.attr('type', 'tel');
        inputNum.attr('maxLength', 10);
        inputNum.attr('minLength', 10);
        inputNum.attr('placeholder', 'Enter Number');
        $(inputType).after(inputNum);
        var selectedNum = $('#phones-phone-num').val();
        inputNum.val(selectedNum);

      });
  });

</script>



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

          <label class="add-field-h2" for="First-Name">Phone Number(s)</label>
            <div class="medical-wrap">
              <?php foreach ($phone as $number): ?>
                <?php $type = "";
                  if ($number['phone_type'] === 0) {$type = "Mobile: ";} 
                  else if ($number['phone_type'] === 1) {$type = "Home: ";} 
                  else if ($number['phone_type'] === 2) {$type = "Organization: ";}
                  else if ($number['phone_type'] === 3) {$type = "Other: ";} 
                ?>
                <div class="scroll1 no-horizontal-scroll">
                  <div class="medical-data-cont" data-ix="medical-data-click">
                    <div class="phone-number-type-cont">
                      <div class="medical-data-type"><?= $type ?></div>
                    </div>
                    <div class="phone-number-num-cont">
                      <div class="phone-number-num-cont"><?php echo "(".substr($number->phone_num, 0, 3).") ".substr($number->phone_num, 3, 3)."-".substr($number->phone_num,6); ?></div>
                    </div>
                    <div class="medical-data-action-cont">
                      <a class="left medical-data-action w-inline-block" href="<?= $this->Url->build(['controller'=>'PhoneNumbers', 'action'=>'edit', $number->id, $number->entity_id, $number->entity_type]) ?>">
                        <div class="profile-action-button sofware">-</div>
                        <div>edit</div>
                      </a>
                      <a class="medical-data-action w-inline-block delete-number-btn" href="#" data-number="<?= $number->id ?>">
                        <div class="basic profile-action-button"></div>
                        <div>delete</div>
                      </a>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
            <a class="delete add-phone-btn confirm-button w-button" id="add-phone" href="#">Add Phone Number</a>

          <label class="add-field-h2" for="First-Name">Other Information</label>
          <div class="add-field-seperator"></div>
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

<!--Delete Phone Number Confirmation-->
<div id="dialog-confirm-number" title="Delete this phone number?" style="display:none;">
  <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>Are you sure you want to delete this phone number?</p>
</div>

<script>
  $(document).ready(function(){
    var deletePhone = "<?= $this->Url->build(['controller'=>'PhoneNumbers', 'action'=>'delete']) ?>";
      // Add Multiple Phone Numbers
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
      // Delete Phone Number
     $('.delete-number-btn').click(function(){
     var parent = $(this).parent().parent().parent();
     var that = $(this); 
     $( "#dialog-confirm-number" ).dialog({
        resizable: false,
        height: "auto",
        width: 400,
        modal: true,
        buttons: {
        "Delete!": function() {
          $.get(deletePhone+'/'+that.data('number'));
          $(this).dialog( "close" );
          parent.remove();
        },
        Cancel: function() {
          $(this).dialog( "close" );
          $('.no-horizontal-scroll').scrollLeft(0);
        }
        }
      });
    });
  });
</script>




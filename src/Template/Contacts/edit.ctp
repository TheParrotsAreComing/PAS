

<div class="body">
  <div class="add-view column">
    <div class="button-add-signal" data-ix="add-mobile-showhide-2"></div>
    <div class="add-cont scroll1" data-ix="page-load-fade-in">
      <div class="add-header">
        <div class="add-field-h1">Edit a Contact</div><img class="add-picture" height="90" src="http://uploads.webflow.com/img/image-placeholder.svg" width="90">
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
          <label class="add-field-h3" for="Organzation-Name">Organzation Name<span class="required-field-indicator"><span class="pre"></span></span>:</label>
          <?= $this->Form->input('organization', ['class'=>'add-input w-input', 'data-name'=>'Organzation-Name', 'label'=>false, 
          'placeholder'=>'Enter Organization Name']);?>
          <label class="add-field-h3" for="Address">Address<span class="required-field-indicator"><span class="pre"></span></span>:</label>
          <?= $this->Form->input('address', ['class'=>'add-input w-input', 'data-name'=>'Address', 'label'=>false, 
          'placeholder'=>'Enter Address']);?>
          <label class="add-field-h2" for="First-Name">Phone Numbers</label>
            <div class="medical-wrap">
              <?php foreach ($contact->phone_numbers as $number): ?>
                  <?php if($number->entity_type === 2): ?>
                      <?php $type = "";
                          if ($number->phone_type === 0) {$type = "Mobile: "; } 
                          else if ($number->phone_type === 1) {$type = "Home: ";}
                          else if ($number->phone_type === 2) {$type = "Organization: ";} 
                          else if ($number->phone_type === 3) {$type = "Other: ";} 
                      ?>
                     <div class="scroll1 no-horizontal-scroll">
                        <div class="medical-data-cont" data-ix="medical-data-click">
                          <div class="medical-type-cont">
                            <div class="medical-data-type"><?= $type ?></div>
                          </div>
                          <div class="medical-date-cont">
                            <div class="medical-date-cont"><?= h($number->phone_num) ?></div>
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
                  <?php endif; ?>
                <?php endforeach; ?>
            </div>
            <a class="profile-add-cont w-inline-block" href="<?= $this->Url->build(['controller'=>'PhoneNumbers', 'action'=>'add', $contact->id, 2])?>">+ Add New Phone Number
            </a>
          <div class="add-button-cont">
            <?= $this->Html->link('Cancel', ['controller'=>'contacts','action'=>'index'],['class'=>'add-cancel w-button', 'id'=>'ContactCancel']); ?>
            <?= $this->Html->link('Delete', ['controller'=>'contacts','action'=>'delete', $contact->id],['class'=>'add-cancel w-button', 'id'=>'ContactDelete']); ?>
            <?= $this->Form->submit("Submit", ['class'=>'add-submit w-button','id'=>'ContactAdd'])?>
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


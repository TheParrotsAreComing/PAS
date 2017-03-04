<div class="body">
    <div class="add-view column">
      <div class="button-add-signal" data-ix="add-mobile-showhide-2"></div>
      <div class="add-cont scroll1" data-ix="page-load-fade-in">
        <div class="add-header">
          <div class="add-field-h1">Create a litter</div><img class="add-picture" height="90" src="https://d3e54v103j8qbb.cloudfront.net/img/image-placeholder.svg" width="90">
        </div>
        <?= $this->Form->create($litter) ?>
        <div class="add-input-form-wrap w-form">
          <form class="add-input-form" data-name="Email Form 4" id="email-form-4" name="email-form-4">
            <label class="add-field-h2" for="First-Name">litter information</label>
            <div class="add-field-seperator"></div>
            <label class="add-field-h3" for="litter-name">name<span class="required-field-indicator"><span class="pre"></span></span>:</label>
            <?= $this->Form->input('litter_name', ['class'=>'add-input w-input', 'data-name'=>'Litter-Name', 'label'=>false, 'placeholder'=>'Name to reference the litter']);?>
            <label class="add-field-h3" for="Kc-Ref-Id">kitten central id<span class="required-field-indicator"><span class="pre"></span></span>:</label>
            <?= $this->Form->input('kc_ref_id', ['class'=>'add-input w-input', 'data-name'=>'Kc-Ref-Id', 'label'=>false, 'placeholder'=>'456123', 'type' => 'text']);?>
            <label class="add-field-h3" for="DOB">Date of birth<span class="required-field-indicator"><span class="pre"></span></span>:</label>
            <div class="date-cont">
                <?php echo $this->Form->month('dob', array('class' => 'date-month w-select', 'empty' => 'Month', 'required'=>true)); ?>
                <?php echo $this->Form->day('dob', array('class' => 'date-day w-select', 'empty' => 'Day', 'required'=>true)); ?>
                <?php echo $this->Form->year('dob', array('class' => 'date-year w-select', 'empty' => 'Year', 'required'=>true)); ?>
            </div>
            <label class="add-field-h3" for="Breed">Breed<span class="required-field-indicator"><span class="pre"></span></span>:</label>
            <?= $this->Form->input('breed', ['class'=>'add-input w-input', 'data-name'=>'Breed', 'label'=>false, 'placeholder'=>'Siamese']);?>
            <label class="add-field-h3" for="Est-Arrival">estimated arrival<span class="required-field-indicator"><span class="pre"></span></span>:</label>
            <?= $this->Form->input('est_arrival', ['class'=>'add-input w-input', 'data-name'=>'Est-Arrival', 'label'=>false, 'placeholder'=>'Early March']);?>
            <label class="add-field-h3" for="Foster-Notes">foster notes<span class="required-field-indicator"><span class="pre"></span></span>:</label>
            <?= $this->Form->input('foster_notes', ['class'=>'add-input w-input', 'data-name'=>'Foster-Notes', 'label'=>false, 'placeholder'=>'e.g. This litter still needs a foster home...']);?>
            <label class="add-field-h3" for="Notes">notes<span class="required-field-indicator"><span class="pre"></span></span>:</label>
            <?= $this->Form->input('notes', ['class'=>'add-input w-input', 'data-name'=>'Notes', 'label'=>false, 'placeholder'=>'e.g. This litter has special needs, such as...']);?>
            <div class="add-button-cont">
              <?= $this->Html->link("Cancel", ['controller'=>'litters', 'action'=>'index'], ['id'=>'Litter-Cancel', 'class'=>'add-cancel w-button']); ?>
              <?= $this->Form->submit("Submit and Add Cats",['id'=>'Litter-Add', 'class'=>'add-submit w-button']); ?>
            </div>
          </form>
        </div>
        <?= $this->Form->end() ?>
      </div>
    </div>
  </div>

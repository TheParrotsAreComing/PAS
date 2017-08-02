<div class="body">
    <div class="add-view column">
        <div class="button-add-signal" data-ix="add-mobile-showhide-2"></div>
        <div class="add-cont scroll1" data-ix="page-load-fade-in">
            <div class="add-header">
                <div class="add-field-h1">Edit a litter</div><img class="add-picture" height="90" src="http://uploads.webflow.com/img/image-placeholder.svg" width="90">
            </div>
            <?= $this->Form->create($litter) ?>
                <div class="add-input-form-wrap w-form">
                    <form class="add-input-form">
                        <label class="add-field-h2" for="First-Name">litter information</label>
                        <div class="add-field-seperator"></div>
                        <?php echo $this->Form->input('litter_name', 
                            array('label' => 
                                ['text' => 'Litter Name<span class="required-field-indicator"><span class="pre"></span></span>:', 
                                'class' => 'add-field-h3',
                                'escape' => false], 
                            'class' => 'add-input w-input', 
                            'placeholder' => 'The Sabbath')); ?>
                        <?php echo $this->Form->input('kc_ref_id',
                            array('type' => 'text', 'label' =>
                                ['text' => 'KC Reference ID<span class="required-field-indicator"><span class="pre"></span></span>:',
                                'class' => 'add-field-h3',
                                'escape' => false],
                            'class' => 'add-input w-input',
                            'placeholder' => 'KC-000')); ?>
                        <label class="add-field-h3">Date of birth<span class="required-field-indicator"><span class="pre"></span></span>:</label>
                        <div class="date-cont">
                            <?php echo $this->Form->month('dob', array('class' => 'date-month w-select', 'empty' => 'Month')); ?>
                            <?php echo $this->Form->day('dob', array('class' => 'date-day w-select', 'empty' => 'Day')); ?>
                            <?php echo $this->Form->year('dob', array('class' => 'date-year w-select', 'empty' => 'Year')); ?>
                        </div>
                        <?php echo $this->Form->input('breed', 
                            array('label' => 
                                ['text' => 'Breed<span class="required-field-indicator"><span class="pre"></span></span>:', 
                                'class' => 'add-field-h3',
                                'escape' => false], 
                            'class' => 'add-input w-input', 
                            'placeholder' => 'Siamese')); ?>
                        <?php echo $this->Form->input('foster_notes', 
                            array('type' => 'textarea', 'label' => 
                                ['text' => 'Foster Notes<span class="required-field-indicator"><span class="pre"></span></span>:', 
                                'class' => 'add-field-h3',
                                'escape' => false], 
                            'class' => 'add-input multi-line w-input', 
                            'placeholder' => 'Type the foster notes for this litter...')); ?> 
                        <?php echo $this->Form->input('notes', 
                            array('type' => 'textarea', 'label' => 
                                ['text' => 'Notes<span class="required-field-indicator"><span class="pre"></span></span>:', 
                                'class' => 'add-field-h3',
                                'escape' => false], 
                            'class' => 'add-input multi-line w-input', 
                            'placeholder' => 'Type any extra notes about this litter...')); ?>
                        <div class="add-button-cont">
                       <?= $this->Html->link("Cancel", ['controller'=>'litters', 'action'=>'view', $litter->id], ['id'=>'LitterCancel', 'class'=>'add-cancel w-button']); ?>
                       <?= $this->Form->submit("Submit",['id'=>'LitterAdd', 'class'=>'add-submit w-button']); ?>
                        </div>
                    </form>
                </div>
        </div>
    </div>
</div>
<?= $this->Form->end() ?>

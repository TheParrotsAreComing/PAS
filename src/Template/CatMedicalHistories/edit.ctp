<div class="body">
    <div class="add-view column">
        <div class="button-add-signal" data-ix="add-mobile-showhide-2"></div>
        <div class="add-cont scroll1" data-ix="page-load-fade-in">
            <div class="add-header">
                <div class="add-field-h1">Medical History Record</div>
            </div>
            <?= $this->Form->create($catMedicalHistory) ?>
                <div class="add-input-form-wrap w-form">
                    <form class="add-input-form">
                        <label class="add-field-h2" for="First-Name">Edit Record</label>
                        <div class="add-field-seperator"></div>
                        <label class="add-field-h3">Type<span class="required-field-indicator"><span class="pre"></span></span>:</label>
                        <?= $this->Form->input('medOption', ['required'=>true, 'class'=>'w-select', 'label'=>false, 'empty'=>'Select Medical Option', 'value'=>$medOption, 'options'=>['FVRCP', 'Deworm', 'Flea', 'Rabies', 'Other']]); ?>
                        <label class="add-field-h3">Date<span class="required-field-indicator"><span class="pre"></span></span>:</label>
                        <div class="date-cont">
                            <?php echo $this->Form->month('administered_date', array('class' => 'date-month w-select', 'empty' => 'Month', 'required'=>true)); ?>
                            <?php echo $this->Form->day('administered_date', array('class' => 'date-day w-select', 'empty' => 'Day', 'required'=>true)); ?>
                            <?php echo $this->Form->year('administered_date', array('class' => 'date-year w-select', 'empty' => 'Year', 'required'=>true)); ?>
                        </div>
                        <?php echo $this->Form->input('notes', 
                            array('type' => 'textarea', 'label' => 
                                ['text' => 'Notes<span class="required-field-indicator"><span class="pre"></span></span>:', 
                                'class' => 'add-field-h3',
                                'escape' => false], 
                            'class' => 'add-input multi-line w-input', 
                            'placeholder' => 'Type notes for this record...')); ?>
                        <div class="add-button-cont">    
                        <?= $this->Html->link("Cancel", ['controller'=>'cats', 'action'=>'view', $cat_id], ['id'=>'MHCancel', 'class'=>'add-cancel w-button']); ?>
                        <?= $this->Form->submit("Submit",['id'=>'MHEdit', 'class'=>'add-submit w-button']); ?>
                        </div>
                    </form>
                </div>
        </div>
    </div>
</div>
<?= $this->Form->end() ?>
<script>
    $()
</script>

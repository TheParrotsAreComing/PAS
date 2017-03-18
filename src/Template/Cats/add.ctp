<div class="body">
    <div class="add-view column">
        <div class="button-add-signal" data-ix="add-mobile-showhide-2"></div>
        <div class="add-cont scroll1" data-ix="page-load-fade-in">
            <div class="add-header">
                <div class="add-field-h1">Create a cat</div><img class="add-picture" height="90" src="http://uploads.webflow.com/img/image-placeholder.svg" width="90">
            </div>
            <?= $this->Form->create($cat) ?>
                <div class="add-input-form-wrap w-form">
                    <form class="add-input-form">
                        <label class="add-field-h2" for="First-Name">personal information</label>
                        <div class="add-field-seperator"></div>
                        <?php echo $this->Form->input('cat_name', 
                            array('label' => 
                                ['text' => 'Cat Name<span class="required-field-indicator"><span class="pre"></span></span>:', 
                                'class' => 'add-field-h3',
                                'escape' => false], 
                            'class' => 'add-input w-input', 
                            'placeholder' => 'Bella')); ?>
                        <label class="add-field-h3">Date of birth<span class="required-field-indicator"><span class="pre"></span></span>:</label>
                        <div class="date-cont">
                            <?php echo $this->Form->month('dob', array('class' => 'date-month w-select', 'empty' => 'Month', 'required'=>true)); ?>
                            <?php echo $this->Form->day('dob', array('class' => 'date-day w-select', 'empty' => 'Day', 'required'=>true)); ?>
                            <?php echo $this->Form->year('dob', array('class' => 'date-year w-select', 'empty' => 'Year', 'required'=>true)); ?>
                        </div>
                        <?php echo $this->Form->input('breed', 
                            array('label' => 
                                ['text' => 'Breed<span class="required-field-indicator"><span class="pre"></span></span>:', 
                                'class' => 'add-field-h3',
                                'escape' => false], 
                            'class' => 'add-input w-input', 
                            'placeholder' => 'Siamese')); ?>
                         <?php echo $this->Form->input('color', 
                            array('label' => 
                                ['text' => 'Color<span class="required-field-indicator"><span class="pre"></span></span>:', 
                                'class' => 'add-field-h3',
                                'escape' => false], 
                            'class' => 'add-input w-input', 
                            'placeholder' => 'Brown')); ?>   
                         <?php echo $this->Form->input('coat', 
                            array('label' => 
                                ['text' => 'Coat<span class="required-field-indicator"><span class="pre"></span></span>:', 
                                'class' => 'add-field-h3',
                                'escape' => false], 
                            'class' => 'add-input w-input', 
                            'placeholder' => 'Shorthair')); ?>    
                        <label class="add-field-h3" for="E-mail">gender<span class="required-field-indicator"><span class="pre"></span></span>:</label>
                        <div class="gender-cont">
                            <div class="gender-switch w-embed" data-ix="gender-switch">
                                <style>
                                    /* ---------- SWITCH ---------- */
                                    
                                    .switch {
                                        background: #eee;
                                        border-radius: 32px;
                                        display: block;
                                        height: 32px;
                                        position: relative;
                                        width: 80px;
                                    }
                                    .switch input {
                                        height: 32px;
                                        left: 0;
                                        opacity: 0;
                                        position: absolute;
                                        top: 0;
                                        width: 80px;
                                        z-index: 2;
                                    }
                                    .switch input:checked~.toggle {
                                        left: 4px;
                                    }
                                    .switch input~:checked~.toggle {
                                        left: 50px;
                                    }
                                    .switch input:checked {
                                        z-index: 0;
                                    }
                                    .toggle {
                                        background: #0172ff;
                                        border-radius: 50%;
                                        height: 28px;
                                        left: 0;
                                        position: absolute;
                                        top: 2px;
                                        -webkit-transition: left .2s ease;
                                        -moz-transition: left .2s ease;
                                        -ms-transition: left .2s ease;
                                        -o-transition: left .2s ease;
                                        transition: left .2s ease;
                                        width: 28px;
                                        z-index: 1;
                                    }
                                </style>
                                <div class="switch white">
                                    <input value="1" type="radio" name="is_female" id="switch-female" checked>
                                    <input value="0" type="radio" name="is_female" id="switch-male">
                                    <span class="toggle"></span>
                                </div>
                            </div>
                            <div class="gender-female">male</div>
                            <div class="gender-male">female</div>
                        </div>
                        <label class="add-field-h3" for="E-mail">kitten/adult<span class="required-field-indicator"><span class="pre"></span></span>:</label>
                        <div class="gender-cont">
                            <div class="gender-switch w-embed" data-ix="gender-switch">
                                <style>
                                    /* ---------- SWITCH ---------- */
                                    
                                    .switch-kitten {
                                        background: #eee;
                                        border-radius: 32px;
                                        display: block;
                                        height: 32px;
                                        position: relative;
                                        width: 80px;
                                    }
                                    .switch-kitten input {
                                        height: 32px;
                                        left: 0;
                                        opacity: 0;
                                        position: absolute;
                                        top: 0;
                                        width: 80px;
                                        z-index: 2;
                                    }
                                    .switch-kitten input:checked~.toggle {
                                        left: 4px;
                                    }
                                    .switch-kitten input~:checked~.toggle {
                                        left: 50px;
                                    }
                                    .switch-kitten input:checked {
                                        z-index: 0;
                                    }
                                </style>
                                <div class="switch-kitten white">
                                    <input value="1" type="radio" name="is_kitten" id="kitten" checked>
                                    <input value="0" type="radio" name="is_kitten" id="adult">
                                    <span class="toggle"></span>
                                </div>
                            </div>
                            <div class="gender-female">adult</div>
                            <div class="gender-male">kitten</div>
                        </div>
                        <label class="add-field-h2">care information</label>
                        <div class="add-field-seperator"></div>
                        <div class="w-clearfix">
                            <?php echo $this->Form->input('adoption_fee_amount', 
                                array('label' => 
                                    ['text' => 'Adoption Fee:', 
                                    'class' => 'add-field-h3',
                                    'escape' => false], 
                                'class' => 'add-input currency w-input', 
                                'placeholder' => '65.99')); ?>
                            <div class="symbol-dollar">$</div>
                        </div>
                        <?php echo $this->Form->input('microchip_number', 
                            array('type' => 'text', 'label' => 
                                ['text' => 'Microchip #:', 
                                'class' => 'add-field-h3',
                                'escape' => false], 
                            'class' => 'add-input w-input', 
                            'placeholder' => '0123456789')); ?>
                        <label class="add-field-h3" for="E-mail">is microchip registered?</label>
                        <div class="gender-cont">
                            <div class="gender-switch w-embed" data-ix="gender-switch">
                                <style>
                                    /* ---------- SWITCH ---------- */
                                    
                                    .switch-chip {
                                        background: #eee;
                                        border-radius: 32px;
                                        display: block;
                                        height: 32px;
                                        position: relative;
                                        width: 80px;
                                    }
                                    .switch-chip input {
                                        height: 32px;
                                        left: 0;
                                        opacity: 0;
                                        position: absolute;
                                        top: 0;
                                        width: 80px;
                                        z-index: 2;
                                    }
                                    .switch-chip input:checked~.toggle {
                                        left: 4px;
                                    }
                                    .switch-chip input~:checked~.toggle {
                                        left: 50px;
                                    }
                                    .switch-chip input:checked {
                                        z-index: 0;
                                    }
                                </style>
                                <div class="switch-chip white">
                                    <input value="0" type="radio" name="is_microchip_registered" id="microchip_not_registered" checked>
                                    <input value="1" type="radio" name="is_microchip_registered" id="microchip_registered">
                                    <span class="toggle"></span>
                                </div>
                            </div>
                            <div class="gender-female">registered</div>
                            <div class="gender-male">not registered</div>
                        </div>
                        <?php echo $this->Form->input('specialty_notes', 
                            array('type' => 'textarea', 'label' => 
                                ['text' => 'Specialty Notes<span class="required-field-indicator"><span class="pre"></span></span>:', 
                                'class' => 'add-field-h3',
                                'escape' => false], 
                            'class' => 'add-input multi-line w-input', 
                            'placeholder' => 'Type specialty notes for this cat...')); ?>
                        <?php echo $this->Form->input('bio', 
                            array('type' => 'textarea', 'label' => 
                                ['text' => 'Biography<span class="required-field-indicator"><span class="pre"></span></span>:', 
                                'class' => 'add-field-h3',
                                'escape' => false], 
                            'class' => 'add-input multi-line w-input', 
                            'placeholder' => 'Type the biography for this cat...')); ?> 
                        <div class="add-button-cont">
                       
                       <?= $this->Form->input('addMoreCats', ['type' => 'hidden', 'value' => 0 ]) ?>
                       
                       <?php if (empty($litter_id)): 
                       // show proper buttons, incase we're adding cats to a new litter ?>
                           <?= $this->Html->link("Cancel", ['controller'=>'cats', 'action'=>'index'], ['id'=>'CatCancel', 'class'=>'add-cancel w-button']); ?>
                           <?= $this->Form->submit("Submit",['id'=>'CatAdd', 'class'=>'add-submit w-button']); ?>
                        <?php else: ?>
                           <?= $this->Form->submit("Submit and done", ['id'=>'LitterCatAddDone', 'class'=>'add-submit w-button']); ?>
                           <?= $this->Html->link("Cancel this cat", ['controller'=>'litters', 'action'=>'index'], ['id'=>'LitterCatAddCancel', 'class'=>'add-cancel w-button']); ?>
                           <?= $this->Form->button("Submit and add another",['id'=>'LitterCatAddAndMore', 'class'=>'add-submit w-button', 'type' => 'button']); ?>
                        <?php endif; ?>
                        </div>
                    </form>
                </div>
        </div>
    </div>
</div>

<?= $this->Form->end() ?>


<script>
    $(function(){
      $('#LitterCatAddAndMore').click(
        function(e){
            $('#addmorecats').val(1);
            $('form').submit();
            return true;
        })
    })
</script>
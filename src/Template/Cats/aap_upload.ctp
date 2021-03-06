<div class="body">
    <div class="add-view column">
        <div class="button-add-signal" data-ix="add-mobile-showhide-2"></div>
        <div class="add-cont scroll1" data-ix="page-load-fade-in">
            <div class="add-header">
                <div class="add-field-h1">Upload to Adopt-A-Pet</div><img class="add-picture" height="90" src="http://uploads.webflow.com/img/image-placeholder.svg" width="90">
            </div>
            <?= $this->Form->create($cat, ['type'=>'post']) ?>
                <div class="add-input-form-wrap w-form">
                    <form class="add-input-form">
                        <label class="add-field-h2">Enter the following new information for Adopt-A-Pet</label>
                        <div class="add-field-seperator"></div>
                        <?= $this->Form->input('status', 
                            array('label' => 
                                ['text' => 'Adoption Status<span class="required-field-indicator"><span class="pre"></span></span>:', 
                                'class' => 'add-field-h3',
                                'escape' => false], 
                            'class' => 'add-input w-input', 
                            'options' => ['Available'=>'Available', 'Adopted'=>'Adopted', 'Deleted'=>'Deleted', 'Hidden'=>'Hidden'],
                            'value' => 'Available'));?>
                        <?= $this->Form->input('aap_color', 
                            array('label' => 
                                ['text' => 'Color<span class="required-field-indicator"><span class="pre"></span></span>:', 
                                'class' => 'add-field-h3',
                                'escape' => false], 
                            'class' => 'add-input w-input', 
                            'options' => $colors,
                            'empty' => 'Select an accepted color')); ?>  
                        <?= $this->Form->input('  Spayed and Neutered', ['type'=>'checkbox', 'name'=>'SpayedNeutered', 'checked'=>true]);?>
                        <?= $this->Form->input('  Shots Current', ['type'=>'checkbox', 'name'=>'ShotsCurrent', 'checked'=>true]);?>
                        <?= $this->Form->input('  Housetrained', ['type'=>'checkbox', 'name'=>'Housetrained', 'checked'=>true]);?>
                        <?= $this->Form->input('  Declawed', ['type'=>'checkbox', 'name'=>'Declawed']);?>

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
                            <?php echo $this->Form->month('dob', array('class' => 'date-month w-select', 'empty' => 'Month')); ?>
                            <?php echo $this->Form->day('dob', array('class' => 'date-day w-select', 'empty' => 'Day')); ?>
                            <?php echo $this->Form->year('dob', array('class' => 'date-year w-select', 'empty' => 'Year')); ?>
                        </div>
                        <?php echo $this->Form->input('breed_id', 
                            array('label' => 
                                ['text' => 'Breed<span class="required-field-indicator"><span class="pre"></span></span>:', 
                                'class' => 'add-field-h3',
                                'escape' => false], 
                            'class' => 'add-input w-input', 
                            'options' => $breeds,
                            'empty' => 'Select breed that MOST fits',
                            'placeholder' => 'Siamese')); ?>
                        <?php echo $this->Form->input('coat', 
                            array('label' => 
                                ['text' => 'Coat<span class="required-field-indicator"><span class="pre"></span></span>:', 
                                'class' => 'add-field-h3',
                                'escape' => false], 
                            'class' => 'add-input w-input', 
                            'placeholder' => 'Shorthair')); ?> 
                        <label class="add-field-h3" for="E-mail">gender<span class="required-field-indicator"><span class="pre"></span></span>:</label>
                        <div class="gender-cont">
                            <div class="gender-switch w-embed">
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
                                <div class="switch gender-toggle white">
                                    <input value="1" type="radio" name="is_female" id="switch-female">
                                    <input value="0" type="radio" name="is_female" id="switch-male">
                                    <span class="toggle"></span>
                                </div>
                            </div>
                            <div class="gender-female" id="male-label">male</div>
                            <div class="gender-male" id="female-label">female</div>
                        </div>
                        <label class="add-field-h3" for="E-mail">kitten/adult<span class="required-field-indicator"><span class="pre"></span></span>:</label>
                        <div class="gender-cont">
                            <div class="gender-switch w-embed" >
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
                                <div class="switch-kitten cat-toggle white">
                                    <input value="1" type="radio" name="is_kitten" id="kitten">
                                    <input value="0" type="radio" name="is_kitten" id="adult">
                                    <span class="toggle"></span>
                                </div>
                            </div>
                            <div class="gender-female" id="adult-label">adult</div>
                            <div class="gender-male" id="kitten-label">kitten</div>
                        </div>
                        <label class="add-field-h2">care information</label>
                        <div class="add-field-seperator"></div>
                        <div class="w-clearfix">
                            <?php echo $this->Form->input('adoption_fee_amount', 
                                array('label' => 
                                    ['text' => 'Adoption Fee<span class="required-field-indicator"><span class="pre"></span></span>:', 
                                    'class' => 'add-field-h3',
                                    'escape' => false], 
                                'class' => 'add-input currency w-input', 
                                'placeholder' => '65.99')); ?>
                            <div class="symbol-dollar">$</div>
                        </div>
                        <?php echo $this->Form->input('microchip_number', 
                            array('type' => 'text', 'label' => 
                                ['text' => 'Microchip #<span class="required-field-indicator"><span class="pre"></span></span>:', 
                                'class' => 'add-field-h3',
                                'escape' => false], 
                            'class' => 'add-input w-input', 
                            'placeholder' => '0123456789')); ?>
                        <?php /*
                        <label class="add-field-h3">Microchip Date<span class="required-field-indicator"><span class="pre"></span></span>:</label>
                        <div class="date-cont">
                            <?php echo $this->Form->month('microchiped_date', array('class' => 'date-month w-select', 'empty' => 'Month')); ?>
                            <?php echo $this->Form->day('microchiped_date', array('class' => 'date-day w-select', 'empty' => 'Day')); ?>
                            <?php echo $this->Form->year('microchiped_date', array('class' => 'date-year w-select', 'empty' => 'Year')); ?>
                        </div> */ ?>
                       <label class="add-field-h3" for="E-mail">is microchip registered?<span class="required-field-indicator"><span class="pre"></span></span></label>
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
                                <div class="switch-chip microchip-toggle white">
                                    <input value="0" type="radio" name="is_microchip_registered" id="microchip_not_registered">
                                    <input value="1" type="radio" name="is_microchip_registered" id="microchip_registered">
                                    <span class="toggle"></span>
                                </div>
                            </div>
                            <div class="gender-female" id="registered-label">registered</div>
                            <div class="gender-male" id="not-registered-label">not registered</div>
                        </div> 

                        <?= $this->Form->input('  Good with Kids', ['type'=>'checkbox', 'name'=>'good_with_kids', 'checked'=>$gwkids]); ?>
                        <?= $this->Form->input('  Good with Dogs', ['type'=>'checkbox', 'name'=>'good_with_dogs', 'checked'=>$gwdogs]); ?>
                        <?= $this->Form->input('  Good with Cats', ['type'=>'checkbox', 'name'=>'good_with_cats', 'checked'=>$gwcats]); ?>
                        <?= $this->Form->input('  Special Needs', ['type'=>'checkbox', 'name'=>'special_needs', 'checked'=>$special]); ?>
                        <?= $this->Form->input('  Needs Experienced Adopter', ['type'=>'checkbox', 'name'=>'needs_experienced_adopter', 'checked'=>$exp]); ?>

                        <?php echo $this->Form->input('bio', 
                            array('type' => 'textarea', 'label' => 
                                ['text' => 'Biography<span class="required-field-indicator"><span class="pre"></span></span>:', 
                                'class' => 'add-field-h3',
                                'escape' => false], 
                            'class' => 'add-input multi-line w-input', 
                            'placeholder' => 'Type the biography for this cat...')); ?> 
                        <?php echo $this->Form->input('diet', 
                            array('type' => 'textarea', 'label' => 
                                ['text' => 'Current Diet Notes<span class="required-field-indicator"><span class="pre"></span></span>:', 
                                'class' => 'add-field-h3',
                                'escape' => false], 
                            'class' => 'add-input multi-line w-input', 
                            'placeholder' => 'Type the current diet for this cat...')); ?>
                        <?php echo $this->Form->input('specialty_notes', 
                            array('type' => 'textarea', 'label' => 
                                ['text' => 'Specialty Notes<span class="required-field-indicator"><span class="pre"></span></span>:', 
                                'class' => 'add-field-h3',
                                'escape' => false], 
                            'class' => 'add-input multi-line w-input', 
                            'placeholder' => 'Type specialty notes for this cat...')); ?>
                        <div class="add-button-cont">
                       <?= $this->Html->link("Cancel", ['controller'=>'cats', 'action'=>'view', $cat->id], ['id'=>'CatCancel', 'class'=>'add-cancel w-button']); ?>
                       <?= $this->Form->submit("Submit",['id'=>'CatAdd', 'class'=>'add-submit w-button']); ?>
                        </div>
                    </form>
                </div>
        </div>
    </div>
</div>
<?= $this->Form->end() ?>
<script>
$(document).ready(function() {
    var gender = "<?= $cat['is_female']; ?>";
    var cat = "<?= $cat['is_kitten']; ?>";
    var register = "<?= $cat['is_microchip_registered']; ?>";
    if (gender == 1) {
        $('#switch-female').prop("checked", true);
        $('#female-label').show();
        $('#male-label').hide();
    } else {
        $('#switch-male').prop("checked", true);
        $('#female-label').hide();
        $('#male-label').show();    }
    if (cat == 1) {
        $('#kitten').prop("checked", true);
        $('#adult-label').hide();
        $('#kitten-label').show();
    } else {
        $('#adult').prop("checked", true);
        $('#adult-label').show();
        $('#kitten-label').hide();
    }
    if (register == 1) {
        $('#microchip_registered').prop("checked", true);
        $('#registered-label').show();
        $('#not-registered-label').hide();
    } else {
        $('#microchip_not_registered').prop("checked", true);
        $('#registered-label').hide();
        $('#not-registered-label').show();
    }

    $('.gender-toggle').on('click', function(e) {
        if ($('#male-label').is(':visible')) {
            $('#male-label').hide();
            $('#female-label').show();
        } else {
            $('#male-label').show();
            $('#female-label').hide();
        }
        e.stopPropagation();
    });

    $('.cat-toggle').on('click', function(e) {
        if ($('#adult-label').is(':visible')) {
            $('#adult-label').hide();
            $('#kitten-label').show();
        } else {
            $('#adult-label').show();
            $('#kitten-label').hide();
        }
        e.stopPropagation();
    });

    $('.microchip-toggle').on('click', function(e) {
        if ($('#registered-label').is(':visible')) {
            $('#registered-label').hide();
            $('#not-registered-label').show();
        } else {
            $('#registered-label').show();
            $('#not-registered-label').hide();
        }
        e.stopPropagation();
    });
});
</script>

<div class="body">
    <div class="add-view column">
        <div class="button-add-signal" data-ix="add-mobile-showhide-2"></div>
        <div class="add-cont scroll1" data-ix="page-load-fade-in">
            <div class="add-header">
                <div class="add-field-h1">Add New Phone Number</div>
            </div>
            <?= $this->Form->create($phoneNumber) ?>
                <div class="add-input-form-wrap w-form">
                    <form class="add-input-form">
                        <label class="add-field-h2" for="First-Name">Add Number</label>
                        <div class="add-field-seperator"></div>
                        <?= $this->Form->hidden('entity_id', ['value' => $entity_id]);?>
                        <?= $this->Form->hidden('entity_type', ['value' => $entity_type]);?>
                        <label class="add-field-h3">Type<span class="required-field-indicator"><span class="pre"></span></span>:</label>
                        <?= $this->Form->input('phone_type', ['required'=>true, 'class'=>'w-select', 'label'=>false, 'options'=>['','Mobile', 'Home', 'Other']]); ?>
                        <label class="add-field-h3">Phone Number<span class="required-field-indicator"><span class="pre"></span></span>:</label>
                        <?= $this->Form->input('phone_num', ['class'=>'add-input w-input', 'data-name'=>'Phone', 'label'=>false, 
          'placeholder'=>'Enter Number']);?>
                        <div class="add-button-cont">
                        <?php if($entity_type === 1): ?>   
                            <?= $this->Html->link("Cancel", ['controller'=>'fosters', 'action'=>'view', $entity_id], ['id'=>'NFPCancel', 'class'=>'add-cancel w-button']);?>
                        <?php elseif ($entity_type === 2): ?> 
                            <?= $this->Html->link("Cancel", ['controller'=>'adopters', 'action'=>'view', $entity_id], ['id'=>'NAPCancel', 'class'=>'add-cancel w-button']);?>
                        <?php endif;?>
                        <?= $this->Form->submit("Submit",['id'=>'APAdd', 'class'=>'add-submit w-button']); ?>
                        </div>
                    </form>
                </div>
        </div>
    </div>
</div>
<?= $this->Form->end() ?>

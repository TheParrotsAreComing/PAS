<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Cat Medical Histories'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Cats'), ['controller' => 'Cats', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cat'), ['controller' => 'Cats', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="catMedicalHistories form large-9 medium-8 columns content">
    <?= $this->Form->create($catMedicalHistory) ?>
    <fieldset>
        <legend><?= __('Add Cat Medical History') ?></legend>
        <?php
            echo $this->Form->input('cat_id', ['options' => $cats]);
            echo $this->Form->input('is_fvrcp');
            echo $this->Form->input('is_deworm');
            echo $this->Form->input('is_flea');
            echo $this->Form->input('is_rabies');
            echo $this->Form->input('administered_date');
            echo $this->Form->input('notes');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

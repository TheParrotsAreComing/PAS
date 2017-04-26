<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Adoption Events'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users Events'), ['controller' => 'UsersEvents', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Users Event'), ['controller' => 'UsersEvents', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cats'), ['controller' => 'Cats', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cat'), ['controller' => 'Cats', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="adoptionEvents form large-9 medium-8 columns content">
    <?= $this->Form->create($adoptionEvent) ?>
    <fieldset>
        <legend><?= __('Add Adoption Event') ?></legend>
        <?php
            echo $this->Form->input('event_date');
            echo $this->Form->input('description');
            echo $this->Form->input('is_deleted');
            echo $this->Form->input('cats._ids', ['options' => $cats]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

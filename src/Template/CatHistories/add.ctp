<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Cat Histories'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Cats'), ['controller' => 'Cats', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cat'), ['controller' => 'Cats', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Adopters'), ['controller' => 'Adopters', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Adopter'), ['controller' => 'Adopters', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Fosters'), ['controller' => 'Fosters', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Foster'), ['controller' => 'Fosters', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="catHistories form large-9 medium-8 columns content">
    <?= $this->Form->create($catHistory) ?>
    <fieldset>
        <legend><?= __('Add Cat History') ?></legend>
        <?php
            echo $this->Form->input('cat_id', ['options' => $cats]);
            echo $this->Form->input('adopter_id', ['options' => $adopters, 'empty' => true]);
            echo $this->Form->input('foster_id', ['options' => $fosters, 'empty' => true]);
            echo $this->Form->input('start_date');
            echo $this->Form->input('end_date', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

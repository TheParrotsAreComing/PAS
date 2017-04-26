<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $catsAdoptionEvent->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $catsAdoptionEvent->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Cats Adoption Events'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Cats'), ['controller' => 'Cats', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cat'), ['controller' => 'Cats', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Adoption Events'), ['controller' => 'AdoptionEvents', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Adoption Event'), ['controller' => 'AdoptionEvents', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="catsAdoptionEvents form large-9 medium-8 columns content">
    <?= $this->Form->create($catsAdoptionEvent) ?>
    <fieldset>
        <legend><?= __('Edit Cats Adoption Event') ?></legend>
        <?php
            echo $this->Form->input('cat_id', ['options' => $cats]);
            echo $this->Form->input('adoption_event_id', ['options' => $adoptionEvents]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

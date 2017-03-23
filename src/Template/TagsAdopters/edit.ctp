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
                ['action' => 'delete', $tagsAdopter->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $tagsAdopter->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Tags Adopters'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Tags'), ['controller' => 'Tags', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tag'), ['controller' => 'Tags', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Adopters'), ['controller' => 'Adopters', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Adopter'), ['controller' => 'Adopters', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tagsAdopters form large-9 medium-8 columns content">
    <?= $this->Form->create($tagsAdopter) ?>
    <fieldset>
        <legend><?= __('Edit Tags Adopter') ?></legend>
        <?php
            echo $this->Form->input('tag_id', ['options' => $tags]);
            echo $this->Form->input('adopter_id', ['options' => $adopters]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

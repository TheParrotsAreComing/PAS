<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Tags Adopter'), ['action' => 'edit', $tagsAdopter->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Tags Adopter'), ['action' => 'delete', $tagsAdopter->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tagsAdopter->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Tags Adopters'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tags Adopter'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tags'), ['controller' => 'Tags', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tag'), ['controller' => 'Tags', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Adopters'), ['controller' => 'Adopters', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Adopter'), ['controller' => 'Adopters', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tagsAdopters view large-9 medium-8 columns content">
    <h3><?= h($tagsAdopter->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Tag') ?></th>
            <td><?= $tagsAdopter->has('tag') ? $this->Html->link($tagsAdopter->tag->id, ['controller' => 'Tags', 'action' => 'view', $tagsAdopter->tag->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Adopter') ?></th>
            <td><?= $tagsAdopter->has('adopter') ? $this->Html->link($tagsAdopter->adopter->id, ['controller' => 'Adopters', 'action' => 'view', $tagsAdopter->adopter->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($tagsAdopter->id) ?></td>
        </tr>
    </table>
</div>

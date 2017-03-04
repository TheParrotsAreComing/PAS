<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Cat History'), ['action' => 'edit', $catHistory->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Cat History'), ['action' => 'delete', $catHistory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $catHistory->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Cat Histories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cat History'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cats'), ['controller' => 'Cats', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cat'), ['controller' => 'Cats', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Adopters'), ['controller' => 'Adopters', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Adopter'), ['controller' => 'Adopters', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Fosters'), ['controller' => 'Fosters', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Foster'), ['controller' => 'Fosters', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="catHistories view large-9 medium-8 columns content">
    <h3><?= h($catHistory->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Cat') ?></th>
            <td><?= $catHistory->has('cat') ? $this->Html->link($catHistory->cat->id, ['controller' => 'Cats', 'action' => 'view', $catHistory->cat->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Adopter') ?></th>
            <td><?= $catHistory->has('adopter') ? $this->Html->link($catHistory->adopter->id, ['controller' => 'Adopters', 'action' => 'view', $catHistory->adopter->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Foster') ?></th>
            <td><?= $catHistory->has('foster') ? $this->Html->link($catHistory->foster->id, ['controller' => 'Fosters', 'action' => 'view', $catHistory->foster->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($catHistory->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Start Date') ?></th>
            <td><?= h($catHistory->start_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('End Date') ?></th>
            <td><?= h($catHistory->end_date) ?></td>
        </tr>
    </table>
</div>

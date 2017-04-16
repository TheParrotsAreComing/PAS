<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Phone Number'), ['action' => 'edit', $phoneNumber->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Phone Number'), ['action' => 'delete', $phoneNumber->id], ['confirm' => __('Are you sure you want to delete # {0}?', $phoneNumber->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Phone Numbers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Phone Number'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="phoneNumbers view large-9 medium-8 columns content">
    <h3><?= h($phoneNumber->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Phone Num') ?></th>
            <td><?= h($phoneNumber->phone_num) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($phoneNumber->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Entity Type') ?></th>
            <td><?= $this->Number->format($phoneNumber->entity_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Entity Id') ?></th>
            <td><?= $this->Number->format($phoneNumber->entity_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($phoneNumber->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Deleted') ?></th>
            <td><?= $phoneNumber->is_deleted ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>

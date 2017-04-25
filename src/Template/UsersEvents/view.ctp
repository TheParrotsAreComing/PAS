<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Users Event'), ['action' => 'edit', $usersEvent->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Users Event'), ['action' => 'delete', $usersEvent->id], ['confirm' => __('Are you sure you want to delete # {0}?', $usersEvent->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users Events'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Users Event'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Adoption Events'), ['controller' => 'AdoptionEvents', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Adoption Event'), ['controller' => 'AdoptionEvents', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="usersEvents view large-9 medium-8 columns content">
    <h3><?= h($usersEvent->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $usersEvent->has('user') ? $this->Html->link($usersEvent->user->id, ['controller' => 'Users', 'action' => 'view', $usersEvent->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Adoption Event') ?></th>
            <td><?= $usersEvent->has('adoption_event') ? $this->Html->link($usersEvent->adoption_event->id, ['controller' => 'AdoptionEvents', 'action' => 'view', $usersEvent->adoption_event->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($usersEvent->id) ?></td>
        </tr>
    </table>
</div>

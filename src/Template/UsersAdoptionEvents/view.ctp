<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Users Adoption Event'), ['action' => 'edit', $usersAdoptionEvent->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Users Adoption Event'), ['action' => 'delete', $usersAdoptionEvent->id], ['confirm' => __('Are you sure you want to delete # {0}?', $usersAdoptionEvent->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users Adoption Events'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Users Adoption Event'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Adoption Events'), ['controller' => 'AdoptionEvents', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Adoption Event'), ['controller' => 'AdoptionEvents', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="usersAdoptionEvents view large-9 medium-8 columns content">
    <h3><?= h($usersAdoptionEvent->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $usersAdoptionEvent->has('user') ? $this->Html->link($usersAdoptionEvent->user->id, ['controller' => 'Users', 'action' => 'view', $usersAdoptionEvent->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Adoption Event') ?></th>
            <td><?= $usersAdoptionEvent->has('adoption_event') ? $this->Html->link($usersAdoptionEvent->adoption_event->id, ['controller' => 'AdoptionEvents', 'action' => 'view', $usersAdoptionEvent->adoption_event->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($usersAdoptionEvent->id) ?></td>
        </tr>
    </table>
</div>

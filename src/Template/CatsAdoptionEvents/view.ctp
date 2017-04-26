<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Cats Adoption Event'), ['action' => 'edit', $catsAdoptionEvent->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Cats Adoption Event'), ['action' => 'delete', $catsAdoptionEvent->id], ['confirm' => __('Are you sure you want to delete # {0}?', $catsAdoptionEvent->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Cats Adoption Events'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cats Adoption Event'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cats'), ['controller' => 'Cats', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cat'), ['controller' => 'Cats', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Adoption Events'), ['controller' => 'AdoptionEvents', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Adoption Event'), ['controller' => 'AdoptionEvents', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="catsAdoptionEvents view large-9 medium-8 columns content">
    <h3><?= h($catsAdoptionEvent->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Cat') ?></th>
            <td><?= $catsAdoptionEvent->has('cat') ? $this->Html->link($catsAdoptionEvent->cat->id, ['controller' => 'Cats', 'action' => 'view', $catsAdoptionEvent->cat->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Adoption Event') ?></th>
            <td><?= $catsAdoptionEvent->has('adoption_event') ? $this->Html->link($catsAdoptionEvent->adoption_event->id, ['controller' => 'AdoptionEvents', 'action' => 'view', $catsAdoptionEvent->adoption_event->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($catsAdoptionEvent->id) ?></td>
        </tr>
    </table>
</div>

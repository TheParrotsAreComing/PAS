<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Cats Adoption Event'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cats'), ['controller' => 'Cats', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cat'), ['controller' => 'Cats', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Adoption Events'), ['controller' => 'AdoptionEvents', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Adoption Event'), ['controller' => 'AdoptionEvents', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="catsAdoptionEvents index large-9 medium-8 columns content">
    <h3><?= __('Cats Adoption Events') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cat_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('adoption_event_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($catsAdoptionEvents as $catsAdoptionEvent): ?>
            <tr>
                <td><?= $this->Number->format($catsAdoptionEvent->id) ?></td>
                <td><?= $catsAdoptionEvent->has('cat') ? $this->Html->link($catsAdoptionEvent->cat->id, ['controller' => 'Cats', 'action' => 'view', $catsAdoptionEvent->cat->id]) : '' ?></td>
                <td><?= $catsAdoptionEvent->has('adoption_event') ? $this->Html->link($catsAdoptionEvent->adoption_event->id, ['controller' => 'AdoptionEvents', 'action' => 'view', $catsAdoptionEvent->adoption_event->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $catsAdoptionEvent->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $catsAdoptionEvent->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $catsAdoptionEvent->id], ['confirm' => __('Are you sure you want to delete # {0}?', $catsAdoptionEvent->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>

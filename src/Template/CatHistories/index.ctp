<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Cat History'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cats'), ['controller' => 'Cats', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cat'), ['controller' => 'Cats', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Adopters'), ['controller' => 'Adopters', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Adopter'), ['controller' => 'Adopters', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Fosters'), ['controller' => 'Fosters', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Foster'), ['controller' => 'Fosters', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="catHistories index large-9 medium-8 columns content">
    <h3><?= __('Cat Histories') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cat_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('adopter_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('foster_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('start_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('end_date') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($catHistories as $catHistory): ?>
            <tr>
                <td><?= $this->Number->format($catHistory->id) ?></td>
                <td><?= $catHistory->has('cat') ? $this->Html->link($catHistory->cat->id, ['controller' => 'Cats', 'action' => 'view', $catHistory->cat->id]) : '' ?></td>
                <td><?= $catHistory->has('adopter') ? $this->Html->link($catHistory->adopter->id, ['controller' => 'Adopters', 'action' => 'view', $catHistory->adopter->id]) : '' ?></td>
                <td><?= $catHistory->has('foster') ? $this->Html->link($catHistory->foster->id, ['controller' => 'Fosters', 'action' => 'view', $catHistory->foster->id]) : '' ?></td>
                <td><?= h($catHistory->start_date) ?></td>
                <td><?= h($catHistory->end_date) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $catHistory->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $catHistory->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $catHistory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $catHistory->id)]) ?>
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

<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Cat Medical History'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cats'), ['controller' => 'Cats', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cat'), ['controller' => 'Cats', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="catMedicalHistories index large-9 medium-8 columns content">
    <h3><?= __('Cat Medical Histories') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cat_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_fvrcp') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_deworm') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_flea') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_rabies') ?></th>
                <th scope="col"><?= $this->Paginator->sort('administered_date') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($catMedicalHistories as $catMedicalHistory): ?>
            <tr>
                <td><?= $this->Number->format($catMedicalHistory->id) ?></td>
                <td><?= $catMedicalHistory->has('cat') ? $this->Html->link($catMedicalHistory->cat->id, ['controller' => 'Cats', 'action' => 'view', $catMedicalHistory->cat->id]) : '' ?></td>
                <td><?= h($catMedicalHistory->is_fvrcp) ?></td>
                <td><?= h($catMedicalHistory->is_deworm) ?></td>
                <td><?= h($catMedicalHistory->is_flea) ?></td>
                <td><?= h($catMedicalHistory->is_rabies) ?></td>
                <td><?= h($catMedicalHistory->administered_date) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $catMedicalHistory->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $catMedicalHistory->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $catMedicalHistory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $catMedicalHistory->id)]) ?>
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

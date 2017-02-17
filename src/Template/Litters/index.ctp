<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Litter'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cats'), ['controller' => 'Cats', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cat'), ['controller' => 'Cats', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="litters index large-9 medium-8 columns content">
    <h3><?= __('Litters') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('kc_ref_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('litter_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cat_count') ?></th>
                <th scope="col"><?= $this->Paginator->sort('kitten_count') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dob') ?></th>
                <th scope="col"><?= $this->Paginator->sort('asn_start') ?></th>
                <th scope="col"><?= $this->Paginator->sort('asn_end') ?></th>
                <th scope="col"><?= $this->Paginator->sort('est_arrival') ?></th>
                <th scope="col"><?= $this->Paginator->sort('breed') ?></th>
                <th scope="col"><?= $this->Paginator->sort('foster_notes') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_deleted') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($litters as $litter): ?>
            <tr>
                <td><?= $this->Number->format($litter->id) ?></td>
                <td><?= $this->Number->format($litter->kc_ref_id) ?></td>
                <td><?= h($litter->litter_name) ?></td>
                <td><?= $this->Number->format($litter->cat_count) ?></td>
                <td><?= $this->Number->format($litter->kitten_count) ?></td>
                <td><?= h($litter->dob) ?></td>
                <td><?= h($litter->asn_start) ?></td>
                <td><?= h($litter->asn_end) ?></td>
                <td><?= h($litter->est_arrival) ?></td>
                <td><?= h($litter->breed) ?></td>
                <td><?= h($litter->foster_notes) ?></td>
                <td><?= h($litter->created) ?></td>
                <td><?= h($litter->is_deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $litter->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $litter->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $litter->id], ['confirm' => __('Are you sure you want to delete # {0}?', $litter->id)]) ?>
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

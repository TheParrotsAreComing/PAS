<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Tags Adopter'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tags'), ['controller' => 'Tags', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tag'), ['controller' => 'Tags', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Adopters'), ['controller' => 'Adopters', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Adopter'), ['controller' => 'Adopters', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tagsAdopters index large-9 medium-8 columns content">
    <h3><?= __('Tags Adopters') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tag_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('adopter_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tagsAdopters as $tagsAdopter): ?>
            <tr>
                <td><?= $this->Number->format($tagsAdopter->id) ?></td>
                <td><?= $tagsAdopter->has('tag') ? $this->Html->link($tagsAdopter->tag->id, ['controller' => 'Tags', 'action' => 'view', $tagsAdopter->tag->id]) : '' ?></td>
                <td><?= $tagsAdopter->has('adopter') ? $this->Html->link($tagsAdopter->adopter->id, ['controller' => 'Adopters', 'action' => 'view', $tagsAdopter->adopter->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $tagsAdopter->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tagsAdopter->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tagsAdopter->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tagsAdopter->id)]) ?>
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

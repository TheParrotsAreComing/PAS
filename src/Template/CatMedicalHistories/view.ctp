<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Cat Medical History'), ['action' => 'edit', $catMedicalHistory->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Cat Medical History'), ['action' => 'delete', $catMedicalHistory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $catMedicalHistory->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Cat Medical Histories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cat Medical History'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cats'), ['controller' => 'Cats', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cat'), ['controller' => 'Cats', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="catMedicalHistories view large-9 medium-8 columns content">
    <h3><?= h($catMedicalHistory->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Cat') ?></th>
            <td><?= $catMedicalHistory->has('cat') ? $this->Html->link($catMedicalHistory->cat->id, ['controller' => 'Cats', 'action' => 'view', $catMedicalHistory->cat->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($catMedicalHistory->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Administered Date') ?></th>
            <td><?= h($catMedicalHistory->administered_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Fvrcp') ?></th>
            <td><?= $catMedicalHistory->is_fvrcp ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Deworm') ?></th>
            <td><?= $catMedicalHistory->is_deworm ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Flea') ?></th>
            <td><?= $catMedicalHistory->is_flea ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Rabies') ?></th>
            <td><?= $catMedicalHistory->is_rabies ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Notes') ?></h4>
        <?= $this->Text->autoParagraph(h($catMedicalHistory->notes)); ?>
    </div>
</div>

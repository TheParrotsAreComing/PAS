<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Litter'), ['action' => 'edit', $litter->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Litter'), ['action' => 'delete', $litter->id], ['confirm' => __('Are you sure you want to delete # {0}?', $litter->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Litters'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Litter'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cats'), ['controller' => 'Cats', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cat'), ['controller' => 'Cats', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="litters view large-9 medium-8 columns content">
    <h3><?= h($litter->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Litter Name') ?></th>
            <td><?= h($litter->litter_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Est Arrival') ?></th>
            <td><?= h($litter->est_arrival) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Breed') ?></th>
            <td><?= h($litter->breed) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Foster Notes') ?></th>
            <td><?= h($litter->foster_notes) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($litter->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Kc Ref Id') ?></th>
            <td><?= $this->Number->format($litter->kc_ref_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cat Count') ?></th>
            <td><?= $this->Number->format($litter->cat_count) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Kitten Count') ?></th>
            <td><?= $this->Number->format($litter->kitten_count) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Dob') ?></th>
            <td><?= h($litter->dob) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Asn Start') ?></th>
            <td><?= h($litter->asn_start) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Asn End') ?></th>
            <td><?= h($litter->asn_end) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($litter->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Deleted') ?></th>
            <td><?= $litter->is_deleted ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Notes') ?></h4>
        <?= $this->Text->autoParagraph(h($litter->notes)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Cats') ?></h4>
        <?php if (!empty($litter->cats)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Litter Id') ?></th>
                <th scope="col"><?= __('Adopter Id') ?></th>
                <th scope="col"><?= __('Foster Id') ?></th>
                <th scope="col"><?= __('Cat Name') ?></th>
                <th scope="col"><?= __('Is Kitten') ?></th>
                <th scope="col"><?= __('Dob') ?></th>
                <th scope="col"><?= __('Is Female') ?></th>
                <th scope="col"><?= __('Breed') ?></th>
                <th scope="col"><?= __('Bio') ?></th>
                <th scope="col"><?= __('Caretaker Notes') ?></th>
                <th scope="col"><?= __('Medical Notes') ?></th>
                <th scope="col"><?= __('Profile Pic File Id') ?></th>
                <th scope="col"><?= __('Microchip Number') ?></th>
                <th scope="col"><?= __('Microchiped Date') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Adoption Fee Amount') ?></th>
                <th scope="col"><?= __('Is Paws') ?></th>
                <th scope="col"><?= __('Is Deleted') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($litter->cats as $cats): ?>
            <tr>
                <td><?= h($cats->id) ?></td>
                <td><?= h($cats->litter_id) ?></td>
                <td><?= h($cats->adopter_id) ?></td>
                <td><?= h($cats->foster_id) ?></td>
                <td><?= h($cats->cat_name) ?></td>
                <td><?= h($cats->is_kitten) ?></td>
                <td><?= h($cats->dob) ?></td>
                <td><?= h($cats->is_female) ?></td>
                <td><?= h($cats->breed) ?></td>
                <td><?= h($cats->bio) ?></td>
                <td><?= h($cats->caretaker_notes) ?></td>
                <td><?= h($cats->medical_notes) ?></td>
                <td><?= h($cats->profile_pic_file_id) ?></td>
                <td><?= h($cats->microchip_number) ?></td>
                <td><?= h($cats->microchiped_date) ?></td>
                <td><?= h($cats->created) ?></td>
                <td><?= h($cats->adoption_fee_amount) ?></td>
                <td><?= h($cats->is_paws) ?></td>
                <td><?= h($cats->is_deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Cats', 'action' => 'view', $cats->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Cats', 'action' => 'edit', $cats->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Cats', 'action' => 'delete', $cats->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cats->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

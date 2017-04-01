<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Tag'), ['action' => 'edit', $tag->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Tag'), ['action' => 'delete', $tag->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tag->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Tags'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tag'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Adopters'), ['controller' => 'Adopters', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Adopter'), ['controller' => 'Adopters', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cats'), ['controller' => 'Cats', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cat'), ['controller' => 'Cats', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Fosters'), ['controller' => 'Fosters', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Foster'), ['controller' => 'Fosters', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tags view large-9 medium-8 columns content">
    <h3><?= h($tag->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Label') ?></th>
            <td><?= h($tag->label) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Color') ?></th>
            <td><?= h($tag->color) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($tag->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type Bit') ?></th>
            <td><?= $this->Number->format($tag->type_bit) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Deleted') ?></th>
            <td><?= $tag->is_deleted ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Adopters') ?></h4>
        <?php if (!empty($tag->adopters)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('First Name') ?></th>
                <th scope="col"><?= __('Last Name') ?></th>
                <th scope="col"><?= __('Phone') ?></th>
                <th scope="col"><?= __('Cat Count') ?></th>
                <th scope="col"><?= __('Address') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Notes') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Is Deleted') ?></th>
                <th scope="col"><?= __('Do Not Adopt') ?></th>
                <th scope="col"><?= __('Dna Reason') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($tag->adopters as $adopters): ?>
            <tr>
                <td><?= h($adopters->id) ?></td>
                <td><?= h($adopters->first_name) ?></td>
                <td><?= h($adopters->last_name) ?></td>
                <td><?= h($adopters->phone) ?></td>
                <td><?= h($adopters->cat_count) ?></td>
                <td><?= h($adopters->address) ?></td>
                <td><?= h($adopters->email) ?></td>
                <td><?= h($adopters->notes) ?></td>
                <td><?= h($adopters->created) ?></td>
                <td><?= h($adopters->is_deleted) ?></td>
                <td><?= h($adopters->do_not_adopt) ?></td>
                <td><?= h($adopters->dna_reason) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Adopters', 'action' => 'view', $adopters->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Adopters', 'action' => 'edit', $adopters->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Adopters', 'action' => 'delete', $adopters->id], ['confirm' => __('Are you sure you want to delete # {0}?', $adopters->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Cats') ?></h4>
        <?php if (!empty($tag->cats)): ?>
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
                <th scope="col"><?= __('Color') ?></th>
                <th scope="col"><?= __('Coat') ?></th>
                <th scope="col"><?= __('Bio') ?></th>
                <th scope="col"><?= __('Diet') ?></th>
                <th scope="col"><?= __('Specialty Notes') ?></th>
                <th scope="col"><?= __('Profile Pic File Id') ?></th>
                <th scope="col"><?= __('Microchip Number') ?></th>
                <th scope="col"><?= __('Is Microchip Registered') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Adoption Fee Amount') ?></th>
                <th scope="col"><?= __('Is Paws') ?></th>
                <th scope="col"><?= __('Is Deleted') ?></th>
                <th scope="col"><?= __('Is Exported To Adoptapet') ?></th>
                <th scope="col"><?= __('Good With Kids') ?></th>
                <th scope="col"><?= __('Good With Dogs') ?></th>
                <th scope="col"><?= __('Good With Cats') ?></th>
                <th scope="col"><?= __('Special Needs') ?></th>
                <th scope="col"><?= __('Needs Experienced Adopter') ?></th>
                <th scope="col"><?= __('Breed Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($tag->cats as $cats): ?>
            <tr>
                <td><?= h($cats->id) ?></td>
                <td><?= h($cats->litter_id) ?></td>
                <td><?= h($cats->adopter_id) ?></td>
                <td><?= h($cats->foster_id) ?></td>
                <td><?= h($cats->cat_name) ?></td>
                <td><?= h($cats->is_kitten) ?></td>
                <td><?= h($cats->dob) ?></td>
                <td><?= h($cats->is_female) ?></td>
                <td><?= h($cats->color) ?></td>
                <td><?= h($cats->coat) ?></td>
                <td><?= h($cats->bio) ?></td>
                <td><?= h($cats->diet) ?></td>
                <td><?= h($cats->specialty_notes) ?></td>
                <td><?= h($cats->profile_pic_file_id) ?></td>
                <td><?= h($cats->microchip_number) ?></td>
                <td><?= h($cats->is_microchip_registered) ?></td>
                <td><?= h($cats->created) ?></td>
                <td><?= h($cats->adoption_fee_amount) ?></td>
                <td><?= h($cats->is_paws) ?></td>
                <td><?= h($cats->is_deleted) ?></td>
                <td><?= h($cats->is_exported_to_adoptapet) ?></td>
                <td><?= h($cats->good_with_kids) ?></td>
                <td><?= h($cats->good_with_dogs) ?></td>
                <td><?= h($cats->good_with_cats) ?></td>
                <td><?= h($cats->special_needs) ?></td>
                <td><?= h($cats->needs_experienced_adopter) ?></td>
                <td><?= h($cats->breed_id) ?></td>
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
    <div class="related">
        <h4><?= __('Related Fosters') ?></h4>
        <?php if (!empty($tag->fosters)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('First Name') ?></th>
                <th scope="col"><?= __('Last Name') ?></th>
                <th scope="col"><?= __('Phone') ?></th>
                <th scope="col"><?= __('Address') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Exp') ?></th>
                <th scope="col"><?= __('Pets') ?></th>
                <th scope="col"><?= __('Kids') ?></th>
                <th scope="col"><?= __('Avail') ?></th>
                <th scope="col"><?= __('Rating') ?></th>
                <th scope="col"><?= __('Notes') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Is Deleted') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($tag->fosters as $fosters): ?>
            <tr>
                <td><?= h($fosters->id) ?></td>
                <td><?= h($fosters->first_name) ?></td>
                <td><?= h($fosters->last_name) ?></td>
                <td><?= h($fosters->phone) ?></td>
                <td><?= h($fosters->address) ?></td>
                <td><?= h($fosters->email) ?></td>
                <td><?= h($fosters->exp) ?></td>
                <td><?= h($fosters->pets) ?></td>
                <td><?= h($fosters->kids) ?></td>
                <td><?= h($fosters->avail) ?></td>
                <td><?= h($fosters->rating) ?></td>
                <td><?= h($fosters->notes) ?></td>
                <td><?= h($fosters->created) ?></td>
                <td><?= h($fosters->is_deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Fosters', 'action' => 'view', $fosters->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Fosters', 'action' => 'edit', $fosters->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Fosters', 'action' => 'delete', $fosters->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fosters->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

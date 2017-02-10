<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Cat'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Litters'), ['controller' => 'Litters', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Litter'), ['controller' => 'Litters', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Adopters'), ['controller' => 'Adopters', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Adopter'), ['controller' => 'Adopters', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Fosters'), ['controller' => 'Fosters', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Foster'), ['controller' => 'Fosters', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Files'), ['controller' => 'Files', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New File'), ['controller' => 'Files', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cat Histories'), ['controller' => 'CatHistories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cat History'), ['controller' => 'CatHistories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Adoption Events'), ['controller' => 'AdoptionEvents', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Adoption Event'), ['controller' => 'AdoptionEvents', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tags'), ['controller' => 'Tags', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tag'), ['controller' => 'Tags', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="cats index large-9 medium-8 columns content">
    <h3><?= __('Cats') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('litter_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('adopter_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('foster_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cat_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dob') ?></th>
                <th scope="col"><?= $this->Paginator->sort('breed') ?></th>
                <th scope="col"><?= $this->Paginator->sort('profile_pic_file_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('microchip_number') ?></th>
                <th scope="col"><?= $this->Paginator->sort('microchiped_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('adoption_fee_paid') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_deleted') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cats as $cat): ?>
            <tr>
                <td><?= $this->Number->format($cat->id) ?></td>
                <td><?= $cat->has('litter') ? $this->Html->link($cat->litter->id, ['controller' => 'Litters', 'action' => 'view', $cat->litter->id]) : '' ?></td>
                <td><?= $cat->has('adopter') ? $this->Html->link($cat->adopter->id, ['controller' => 'Adopters', 'action' => 'view', $cat->adopter->id]) : '' ?></td>
                <td><?= $cat->has('foster') ? $this->Html->link($cat->foster->id, ['controller' => 'Fosters', 'action' => 'view', $cat->foster->id]) : '' ?></td>
                <td><?= h($cat->cat_name) ?></td>
                <td><?= h($cat->dob) ?></td>
                <td><?= h($cat->breed) ?></td>
                <td><?= $cat->has('file') ? $this->Html->link($cat->file->id, ['controller' => 'Files', 'action' => 'view', $cat->file->id]) : '' ?></td>
                <td><?= $this->Number->format($cat->microchip_number) ?></td>
                <td><?= h($cat->microchiped_date) ?></td>
                <td><?= h($cat->created) ?></td>
                <td><?= h($cat->adoption_fee_paid) ?></td>
                <td><?= h($cat->is_deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $cat->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $cat->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $cat->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cat->id)]) ?>
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

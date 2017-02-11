<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Foster'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cat Histories'), ['controller' => 'CatHistories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cat History'), ['controller' => 'CatHistories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cats'), ['controller' => 'Cats', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cat'), ['controller' => 'Cats', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tags'), ['controller' => 'Tags', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tag'), ['controller' => 'Tags', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="fosters index large-9 medium-8 columns content">
    <h3><?= __('Fosters') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('first_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('last_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('phone') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('exp') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pets') ?></th>
                <th scope="col"><?= $this->Paginator->sort('kids') ?></th>
                <th scope="col"><?= $this->Paginator->sort('avail') ?></th>
                <th scope="col"><?= $this->Paginator->sort('rating') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_deleted') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($fosters as $foster): ?>
            <tr>
                <td><?= $this->Number->format($foster->id) ?></td>
                <td><?= h($foster->first_name) ?></td>
                <td><?= h($foster->last_name) ?></td>
                <td><?= h($foster->phone) ?></td>
                <td><?= h($foster->address) ?></td>
                <td><?= h($foster->email) ?></td>
                <td><?= h($foster->exp) ?></td>
                <td><?= h($foster->pets) ?></td>
                <td><?= h($foster->kids) ?></td>
                <td><?= h($foster->avail) ?></td>
                <td><?= $this->Number->format($foster->rating) ?></td>
                <td><?= h($foster->created) ?></td>
                <td><?= h($foster->is_deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $foster->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $foster->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $foster->id], ['confirm' => __('Are you sure you want to delete # {0}?', $foster->id)]) ?>
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

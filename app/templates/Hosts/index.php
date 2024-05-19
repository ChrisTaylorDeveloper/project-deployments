<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Host> $hosts
 */
?>
<div class="hosts index content">
    <?= $this->Html->link(__('New Host'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Hosts') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($hosts as $host): ?>
                <tr>
                    <td><?= $this->Number->format($host->id) ?></td>
                    <td><?= h($host->name) ?></td>
                    <td><?= h($host->created) ?></td>
                    <td><?= h($host->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $host->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $host->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $host->id], ['confirm' => __('Are you sure you want to delete # {0}?', $host->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>

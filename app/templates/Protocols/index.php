<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Protocol> $protocols
 */
?>
<div class="protocols index content">
    <?= $this->Html->link(__('New Protocol'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Protocols') ?></h3>
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
                <?php foreach ($protocols as $protocol): ?>
                <tr>
                    <td><?= $this->Number->format($protocol->id) ?></td>
                    <td><?= h($protocol->name) ?></td>
                    <td><?= h($protocol->created) ?></td>
                    <td><?= h($protocol->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $protocol->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $protocol->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $protocol->id], ['confirm' => __('Are you sure you want to delete # {0}?', $protocol->id)]) ?>
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
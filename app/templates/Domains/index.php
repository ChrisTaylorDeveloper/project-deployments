<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Domain> $domains
 */
?>
<div class="domains index content">
    <?= $this->Html->link(__('New Domain'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Domains') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('registrar_id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($domains as $domain): ?>
                <tr>
                    <td><?= $this->Number->format($domain->id) ?></td>
                    <td><?= $domain->hasValue('registrar') ? $this->Html->link($domain->registrar->name, ['controller' => 'Registrars', 'action' => 'view', $domain->registrar->id]) : '' ?></td>
                    <td><?= h($domain->name) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $domain->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $domain->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $domain->id], ['confirm' => __('Are you sure you want to delete # {0}?', $domain->id)]) ?>
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

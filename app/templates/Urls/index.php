<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Url> $urls
 */
?>
<div class="urls index content">
    <?= $this->Html->link(__('New Url'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Urls') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('protocol_id') ?></th>
                    <th><?= $this->Paginator->sort('domain_id') ?></th>
                    <th><?= $this->Paginator->sort('sub_domain') ?></th>
                    <th><?= $this->Paginator->sort('port') ?></th>
                    <th><?= $this->Paginator->sort('path') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($urls as $url): ?>
                <tr>
                    <td><?= $this->Number->format($url->id) ?></td>
                    <td><?= $url->hasValue('protocol') ? $this->Html->link($url->protocol->name, ['controller' => 'Protocols', 'action' => 'view', $url->protocol->id]) : '' ?></td>
                    <td><?= $url->hasValue('domain') ? $this->Html->link($url->domain->name, ['controller' => 'Domains', 'action' => 'view', $url->domain->id]) : '' ?></td>
                    <td><?= h($url->sub_domain) ?></td>
                    <td><?= $url->port === null ? '' : $this->Number->format($url->port) ?></td>
                    <td><?= h($url->path) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $url->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $url->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $url->id], ['confirm' => __('Are you sure you want to delete # {0}?', $url->id)]) ?>
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

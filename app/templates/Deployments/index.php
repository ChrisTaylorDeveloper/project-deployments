<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Deployment> $deployments
 */
?>
<div class="deployments index content">
    <?= $this->Html->link(__('New Deployment'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Deployments') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('project_id') ?></th>
                    <th><?= $this->Paginator->sort('host_id') ?></th>
                    <th><?= $this->Paginator->sort('url_id') ?></th>
                    <th><?= $this->Paginator->sort('environment_id') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($deployments as $deployment): ?>
                <tr>
                    <td><?= $this->Number->format($deployment->id) ?></td>
                    <td><?= $deployment->hasValue('project') ? $this->Html->link($deployment->project->name, ['controller' => 'Projects', 'action' => 'view', $deployment->project->id]) : '' ?></td>
                    <td><?= $deployment->hasValue('host') ? $this->Html->link($deployment->host->name, ['controller' => 'Hosts', 'action' => 'view', $deployment->host->id]) : '' ?></td>
                    <td><?= $deployment->hasValue('url') ? $this->Html->link($deployment->url->id, ['controller' => 'Urls', 'action' => 'view', $deployment->url->id]) : '' ?></td>
                    <td><?= $deployment->hasValue('environment') ? $this->Html->link($deployment->environment->name, ['controller' => 'Environments', 'action' => 'view', $deployment->environment->id]) : '' ?></td>
                    <td><?= h($deployment->created) ?></td>
                    <td><?= h($deployment->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $deployment->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $deployment->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $deployment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $deployment->id)]) ?>
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

<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\DevelopersProject> $developersProjects
 */
?>
<div class="developersProjects index content">
    <?= $this->Html->link(__('New Developers Project'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Developers Projects') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('developer_id') ?></th>
                    <th><?= $this->Paginator->sort('project_id') ?></th>
                    <th><?= $this->Paginator->sort('local_code_folder') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($developersProjects as $developersProject): ?>
                <tr>
                    <td><?= $developersProject->hasValue('developer') ? $this->Html->link($developersProject->developer->name, ['controller' => 'Developers', 'action' => 'view', $developersProject->developer->id]) : '' ?></td>
                    <td><?= $developersProject->hasValue('project') ? $this->Html->link($developersProject->project->name, ['controller' => 'Projects', 'action' => 'view', $developersProject->project->id]) : '' ?></td>
                    <td><?= h($developersProject->local_code_folder) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $developersProject->developer_id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $developersProject->developer_id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $developersProject->developer_id], ['confirm' => __('Are you sure you want to delete # {0}?', $developersProject->developer_id)]) ?>
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

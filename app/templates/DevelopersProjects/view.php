<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\DevelopersProject $developersProject
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Developers Project'), ['action' => 'edit', $developersProject->developer_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Developers Project'), ['action' => 'delete', $developersProject->developer_id], ['confirm' => __('Are you sure you want to delete # {0}?', $developersProject->developer_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Developers Projects'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Developers Project'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="developersProjects view content">
            <h3><?= h($developersProject->Array) ?></h3>
            <table>
                <tr>
                    <th><?= __('Developer') ?></th>
                    <td><?= $developersProject->hasValue('developer') ? $this->Html->link($developersProject->developer->name, ['controller' => 'Developers', 'action' => 'view', $developersProject->developer->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Project') ?></th>
                    <td><?= $developersProject->hasValue('project') ? $this->Html->link($developersProject->project->name, ['controller' => 'Projects', 'action' => 'view', $developersProject->project->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Local Code Folder') ?></th>
                    <td><?= h($developersProject->local_code_folder) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>

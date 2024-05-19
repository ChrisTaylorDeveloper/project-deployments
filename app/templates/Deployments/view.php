<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Deployment $deployment
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Deployment'), ['action' => 'edit', $deployment->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Deployment'), ['action' => 'delete', $deployment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $deployment->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Deployments'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Deployment'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="deployments view content">
            <h3><?= h($deployment->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Project') ?></th>
                    <td><?= $deployment->hasValue('project') ? $this->Html->link($deployment->project->name, ['controller' => 'Projects', 'action' => 'view', $deployment->project->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Host') ?></th>
                    <td><?= $deployment->hasValue('host') ? $this->Html->link($deployment->host->name, ['controller' => 'Hosts', 'action' => 'view', $deployment->host->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Url') ?></th>
                    <td><?= $deployment->hasValue('url') ? $this->Html->link($deployment->url->id, ['controller' => 'Urls', 'action' => 'view', $deployment->url->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Environment') ?></th>
                    <td><?= $deployment->hasValue('environment') ? $this->Html->link($deployment->environment->name, ['controller' => 'Environments', 'action' => 'view', $deployment->environment->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($deployment->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($deployment->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($deployment->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>

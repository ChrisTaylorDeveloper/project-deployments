<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Host $host
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Host'), ['action' => 'edit', $host->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Host'), ['action' => 'delete', $host->id], ['confirm' => __('Are you sure you want to delete # {0}?', $host->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Hosts'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Host'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="hosts view content">
            <h3><?= h($host->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($host->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($host->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($host->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($host->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Deployments') ?></h4>
                <?php if (!empty($host->deployments)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Project Id') ?></th>
                            <th><?= __('Host Id') ?></th>
                            <th><?= __('Url Id') ?></th>
                            <th><?= __('Environment Id') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($host->deployments as $deployment) : ?>
                        <tr>
                            <td><?= h($deployment->id) ?></td>
                            <td><?= h($deployment->project_id) ?></td>
                            <td><?= h($deployment->host_id) ?></td>
                            <td><?= h($deployment->url_id) ?></td>
                            <td><?= h($deployment->environment_id) ?></td>
                            <td><?= h($deployment->created) ?></td>
                            <td><?= h($deployment->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Deployments', 'action' => 'view', $deployment->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Deployments', 'action' => 'edit', $deployment->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Deployments', 'action' => 'delete', $deployment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $deployment->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

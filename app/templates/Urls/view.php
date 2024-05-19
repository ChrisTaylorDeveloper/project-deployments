<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Url $url
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Url'), ['action' => 'edit', $url->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Url'), ['action' => 'delete', $url->id], ['confirm' => __('Are you sure you want to delete # {0}?', $url->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Urls'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Url'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="urls view content">
            <h3><?= h($url->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Protocol') ?></th>
                    <td><?= $url->hasValue('protocol') ? $this->Html->link($url->protocol->name, ['controller' => 'Protocols', 'action' => 'view', $url->protocol->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Domain') ?></th>
                    <td><?= $url->hasValue('domain') ? $this->Html->link($url->domain->name, ['controller' => 'Domains', 'action' => 'view', $url->domain->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Sub Domain') ?></th>
                    <td><?= h($url->sub_domain) ?></td>
                </tr>
                <tr>
                    <th><?= __('Path') ?></th>
                    <td><?= h($url->path) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($url->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Port') ?></th>
                    <td><?= $url->port === null ? '' : $this->Number->format($url->port) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($url->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($url->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Deployments') ?></h4>
                <?php if (!empty($url->deployments)) : ?>
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
                        <?php foreach ($url->deployments as $deployment) : ?>
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

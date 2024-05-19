<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Domain $domain
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Domain'), ['action' => 'edit', $domain->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Domain'), ['action' => 'delete', $domain->id], ['confirm' => __('Are you sure you want to delete # {0}?', $domain->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Domains'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Domain'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="domains view content">
            <h3><?= h($domain->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Registrar') ?></th>
                    <td><?= $domain->hasValue('registrar') ? $this->Html->link($domain->registrar->name, ['controller' => 'Registrars', 'action' => 'view', $domain->registrar->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($domain->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($domain->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($domain->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($domain->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Urls') ?></h4>
                <?php if (!empty($domain->urls)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Protocol Id') ?></th>
                            <th><?= __('Domain Id') ?></th>
                            <th><?= __('Sub Domain') ?></th>
                            <th><?= __('Port') ?></th>
                            <th><?= __('Path') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($domain->urls as $url) : ?>
                        <tr>
                            <td><?= h($url->id) ?></td>
                            <td><?= h($url->protocol_id) ?></td>
                            <td><?= h($url->domain_id) ?></td>
                            <td><?= h($url->sub_domain) ?></td>
                            <td><?= h($url->port) ?></td>
                            <td><?= h($url->path) ?></td>
                            <td><?= h($url->created) ?></td>
                            <td><?= h($url->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Urls', 'action' => 'view', $url->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Urls', 'action' => 'edit', $url->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Urls', 'action' => 'delete', $url->id], ['confirm' => __('Are you sure you want to delete # {0}?', $url->id)]) ?>
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

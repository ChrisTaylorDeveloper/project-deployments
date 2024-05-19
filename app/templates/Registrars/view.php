<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Registrar $registrar
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Registrar'), ['action' => 'edit', $registrar->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Registrar'), ['action' => 'delete', $registrar->id], ['confirm' => __('Are you sure you want to delete # {0}?', $registrar->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Registrars'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Registrar'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="registrars view content">
            <h3><?= h($registrar->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($registrar->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($registrar->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($registrar->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($registrar->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Domains') ?></h4>
                <?php if (!empty($registrar->domains)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Registrar Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($registrar->domains as $domain) : ?>
                        <tr>
                            <td><?= h($domain->id) ?></td>
                            <td><?= h($domain->registrar_id) ?></td>
                            <td><?= h($domain->name) ?></td>
                            <td><?= h($domain->created) ?></td>
                            <td><?= h($domain->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Domains', 'action' => 'view', $domain->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Domains', 'action' => 'edit', $domain->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Domains', 'action' => 'delete', $domain->id], ['confirm' => __('Are you sure you want to delete # {0}?', $domain->id)]) ?>
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

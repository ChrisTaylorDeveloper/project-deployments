<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Developer $developer
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Developer'), ['action' => 'edit', $developer->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Developer'), ['action' => 'delete', $developer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $developer->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Developers'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Developer'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="developers view content">
            <h3><?= h($developer->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($developer->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($developer->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($developer->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($developer->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Projects') ?></h4>
                <?php if (!empty($developer->projects)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Client Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Git Repo') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($developer->projects as $project) : ?>
                        <tr>
                            <td><?= h($project->id) ?></td>
                            <td><?= h($project->client_id) ?></td>
                            <td><?= h($project->name) ?></td>
                            <td><?= h($project->git_repo) ?></td>
                            <td><?= h($project->description) ?></td>
                            <td><?= h($project->created) ?></td>
                            <td><?= h($project->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Projects', 'action' => 'view', $project->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Projects', 'action' => 'edit', $project->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Projects', 'action' => 'delete', $project->id], ['confirm' => __('Are you sure you want to delete # {0}?', $project->id)]) ?>
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

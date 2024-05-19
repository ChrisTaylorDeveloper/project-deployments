<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * DevelopersProject Entity
 *
 * @property int $developer_id
 * @property int $project_id
 * @property string|null $local_code_folder
 *
 * @property \App\Model\Entity\Developer $developer
 * @property \App\Model\Entity\Project $project
 */
class DevelopersProject extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'local_code_folder' => true,
        'developer' => true,
        'project' => true,
    ];
}

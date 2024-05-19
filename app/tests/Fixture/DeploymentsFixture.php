<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DeploymentsFixture
 */
class DeploymentsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'project_id' => 1,
                'host_id' => 1,
                'url_id' => 1,
                'environment_id' => 1,
                'created' => '2024-05-19 14:40:38',
                'modified' => '2024-05-19 14:40:38',
            ],
        ];
        parent::init();
    }
}

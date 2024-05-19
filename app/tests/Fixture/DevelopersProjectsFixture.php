<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DevelopersProjectsFixture
 */
class DevelopersProjectsFixture extends TestFixture
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
                'developer_id' => 1,
                'project_id' => 1,
                'local_code_folder' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}

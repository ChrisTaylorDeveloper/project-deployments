<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DevelopersFixture
 */
class DevelopersFixture extends TestFixture
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
                'name' => 'Lorem ipsum dolor sit amet',
                'created' => '2024-05-19 14:40:38',
                'modified' => '2024-05-19 14:40:38',
            ],
        ];
        parent::init();
    }
}

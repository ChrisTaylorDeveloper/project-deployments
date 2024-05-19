<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UrlsFixture
 */
class UrlsFixture extends TestFixture
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
                'protocol_id' => 1,
                'domain_id' => 1,
                'sub_domain' => 'Lorem ipsum dolor sit amet',
                'port' => 1,
                'path' => 'Lorem ipsum dolor sit amet',
                'created' => '2024-05-19 14:40:38',
                'modified' => '2024-05-19 14:40:38',
            ],
        ];
        parent::init();
    }
}

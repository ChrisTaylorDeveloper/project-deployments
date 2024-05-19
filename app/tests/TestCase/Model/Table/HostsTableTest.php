<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HostsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HostsTable Test Case
 */
class HostsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\HostsTable
     */
    protected $Hosts;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Hosts',
        'app.Deployments',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Hosts') ? [] : ['className' => HostsTable::class];
        $this->Hosts = $this->getTableLocator()->get('Hosts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Hosts);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\HostsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

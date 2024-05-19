<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DeploymentsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DeploymentsTable Test Case
 */
class DeploymentsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DeploymentsTable
     */
    protected $Deployments;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Deployments',
        'app.Projects',
        'app.Hosts',
        'app.Urls',
        'app.Environments',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Deployments') ? [] : ['className' => DeploymentsTable::class];
        $this->Deployments = $this->getTableLocator()->get('Deployments', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Deployments);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\DeploymentsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\DeploymentsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

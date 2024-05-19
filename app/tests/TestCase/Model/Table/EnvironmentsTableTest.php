<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EnvironmentsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EnvironmentsTable Test Case
 */
class EnvironmentsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\EnvironmentsTable
     */
    protected $Environments;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Environments',
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
        $config = $this->getTableLocator()->exists('Environments') ? [] : ['className' => EnvironmentsTable::class];
        $this->Environments = $this->getTableLocator()->get('Environments', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Environments);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\EnvironmentsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DomainRegistrationStatusesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DomainRegistrationStatusesTable Test Case
 */
class DomainRegistrationStatusesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DomainRegistrationStatusesTable
     */
    protected $DomainRegistrationStatuses;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.DomainRegistrationStatuses',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('DomainRegistrationStatuses') ? [] : ['className' => DomainRegistrationStatusesTable::class];
        $this->DomainRegistrationStatuses = $this->getTableLocator()->get('DomainRegistrationStatuses', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->DomainRegistrationStatuses);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\DomainRegistrationStatusesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

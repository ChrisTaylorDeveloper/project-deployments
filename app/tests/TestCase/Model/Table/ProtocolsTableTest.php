<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProtocolsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProtocolsTable Test Case
 */
class ProtocolsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ProtocolsTable
     */
    protected $Protocols;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Protocols',
        'app.Urls',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Protocols') ? [] : ['className' => ProtocolsTable::class];
        $this->Protocols = $this->getTableLocator()->get('Protocols', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Protocols);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\ProtocolsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

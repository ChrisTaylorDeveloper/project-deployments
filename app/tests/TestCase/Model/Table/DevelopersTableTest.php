<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DevelopersTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DevelopersTable Test Case
 */
class DevelopersTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DevelopersTable
     */
    protected $Developers;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Developers',
        'app.Projects',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Developers') ? [] : ['className' => DevelopersTable::class];
        $this->Developers = $this->getTableLocator()->get('Developers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Developers);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\DevelopersTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

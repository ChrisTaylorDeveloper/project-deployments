<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RegistrarsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RegistrarsTable Test Case
 */
class RegistrarsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RegistrarsTable
     */
    protected $Registrars;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.Registrars',
        'app.Domains',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Registrars') ? [] : ['className' => RegistrarsTable::class];
        $this->Registrars = $this->getTableLocator()->get('Registrars', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Registrars);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\RegistrarsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

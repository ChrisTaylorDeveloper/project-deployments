<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use App\Controller\DomainRegistrationStatusesController;
use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\DomainRegistrationStatusesController Test Case
 *
 * @uses \App\Controller\DomainRegistrationStatusesController
 */
class DomainRegistrationStatusesControllerTest extends TestCase
{
    use IntegrationTestTrait;

    /**
     * Fixtures
     *
     * @var list<string>
     */
    protected array $fixtures = [
        'app.DomainRegistrationStatuses',
    ];

    /**
     * Test index method
     *
     * @return void
     * @uses \App\Controller\DomainRegistrationStatusesController::index()
     */
    public function testIndex(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     * @uses \App\Controller\DomainRegistrationStatusesController::view()
     */
    public function testView(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     * @uses \App\Controller\DomainRegistrationStatusesController::add()
     */
    public function testAdd(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     * @uses \App\Controller\DomainRegistrationStatusesController::edit()
     */
    public function testEdit(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     * @uses \App\Controller\DomainRegistrationStatusesController::delete()
     */
    public function testDelete(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}

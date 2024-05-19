<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * DomainRegistrationStatuses Controller
 *
 * @property \App\Model\Table\DomainRegistrationStatusesTable $DomainRegistrationStatuses
 */
class DomainRegistrationStatusesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->DomainRegistrationStatuses->find();
        $domainRegistrationStatuses = $this->paginate($query);

        $this->set(compact('domainRegistrationStatuses'));
    }

    /**
     * View method
     *
     * @param string|null $id Domain Registration Status id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $domainRegistrationStatus = $this->DomainRegistrationStatuses->get($id, contain: []);
        $this->set(compact('domainRegistrationStatus'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $domainRegistrationStatus = $this->DomainRegistrationStatuses->newEmptyEntity();
        if ($this->request->is('post')) {
            $domainRegistrationStatus = $this->DomainRegistrationStatuses->patchEntity($domainRegistrationStatus, $this->request->getData());
            if ($this->DomainRegistrationStatuses->save($domainRegistrationStatus)) {
                $this->Flash->success(__('The domain registration status has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The domain registration status could not be saved. Please, try again.'));
        }
        $this->set(compact('domainRegistrationStatus'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Domain Registration Status id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $domainRegistrationStatus = $this->DomainRegistrationStatuses->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $domainRegistrationStatus = $this->DomainRegistrationStatuses->patchEntity($domainRegistrationStatus, $this->request->getData());
            if ($this->DomainRegistrationStatuses->save($domainRegistrationStatus)) {
                $this->Flash->success(__('The domain registration status has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The domain registration status could not be saved. Please, try again.'));
        }
        $this->set(compact('domainRegistrationStatus'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Domain Registration Status id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $domainRegistrationStatus = $this->DomainRegistrationStatuses->get($id);
        if ($this->DomainRegistrationStatuses->delete($domainRegistrationStatus)) {
            $this->Flash->success(__('The domain registration status has been deleted.'));
        } else {
            $this->Flash->error(__('The domain registration status could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

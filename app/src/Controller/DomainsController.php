<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Domains Controller
 *
 * @property \App\Model\Table\DomainsTable $Domains
 */
class DomainsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Domains->find()
            ->contain(['Registrars']);
        $domains = $this->paginate($query);

        $this->set(compact('domains'));
    }

    /**
     * View method
     *
     * @param string|null $id Domain id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $domain = $this->Domains->get($id, contain: ['Registrars', 'Urls']);
        $this->set(compact('domain'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $domain = $this->Domains->newEmptyEntity();
        if ($this->request->is('post')) {
            $domain = $this->Domains->patchEntity($domain, $this->request->getData());
            if ($this->Domains->save($domain)) {
                $this->Flash->success(__('The domain has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The domain could not be saved. Please, try again.'));
        }
        $registrars = $this->Domains->Registrars->find('list', limit: 200)->all();
        $this->set(compact('domain', 'registrars'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Domain id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $domain = $this->Domains->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $domain = $this->Domains->patchEntity($domain, $this->request->getData());
            if ($this->Domains->save($domain)) {
                $this->Flash->success(__('The domain has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The domain could not be saved. Please, try again.'));
        }
        $registrars = $this->Domains->Registrars->find('list', limit: 200)->all();
        $this->set(compact('domain', 'registrars'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Domain id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $domain = $this->Domains->get($id);
        if ($this->Domains->delete($domain)) {
            $this->Flash->success(__('The domain has been deleted.'));
        } else {
            $this->Flash->error(__('The domain could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

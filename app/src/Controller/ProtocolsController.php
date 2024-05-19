<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Protocols Controller
 *
 * @property \App\Model\Table\ProtocolsTable $Protocols
 */
class ProtocolsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Protocols->find();
        $protocols = $this->paginate($query);

        $this->set(compact('protocols'));
    }

    /**
     * View method
     *
     * @param string|null $id Protocol id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $protocol = $this->Protocols->get($id, contain: ['Urls']);
        $this->set(compact('protocol'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $protocol = $this->Protocols->newEmptyEntity();
        if ($this->request->is('post')) {
            $protocol = $this->Protocols->patchEntity($protocol, $this->request->getData());
            if ($this->Protocols->save($protocol)) {
                $this->Flash->success(__('The protocol has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The protocol could not be saved. Please, try again.'));
        }
        $this->set(compact('protocol'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Protocol id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $protocol = $this->Protocols->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $protocol = $this->Protocols->patchEntity($protocol, $this->request->getData());
            if ($this->Protocols->save($protocol)) {
                $this->Flash->success(__('The protocol has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The protocol could not be saved. Please, try again.'));
        }
        $this->set(compact('protocol'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Protocol id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $protocol = $this->Protocols->get($id);
        if ($this->Protocols->delete($protocol)) {
            $this->Flash->success(__('The protocol has been deleted.'));
        } else {
            $this->Flash->error(__('The protocol could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

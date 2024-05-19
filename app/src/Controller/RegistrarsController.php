<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Registrars Controller
 *
 * @property \App\Model\Table\RegistrarsTable $Registrars
 */
class RegistrarsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Registrars->find();
        $registrars = $this->paginate($query);

        $this->set(compact('registrars'));
    }

    /**
     * View method
     *
     * @param string|null $id Registrar id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $registrar = $this->Registrars->get($id, contain: ['Domains']);
        $this->set(compact('registrar'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $registrar = $this->Registrars->newEmptyEntity();
        if ($this->request->is('post')) {
            $registrar = $this->Registrars->patchEntity($registrar, $this->request->getData());
            if ($this->Registrars->save($registrar)) {
                $this->Flash->success(__('The registrar has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The registrar could not be saved. Please, try again.'));
        }
        $this->set(compact('registrar'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Registrar id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $registrar = $this->Registrars->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $registrar = $this->Registrars->patchEntity($registrar, $this->request->getData());
            if ($this->Registrars->save($registrar)) {
                $this->Flash->success(__('The registrar has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The registrar could not be saved. Please, try again.'));
        }
        $this->set(compact('registrar'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Registrar id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $registrar = $this->Registrars->get($id);
        if ($this->Registrars->delete($registrar)) {
            $this->Flash->success(__('The registrar has been deleted.'));
        } else {
            $this->Flash->error(__('The registrar could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

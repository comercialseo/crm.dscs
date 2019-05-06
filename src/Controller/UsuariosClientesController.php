<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AppUsuariosAppClientes Controller
 *
 *
 * @method \App\Model\Entity\AppUsuariosAppCliente[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsuariosClientesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $appUsuariosAppClientes = $this->paginate($this->AppUsuariosAppClientes);

        $this->set(compact('appUsuariosAppClientes'));
    }

    /**
     * View method
     *
     * @param string|null $id App Usuarios App Cliente id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $appUsuariosAppCliente = $this->AppUsuariosAppClientes->get($id, [
            'contain' => []
        ]);

        $this->set('appUsuariosAppCliente', $appUsuariosAppCliente);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $appUsuariosAppCliente = $this->AppUsuariosAppClientes->newEntity();
        if ($this->request->is('post')) {
            $appUsuariosAppCliente = $this->AppUsuariosAppClientes->patchEntity($appUsuariosAppCliente, $this->request->getData());
            if ($this->AppUsuariosAppClientes->save($appUsuariosAppCliente)) {
                $this->Flash->success(__('The app usuarios app cliente has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The app usuarios app cliente could not be saved. Please, try again.'));
        }
        $this->set(compact('appUsuariosAppCliente'));
    }

    /**
     * Edit method
     *
     * @param string|null $id App Usuarios App Cliente id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $appUsuariosAppCliente = $this->AppUsuariosAppClientes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $appUsuariosAppCliente = $this->AppUsuariosAppClientes->patchEntity($appUsuariosAppCliente, $this->request->getData());
            if ($this->AppUsuariosAppClientes->save($appUsuariosAppCliente)) {
                $this->Flash->success(__('The app usuarios app cliente has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The app usuarios app cliente could not be saved. Please, try again.'));
        }
        $this->set(compact('appUsuariosAppCliente'));
    }

    /**
     * Delete method
     *
     * @param string|null $id App Usuarios App Cliente id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $appUsuariosAppCliente = $this->AppUsuariosAppClientes->get($id);
        if ($this->AppUsuariosAppClientes->delete($appUsuariosAppCliente)) {
            $this->Flash->success(__('The app usuarios app cliente has been deleted.'));
        } else {
            $this->Flash->error(__('The app usuarios app cliente could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

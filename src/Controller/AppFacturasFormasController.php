<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AppFacturasFormas Controller
 *
 *
 * @method \App\Model\Entity\AppFacturasForma[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AppFacturasFormasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $appFacturasFormas = $this->paginate($this->AppFacturasFormas);

        $this->set(compact('appFacturasFormas'));
    }

    /**
     * View method
     *
     * @param string|null $id App Facturas Forma id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $appFacturasForma = $this->AppFacturasFormas->get($id, [
            'contain' => []
        ]);

        $this->set('appFacturasForma', $appFacturasForma);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $appFacturasForma = $this->AppFacturasFormas->newEntity();
        if ($this->request->is('post')) {
            $appFacturasForma = $this->AppFacturasFormas->patchEntity($appFacturasForma, $this->request->getData());
            if ($this->AppFacturasFormas->save($appFacturasForma)) {
                $this->Flash->success(__('The app facturas forma has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The app facturas forma could not be saved. Please, try again.'));
        }
        $this->set(compact('appFacturasForma'));
    }

    /**
     * Edit method
     *
     * @param string|null $id App Facturas Forma id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $appFacturasForma = $this->AppFacturasFormas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $appFacturasForma = $this->AppFacturasFormas->patchEntity($appFacturasForma, $this->request->getData());
            if ($this->AppFacturasFormas->save($appFacturasForma)) {
                $this->Flash->success(__('The app facturas forma has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The app facturas forma could not be saved. Please, try again.'));
        }
        $this->set(compact('appFacturasForma'));
    }

    /**
     * Delete method
     *
     * @param string|null $id App Facturas Forma id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $appFacturasForma = $this->AppFacturasFormas->get($id);
        if ($this->AppFacturasFormas->delete($appFacturasForma)) {
            $this->Flash->success(__('The app facturas forma has been deleted.'));
        } else {
            $this->Flash->error(__('The app facturas forma could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

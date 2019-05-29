<?php
/**
 * =====================================================================
 * Controlador de Formas de Pago de la App
 * =====================================================================
 * @author    ComercialSEO GrupoAltaEmpresas S.L.
 * @copyright 2019 ComercialSEO Todos los derechos resevados
 * @link      https://www.comercialseo.es Projects
 * @version   CakePHP/CRM.dscs.es v-1.01
 * @since     3.7
 * @property  \App\Model\Table\AppFacturasFormasPagosTable $AppFacturas
 * @method    \App\Model\Entity\AppFacturasFormasPago[]|
 * =====================================================================
*/
namespace App\Controller;
use App\Controller\AppController;
use Cake\Event\Event;

/**
 * AppFacturasFormasPagos Controller
 *
 *
 * @method \App\Model\Entity\AppFacturasFormasPago[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FacturasFormasPagosController extends AppController
{
            public function initialize()
    {
        parent::initialize();
    }

    public function beforeFilter(Event $event) 
    {
        parent::beforeFilter($event);
    }

    public function isAuthorized($usuarioActual)
    {
    if(isset($usuarioActual['us_rol']) && ( 
        ($usuarioActual['us_rol'] == 'sa') || ($usuarioActual['us_rol'] == 'ad') 
    ))
    {
        if(in_array($this->request->getParam('action'), ['index', 'ver', 'editar', 'crear', 'borrar']))
        {
            return true;
        }
    }else 
    if(isset($usuarioActual['us_rol']) && ( 
    ($usuarioActual['us_rol'] == 'ed')
    ))
    {
        if(in_array($this->request->getParam('action'), ['index', 'ver', 'editar', 'crear']))
        {
            return true;
        }
    }else 
    if(isset($usuarioActual['us_rol']) && ( 
    ($usuarioActual['us_rol'] == 'au')
    ))
    {
        if(in_array($this->request->getParam('action'), ['index', 'ver', 'editar', 'crear']))
        {
            return true;
        }
    }if(isset($usuarioActual['us_rol']) && ( 
    ($usuarioActual['us_rol'] == 'us')
    ))
    {
        if(in_array($this->request->getParam('action'), ['index', 'ver']))
        {
            return true;
        }
    }
        return parent::isAuthorized($usuarioActual);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $appFacturasFormasPagos = $this->paginate($this->AppFacturasFormasPagos);

        $this->set(compact('appFacturasFormasPagos'));
    }

    /**
     * View method
     *
     * @param string|null $id App Facturas Formas Pago id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $appFacturasFormasPago = $this->AppFacturasFormasPagos->get($id, [
            'contain' => []
        ]);

        $this->set('appFacturasFormasPago', $appFacturasFormasPago);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $appFacturasFormasPago = $this->AppFacturasFormasPagos->newEntity();
        if ($this->request->is('post')) {
            $appFacturasFormasPago = $this->AppFacturasFormasPagos->patchEntity($appFacturasFormasPago, $this->request->getData());
            if ($this->AppFacturasFormasPagos->save($appFacturasFormasPago)) {
                $this->Flash->success(__('The app facturas formas pago has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The app facturas formas pago could not be saved. Please, try again.'));
        }
        $this->set(compact('appFacturasFormasPago'));
    }

    /**
     * Edit method
     *
     * @param string|null $id App Facturas Formas Pago id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $appFacturasFormasPago = $this->AppFacturasFormasPagos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $appFacturasFormasPago = $this->AppFacturasFormasPagos->patchEntity($appFacturasFormasPago, $this->request->getData());
            if ($this->AppFacturasFormasPagos->save($appFacturasFormasPago)) {
                $this->Flash->success(__('The app facturas formas pago has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The app facturas formas pago could not be saved. Please, try again.'));
        }
        $this->set(compact('appFacturasFormasPago'));
    }

    /**
     * Delete method
     *
     * @param string|null $id App Facturas Formas Pago id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $appFacturasFormasPago = $this->AppFacturasFormasPagos->get($id);
        if ($this->AppFacturasFormasPagos->delete($appFacturasFormasPago)) {
            $this->Flash->success(__('The app facturas formas pago has been deleted.'));
        } else {
            $this->Flash->error(__('The app facturas formas pago could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

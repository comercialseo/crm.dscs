<?php
/**
 * =====================================================================
 * Controlador de Facturas de la App
 * =====================================================================
 * @author    ComercialSEO GrupoAltaEmpresas S.L.
 * @copyright 2019 ComercialSEO Todos los derechos resevados
 * @link      https://www.comercialseo.es Projects
 * @version   CakePHP/CRM.dscs.es v-1.01
 * @since     3.7
 * @property  \App\Model\Table\AppFacturasTable $AppFacturas
 * @method    \App\Model\Entity\AppFactura[]|
 * =====================================================================
*/
namespace App\Controller;
use App\Controller\AppController;
use Cake\Event\Event;

/**
 * AppClientes Controller
 *
 * @property \App\Model\Table\AppClientesTable $AppClientes
 *
 * @method \App\Model\Entity\AppCliente[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ClientesController extends AppController
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
        $appFacturas = $this->paginate($this->AppFacturas);

        $this->set(compact('appFacturas'));
    }

    /**
     * View method
     *
     * @param string|null $id App Factura id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $appFactura = $this->AppFacturas->get($id, [
            'contain' => []
        ]);

        $this->set('appFactura', $appFactura);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $appFactura = $this->AppFacturas->newEntity();
        if ($this->request->is('post')) {
            $appFactura = $this->AppFacturas->patchEntity($appFactura, $this->request->getData());
            if ($this->AppFacturas->save($appFactura)) {
                $this->Flash->success(__('The app factura has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The app factura could not be saved. Please, try again.'));
        }
        $this->set(compact('appFactura'));
    }

    /**
     * Edit method
     *
     * @param string|null $id App Factura id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $appFactura = $this->AppFacturas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $appFactura = $this->AppFacturas->patchEntity($appFactura, $this->request->getData());
            if ($this->AppFacturas->save($appFactura)) {
                $this->Flash->success(__('The app factura has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The app factura could not be saved. Please, try again.'));
        }
        $this->set(compact('appFactura'));
    }

    /**
     * Delete method
     *
     * @param string|null $id App Factura id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $appFactura = $this->AppFacturas->get($id);
        if ($this->AppFacturas->delete($appFactura)) {
            $this->Flash->success(__('The app factura has been deleted.'));
        } else {
            $this->Flash->error(__('The app factura could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

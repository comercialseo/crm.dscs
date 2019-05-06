<?php
/**
 * =====================================================================
 * Controlador de Líneas de Facturas de la App
 * =====================================================================
 * @author    ComercialSEO GrupoAltaEmpresas S.L.
 * @copyright 2019 ComercialSEO Todos los derechos resevados
 * @link      https://www.comercialseo.es Projects
 * @version   CakePHP/CRM.dscs.es v-1.01
 * @since     3.7
 * @property  \App\Model\Table\AppFacturasLineasTable $AppFacturasLineas
 * @method    \App\Model\Entity\AppFacturasLinea[]|
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
        if(in_array($this->request->getParam('action'), ['index', 'ver', 'editar', 'crear', 'asignar', 'borrar']))
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
 * AppFacturasLineas Controller
 *
 * @property \App\Model\Table\AppFacturasLineasTable $AppFacturasLineas
 *
 * @method \App\Model\Entity\AppFacturasLinea[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FacturasLineasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['AppProductos', 'AppClientesNegocios', 'FlFacturas']
        ];
        $appFacturasLineas = $this->paginate($this->AppFacturasLineas);

        $this->set(compact('appFacturasLineas'));
    }

    /**
     * View method
     *
     * @param string|null $id App Facturas Linea id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $appFacturasLinea = $this->AppFacturasLineas->get($id, [
            'contain' => ['AppProductos', 'AppClientesNegocios', 'FlFacturas']
        ]);

        $this->set('appFacturasLinea', $appFacturasLinea);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $appFacturasLinea = $this->AppFacturasLineas->newEntity();
        if ($this->request->is('post')) {
            $appFacturasLinea = $this->AppFacturasLineas->patchEntity($appFacturasLinea, $this->request->getData());
            if ($this->AppFacturasLineas->save($appFacturasLinea)) {
                $this->Flash->success(__('The app facturas linea has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The app facturas linea could not be saved. Please, try again.'));
        }
        $appProductos = $this->AppFacturasLineas->AppProductos->find('list', ['limit' => 200]);
        $appClientesNegocios = $this->AppFacturasLineas->AppClientesNegocios->find('list', ['limit' => 200]);
        $flFacturas = $this->AppFacturasLineas->FlFacturas->find('list', ['limit' => 200]);
        $this->set(compact('appFacturasLinea', 'appProductos', 'appClientesNegocios', 'flFacturas'));
    }

    /**
     * Edit method
     *
     * @param string|null $id App Facturas Linea id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $appFacturasLinea = $this->AppFacturasLineas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $appFacturasLinea = $this->AppFacturasLineas->patchEntity($appFacturasLinea, $this->request->getData());
            if ($this->AppFacturasLineas->save($appFacturasLinea)) {
                $this->Flash->success(__('The app facturas linea has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The app facturas linea could not be saved. Please, try again.'));
        }
        $appProductos = $this->AppFacturasLineas->AppProductos->find('list', ['limit' => 200]);
        $appClientesNegocios = $this->AppFacturasLineas->AppClientesNegocios->find('list', ['limit' => 200]);
        $flFacturas = $this->AppFacturasLineas->FlFacturas->find('list', ['limit' => 200]);
        $this->set(compact('appFacturasLinea', 'appProductos', 'appClientesNegocios', 'flFacturas'));
    }

    /**
     * Delete method
     *
     * @param string|null $id App Facturas Linea id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $appFacturasLinea = $this->AppFacturasLineas->get($id);
        if ($this->AppFacturasLineas->delete($appFacturasLinea)) {
            $this->Flash->success(__('The app facturas linea has been deleted.'));
        } else {
            $this->Flash->error(__('The app facturas linea could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

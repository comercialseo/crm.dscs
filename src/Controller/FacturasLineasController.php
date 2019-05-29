<?php
/**
 * =====================================================================
 * Controlador de Clientes de la App
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
 * AppFacturasLineas Controller
 *
 * @property \App\Model\Table\AppFacturasLineasTable $AppFacturasLineas
 *
 * @method \App\Model\Entity\AppFacturasLinea[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FacturasLineasController extends AppController
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

        $this->loadModel('AppFacturasLineas');
        $appFacturasLineas = $this->AppFacturasLineas->find('all', [
            'contain' => ['AppProductos', 'AppClientesNegocios', 'AppFacturas']
        ]);
        $this->loadModel('SettingsConfigurations');
        $appOpciones = $this->SettingsConfigurations->find('all');

        $this->set(compact('appFacturasLineas', 'appOpciones'));

        $this->loadModel('AppFacturas');
        $appFactura = $this->AppFacturas->newEntity();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $appFactura = $this->AppFacturas->patchEntity($appFactura, $this->request->getData());
            $idCliente  = $this->request->data['fc_app_negocios_id'];

            $appFacturasLineasCount = $this->AppFacturasLineas->find('all', [
                'conditions' => ['fl_negocios_id' => $idCliente, 'fl_facturas_id' => 0]
            ]);
            $numberFacturasLineasCount = $appFacturasLineasCount->count();

            if($numberFacturasLineasCount !== 0)
            {
                $appFacturasLineasSin = $this->AppFacturasLineas
                ->find()
                ->where(['fl_negocios_id' => $idCliente, 'fl_facturas_id' => 0]);

                $baseImp = false;
                foreach ($appFacturasLineasSin as $appFacturasLineasSinBucle) {
                    $baseImp += $appFacturasLineasSinBucle->fl_subtotal;
                }

                $iva  = ($this->request->data['fc_iva_estipulado'] * $baseImp) / 100;
                $irpf = ($this->request->data['fc_irpf_estipulado'] * $baseImp) / 100;

                $appFactura->fc_iva            = $iva;
                $appFactura->fc_irpf           = $irpf;
                $appFactura->fc_base_imponible = $baseImp;

                $facTotal1 = ($baseImp + $iva) - $irpf;

                if($this->request->data['fc_descuento'] !== 0)
                {
                    $facTotal1 -= $this->request->data['fc_descuento'];
                }

                $appFactura->fc_total           = $facTotal1;
                $usId                           = $this->Auth->User('id');
                $appFactura->fc_app_usuarios_id = $usId;

                $qFactura = $this->AppFacturas->save($appFactura);
                
                if ($qFactura) {

                    $lastId = $qFactura->id;
                    $this->loadModel('AppFacturas');
                    foreach ($appFacturasLineasSin as $appFacturasLineasSinBucle2) {

                    $queryUpdateEstadoLinea = $this->AppFacturasLineas->query();
                    $queryUpdateEstadoLinea->update()
                            ->set(['fl_facturas_id' => $lastId])
                            ->where(['fl_negocios_id' => $idCliente, 'fl_facturas_id' => 0])
                            ->execute();
                    }

                    if($queryUpdateEstadoLinea)
                    {
                        $this->loadModel('AppClientesNegocios');
                        $appFacturasNegocio = $this->AppClientesNegocios
                                    ->find()
                                    ->where(['id'  => $idCliente])
                                    ->first();

                        //$randDate = date(ymdms);

                        $generaCodeFact = $lastId;

                        $this->loadModel('AppFacturas');
                        $queryUpdateCodeFact = $this->AppFacturas->query();
                        $queryUpdateCodeFact->update()
                                ->set(['fc_codigo' => $generaCodeFact])
                                ->where(['id' => $lastId, 'fc_codigo' => 0])
                                ->execute();
                            if($queryUpdateCodeFact) 
                            {
                                $this->loadComponent('Logging.Log');
                                $this->Log->info('RegBrouser', '[Gastos_Crear]', [], ['ip' => true, 'referer' => true]);

                                $this->Flash->success(__('Los datos del Gasto se han actualizado con éxito.'));
                                return $this->redirect(['action' => 'index']);
                            }
                    }
             
                }
            }else {
                 $this->Flash->error(__('El cliente seleccionado no tiene ninguna línea de ingreso sin facturar. Por favor, primero tienes que crear las líneas de ingreso y después generar la factura para el cliente.'));
            }
        }
        
        $this->set(compact('appFactura'));

        $this->loadModel('AppClientesNegocios');
        $appEmpresa = $this->AppFacturas->AppClientesNegocios->find('list', [
                                                'keyField' => 'id',
                                                'valueField' => 'cn_razon_social'
                                                ]);
        $this->loadModel('AppFacturasFormasPagos');
        $appFormaPago = $this->AppFacturas->AppFacturasFormasPagos->find('list', [
                                                'keyField' => 'id',
                                                'valueField' => 'fp_forma'
                                                ]);

        $this->set(compact('appEmpresa', 'appProveedores', 'appFormaPago'));
    }

    /**
     * View method
     *
     * @param string|null $id App Facturas Linea id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function ver($id = null)
    {
        $appFacturasLinea = $this->AppFacturasLineas->get($id, [
            'contain' => ['AppProductos', 'AppClientesNegocios', 'AppFacturas']
        ]);

        $this->set('appFacturasLinea', $appFacturasLinea);

    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function crear()
    {
        $this->loadModel('AppFacturasLineas');
        $appFacturasLinea = $this->AppFacturasLineas->newEntity();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $appFacturasLinea = $this->AppFacturasLineas->patchEntity($appFacturasLinea, $this->request->getData());
            $idPr = $this->request->data['fl_productos_id'];
            $idCa = $this->request->data['fl_cantidad'];
            $insLinea = $this->AppFacturasLineas->save($appFacturasLinea);
            if ($insLinea) {
                $record_id = $insLinea->id;

                $this->loadModel('AppProductos');
                $appProductoPrecio = $this->AppProductos
                                            ->find()
                                            ->where(['id' => $idPr])
                                            ->first();
                $prPrecio = $appProductoPrecio->pr_base_imponible;
                $subTotal = $idCa * $prPrecio; 

                $query = $this->AppFacturasLineas->query();
                $query->update()
                    ->set(['fl_subtotal' => $subTotal])
                    ->where(['id' => $record_id])
                    ->execute();

                $this->Flash->success(__('La Línea de Ingreso se ha creado con éxito.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se ha podido crear la nueva Línea de Ingreso. Si el fallo persiste por favor, ponte en contacto con los administradores del sistema.'));
        }
        $appProductos = $this->AppFacturasLineas->AppProductos->find('list', 
                                            [
                                                'keyField' => 'id',
                                                'valueField' => 'pr_nombre',
                                                'limit' => 200
                                            ]);
        $appClientesNegocios = $this->AppFacturasLineas->AppClientesNegocios->find('list', 
                                            [
                                                'keyField' => 'id',
                                                'valueField' => 'cn_razon_social',
                                                'limit' => 200
                                            ]);
        $this->set(compact('appFacturasLinea', 'appProductos', 'appClientesNegocios'));
    }

    /**
     * Edit method
     *
     * @param string|null $id App Facturas Linea id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function editar($id = null)
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
    public function borrar($id = null)
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

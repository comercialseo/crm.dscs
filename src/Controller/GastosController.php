<?php
/**
 * =====================================================================
 * Controlador de Gastos de la App
 * =====================================================================
 * @author    ComercialSEO GrupoAltaEmpresas S.L.
 * @copyright 2019 ComercialSEO Todos los derechos resevados
 * @link      https://www.comercialseo.es Projects
 * @version   CakePHP/CRM.dscs.es v-1.01
 * @since     3.7
 * @property  \App\Model\Table\AppGastosTable $AppGastos
 * @method    \App\Model\Entity\AppGasto[]|
 * =====================================================================
*/
namespace App\Controller;
use App\Controller\AppController;
use Cake\Event\Event;

/**
 * AppGastos Controller
 *
 * @property \App\Model\Table\AppGastosTable $AppGastos
 *
 * @method \App\Model\Entity\AppGasto[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class GastosController extends AppController
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
        if(in_array($this->request->getParam('action'), ['index', 'ver', 'editar', 'asignar', 'borrar', 'informesEjercicio']))
        {
            return true;
        }
    }else 
    if(isset($usuarioActual['us_rol']) && ( 
    ($usuarioActual['us_rol'] == 'ed')
    ))
    {
        if(in_array($this->request->getParam('action'), ['index', 'ver', 'editar']))
        {
            return true;
        }
    }else 
    if(isset($usuarioActual['us_rol']) && ( 
    ($usuarioActual['us_rol'] == 'au')
    ))
    {
        if(in_array($this->request->getParam('action'), ['index', 'ver', 'editar']))
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
        $this->loadModel('AppGastos');
        $appGastos = $this->AppGastos->find('all', [
            'contain' => ['AppProveedores']
        ]);
        $this->set(compact('appGastos'));

        $appGastoForm = $this->AppGastos->newEntity();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $appGastoForm = $this->AppGastos->patchEntity($appGastoForm, $this->request->getData());
            if(!empty($this->request->data['ga_factura']['name']))
            {
                $file = $this->request->data['ga_factura']; //put the data into a var for easy use

                $ext     = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
                $arr_ext = array('jpg', 'jpeg', 'gif', 'png', 'pdf'); //set allowed extensions

                //only process if the extension is valid
                if(in_array($ext, $arr_ext))
                {
                    //do the actual uploading of the file. First arg is the tmp name, second arg is
                    //where we are putting it
                    move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img' .DS. 'facturas' .DS. 'AppGastos' .DS. 'ga_factura' .DS. $file['name']);
                    //prepare the filename for database entry
                    $appGastoForm->ga_factura = $file['name'];
                    $appGastoForm->ga_factura_url = 'webroot/img' .DS. 'facturas' .DS. 'AppGastos' .DS. 'ga_factura';

                    $iva  = ($this->request->data['ga_base'] * $this->request->data['ga_iva']) / 100;
                    $irpf = ($this->request->data['ga_base'] * $this->request->data['ga_irpf']) / 100;
                    $des  = $this->request->data['ga_descuento'];
                    $bas  = $this->request->data['ga_base'];

                    $tot  = (( ($bas - $des) + $iva) - $irpf); 
                    $appGastoForm->ga_total = round($tot, 2, PHP_ROUND_HALF_UP);


                    if ($this->AppGastos->save($appGastoForm)) {

                        $this->loadComponent('Logging.Log');
                        $this->Log->info('RegBrouser', '[Gastos_Crear]', [], ['ip' => true, 'referer' => true]);

                        $this->Flash->success(__('Los datos del Gasto se han actualizado con éxito.'));
                        return $this->redirect(['action' => 'index']);
                    }
                }else {
                    $this->Flash->error(__('La extensión del archivo no es válida. Solo se permiten archivos tipo: jpg, jpeg, gif, png o pdf. Revisa la extensión y envía otra imagen con el formato correcto.'));
                }
            }else {
                $appGastoForm->ga_factura = 'sinfactura.pdf';
                $appGastoForm->ga_factura_url = 'webroot/img' .DS. 'facturas' .DS. 'AppGastos' .DS. 'ga_factura';

                $iva  = ($this->request->data['ga_base'] * $this->request->data['ga_iva']) / 100;
                $irpf = ($this->request->data['ga_base'] * $this->request->data['ga_irpf']) / 100;
                $des  = $this->request->data['ga_descuento'];
                $bas  = $this->request->data['ga_base'];

                $tot  = (( ($bas - $des) + $iva) - $irpf); 
                $appGastoForm->ga_total = round($tot, 2, PHP_ROUND_HALF_UP);
                if ($this->AppGastos->save($appGastoForm)) {
                    $this->Flash->success(__('Los datos del Gasto se han actualizado con éxito.'));

                    return $this->redirect(['action' => 'index']);
                }
            }
            //debug($this->request->getData());
        }
        $appProveedores = $this->AppGastos->AppProveedores->find('list', [
                                                'keyField' => 'id',
                                                'valueField' => 'pr_nombre'
                                                ]);
        $this->set(compact('appGastoForm', 'appProveedores'));

        $this->loadComponent('Logging.Log');
        $this->Log->info('RegBrouser', '[Gastos_Index]', [], ['ip' => true, 'referer' => true]);
    }

    /**
     * View method
     *
     * @param string|null $id App Gasto id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function ver($id = null)
    {
        $this->loadModel('AppGastos');
        $appGasto = $this->AppGastos->get($id, [
            'contain' => ['AppProveedores']
        ]);
        $this->set('appGasto', $appGasto);

        $this->loadComponent('Logging.Log');
        $this->Log->info('RegBrouser', '[Gastos_Ver]', ['id' => $id], ['ip' => true, 'referer' => true]);
    }

    /**
     * Edit method
     *
     * @param string|null $id App Gasto id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function editar($id = null)
    {
        $this->loadModel('AppGastos');
        $appGastoForm = $this->AppGastos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $appGastoForm = $this->AppGastos->patchEntity($appGastoForm, $this->request->getData());
            if ($this->AppGastos->save($appGastoForm)) {
                $this->Flash->success(__('Los datos del Gasto se han actualizado con éxito.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('No se han podido guardar los datos del Gasto. Si el fallo persiste por favor, ponte en contacto con los administradores del sistema.'));
        }
        $appProveedores = $this->AppGastos->AppProveedores->find('list', [
                                                'keyField' => 'id',
                                                'valueField' => 'pr_nombre'
                                                ]);
        $this->set(compact('appGastoForm', 'appProveedores'));

        $this->loadComponent('Logging.Log');
        $this->Log->info('RegBrouser', '[Gastos_Editar]', ['id' => $id], ['ip' => true, 'referer' => true]);
    }

    /**
     * InformesEjercicio method
     *
     * @param string|null $id App Gasto id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function informesEjercicio()
    {

    }

    /**
     * Delete method
     *
     * @param string|null $id App Gasto id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function borrar($id = null)
    {
        $this->loadModel('AppGastos');
        $this->request->allowMethod(['post', 'delete']);
        $appGasto = $this->AppGastos->get($id);
        if ($this->AppGastos->delete($appGasto)) {
            $this->Flash->success(__('El Gasto se ha borrado con éxito.'));
        } else {
            $this->Flash->error(__('No se ha podido borrar el Gasto. Si el fallo persiste por favor, ponte en contacto con los administradores del sistema.'));
        }

        $this->loadComponent('Logging.Log');
        $this->Log->info('RegBrouser', '[Gastos_Borrar]', ['id' => $id], ['ip' => true, 'referer' => true]);

        return $this->redirect(['action' => 'index']);
    }
}

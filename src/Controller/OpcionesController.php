<?php
/**
 * =====================================================================
 * Controlador de Opciones de la App
 * =====================================================================
 * @author    ComercialSEO GrupoAltaEmpresas S.L.
 * @copyright 2019 ComercialSEO Todos los derechos resevados
 * @link      https://www.comercialseo.es Projects
 * @version   CakePHP/CRM.dscs.es v-1.01
 * @since     3.7
 * @property  \App\Model\Table\AppOpcionesTable $AppOpciones
 * @method    \App\Model\Entity\AppOpcion[]|
 * =====================================================================
*/
namespace App\Controller;
use App\Controller\AppController;
use Cake\Event\Event;

/**
 * AppOpciones Controller
 *
 * @property \App\Model\Table\AppOpcionesTable $AppOpciones
 *
 * @method \App\Model\Entity\AppOpcione[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OpcionesController extends AppController
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
        if(isset($usuarioActual['us_rol']) && ($usuarioActual['us_rol'] == 'sa'))
        {
            if(in_array($this->request->getParam('action'), ['index', 'ver', 'crear', 'editar', 'borrar']))
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
        $this->loadModel('SettingsConfigurations');
        $appOpciones = $this->SettingsConfigurations->find('all');
        $appOpciones->Order( ['SettingsConfigurations.weight' => 'ASC'] );
        $this->set(compact('appOpciones'));

        $this->loadComponent('Logging.Log');
        $this->Log->info('RegBrouser', '[Opciones_Index]', [], ['ip' => true, 'referer' => true]);
    }

    /**
     * Editar method
     *
     * @param string|null $id App Opcione id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function editar($id = null)
    {
        $this->loadModel('SettingsConfigurations');
        $appOpcione = $this->SettingsConfigurations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $appOpcione = $this->SettingsConfigurations->patchEntity($appOpcione, $this->request->getData());
            if(!empty($this->request->data['logo']['name']))
            {
                $file = $this->request->data['logo']; //put the data into a var for easy use

                $ext     = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
                $arr_ext = array('jpg', 'jpeg', 'gif', 'png'); //set allowed extensions

                //only process if the extension is valid
                if(in_array($ext, $arr_ext))
                {
                    //do the actual uploading of the file. First arg is the tmp name, second arg is
                    //where we are putting it
                    move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img' .DS. 'logosistema' .DS. $file['name']);
                    //prepare the filename for database entry
                    $appOpcione->value = $file['name'];
                    if ($this->SettingsConfigurations->save($appOpcione)) {
                        $this->Flash->success(__('Los datos de la Opción se han actualizado con éxito.'));
                        return $this->redirect(['action' => 'index']);
                    }
                }else {
                    $this->Flash->error(__('La extensión de la imagen no es válida. Solo se permiten archivos tipo: jpg, jpeg, gif o png. Revisa la extensión y envía otra imagen con el formato correcto.'));
                }
            }else {

                if ($this->SettingsConfigurations->save($appOpcione)) {
                    $this->Flash->success(__('Los datos de la Opción se han actualizado con éxito.'));

                    return $this->redirect(['action' => 'index']);
                }
            }
            $this->Flash->error(__('No se han podido guardar los datos de la Opción. Si el fallo persiste por favor, ponte en contacto con los administradores del sistema.'));
        }
        $this->set(compact('appOpcione'));

        $this->loadComponent('Logging.Log');
        $this->Log->info('RegBrouser', '[Opciones_Editar]', ['id' => $id], ['ip' => true, 'referer' => true]);
    }
}

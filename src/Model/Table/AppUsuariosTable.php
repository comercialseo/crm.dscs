<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AppUsuarios Model
 *
 * @method \App\Model\Entity\AppUsuario get($primaryKey, $options = [])
 * @method \App\Model\Entity\AppUsuario newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AppUsuario[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AppUsuario|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AppUsuario|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AppUsuario patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AppUsuario[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AppUsuario findOrCreate($search, callable $callback = null, $options = [])
 */
class AppUsuariosTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('app_usuarios');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('AppClientes', [
            'foreignKey' => 'cl_app_usuarios_id',
        ]);

        $this->hasMany('AppAgedas', [
            'foreignKey' => 'app_usuario_id',
        ]);

        $this->belongsToMany('AppEquipos', [
            'foreignKey' => 'app_equipo_id',
            'joinType'   => 'INNER',
            'joinTable'  => 'app_usuarios_app_equipos'
        ]);

        $this->hasMany('AppEventos', [
            'foreignKey' => 'ev_app_usuarios_id',
        ]);

        $this->hasMany('AppFacturas', [
            'foreignKey' => 'fc_app_usuarios_id',
        ]);

        $this->addBehavior('Josegonzalez/Upload.Upload', [
            'us_foto' => [
                'path' => 'webroot{DS}img{DS}usuarios{DS}{model}{DS}{field}',
                'fields' => [
                    'dir' => 'us_foto_url'
                ],
            ],
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->notEmpty('id', 'create')
            ->add('id', 'unique', ['rule' => 'validateUnique', 'provider' => 'table', 'message' => __('Ya existe un id de usuario igual al que estás intentando introducir. Si el fallo persiste por favor, contacta con un administrador del sistema.')]);

        $validator
            ->scalar('us_usuario')
            ->requirePresence('us_usuario', 'create')
            ->notEmpty('us_usuario', __('El nombre de usuario es necesario...'))
            ->add('us_usuario', 'unique', ['rule' => 'validateUnique', 'provider' => 'table', 'message' => __('El nombre de usuario ya existe, por favor escoge otro distinto...')])
            ->add('us_usuario', [
                'minLength' => [
                    'rule' => ['minLength', 4],
                    'last' => true,
                    'message' => __('Este campo tiene que tener más de 4 caracteres...')
                ],
                'maxLength' => [
                    'rule' => ['maxLength', 50],
                    'message' => __('Este campo puede contener un máximo de 50 caracteres...')
                ]
            ]);

        $validator
            ->scalar('us_password')
            ->requirePresence('us_password', 'create')
            ->notEmpty('us_password', __('El password de acceso es necesario...'), 'create')
            ->add('us_password', [
                            'minLength' => [
                                'rule' => ['minLength', 6],
                                'message' => __('Escribe un password de al menos 6 caracteres...'),
                            ],
                            'maxLength' => [
                                'rule' => ['maxLength', 15],
                                'message' => __('Escribe un password de un máximo de 15 caracteres...'),
                            ]
            ]);

        $validator
            ->scalar('us_email')
            ->requirePresence('us_email', 'create')
            ->notEmpty('us_email', __('El email es necesario...'))
            ->add('us_email', 'unique', ['rule' => 'validateUnique', 'provider' => 'table', 'message' => __('El email ya existe en la base de datos, por favor intenta recuperar tu password de acceso...')])   
            ->add('us_email', 'email', ['rule' => 'email', 'message' => __('La dirección de email no es válida')])
            ->add('us_email', [
                'maxLength' => [
                    'rule' => ['maxLength', 120],
                    'message' => __('Este campo puede contener un máximo de 120 caracteres...')
                ]
            ]);


        $validator
            ->scalar('us_nombre')
            ->allowEmpty('us_nombre')
            ->add('us_nombre', [
                            'length' => [
                                'rule' => ['minLength', 3],
                                'message' => __('Escribe un password de al menos 3 caracteres...'),
                            ],
                            'length' => [
                                'rule' => ['maxLength', 50],
                                'message' => __('Escribe un password de un máximo de 50 caracteres...'),
                            ]
            ]);

        $validator
            ->scalar('us_apellidos')
            ->allowEmpty('us_apellidos')
            ->add('us_apellidos', [
                            'length' => [
                                'rule' => ['minLength', 3],
                                'message' => __('Escribe un password de al menos 3 caracteres...'),
                            ],
                            'length' => [
                                'rule' => ['maxLength', 50],
                                'message' => __('Escribe un password de un máximo de 50 caracteres...'),
                            ]
            ]);

        $validator
            ->scalar('us_rol')
            ->requirePresence('us_rol', 'create')
            ->notEmpty('us_rol', 'El tipo de cuenta es necesaria...')
            ->add('us_rol', 'inList', [
                'rule' => ['inList', ['sa', 'ad', 'ed', 'au', 'us']],
                'message' => __('Ingresa un tipo de cuenta válida, no intentes engañar a la máquina...')
            ]);

        $validator
            ->boolean('us_valido')
            ->requirePresence('us_valido', 'create')
            ->notEmpty('us_valido');

        $validator
            ->allowEmpty('us_foto');

        $validator
            ->allowEmpty('us_foto_url');

        $validator
            ->dateTime('us_creacion')
            ->allowEmpty('us_creacion');

        $validator
            ->dateTime('us_modificacion')
            ->allowEmpty('us_modificacion');  

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['us_usuario']));
        $rules->add($rules->isUnique(['us_email']));

        return $rules;
    }

    /**
     * Método find[Sesiondatosautorizados] para permitir el acceso a
     * usuarios con perfil validado.
     * Retorna los datos de sesión (select)
     * @param  \Cake\ORM\Query $query LLamada al ORM del cake para generar la consulta
     * @param  $options Arreglo con opciones de consulta
     * @return $query con los datos de la consulta
     */
    public function findSesionadminsautorizados($query, array $options)
    {
        $query 
            ->select(['id', 'us_usuario', 'us_password', 'us_rol'])
            ->where(['AppUsuarios.us_valido' => true]);
        return $query;
    }
    /**
     * Método recuperarPassword[idUsuario] para permitir el acceso al
     * passwprd del usuario logueado.
     * Retorna los datos de sesión (select)
     * @param  $id Arreglo con opciones de consulta
     * @return $usuario con su password
     */
    public function recuperarPassword($id) 
    {
        $usuario = $this->get($id);
        return $usuario->us_password;
    }
    /**
     * Método (evento) beforeDelete[idUsuario] para filtrar las 
     * acciones antes de eliminar.
     * @param  $id Arreglo con opciones de consulta
     * @return $usuario con su password
     */
    public function beforeDelete($event, $entity, $options) 
    {
        //exit ('Antes de eliminar'); 
        if($entity->role === 'sa')
        {
            return false;
        }
        return true;
    }
}

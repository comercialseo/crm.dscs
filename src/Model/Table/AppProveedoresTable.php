<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AppProveedores Model
 *
 * @property \App\Model\Table\AppProveedoresTiposTable|\Cake\ORM\Association\BelongsTo $AppProveedoresTipos
 *
 * @method \App\Model\Entity\AppProveedore get($primaryKey, $options = [])
 * @method \App\Model\Entity\AppProveedore newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AppProveedore[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AppProveedore|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AppProveedore|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AppProveedore patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AppProveedore[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AppProveedore findOrCreate($search, callable $callback = null, $options = [])
 */
class AppProveedoresTable extends Table
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

        $this->setTable('app_proveedores');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('AppProveedoresTipos', [
            'foreignKey' => 'app_proveedores_tipo_id',
            'joinType' => 'INNER'
        ]);

        $this->hasMany('AppGastos', [
            'foreignKey' => 'app_proveedores_id',
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
            ->add('id', 'unique', ['rule' => 'validateUnique', 'provider' => 'table', 'message' => __('Ya existe un id de proveedor igual al que estás intentando introducir. Si el fallo persiste por favor, contacta con un administrador del sistema.')]);


        $validator
            ->scalar('pr_nombre')
            ->minLength('pr_nombre', 3, __('Ha de contener más de 3 caracteres'))
            ->maxLength('pr_nombre', 50, __('No puede contener más de 50 caracteres'))
            ->requirePresence('pr_nombre', 'create')
            ->notEmpty('pr_nombre', __('Tienes que rellenar este campo...'))
            ->add('pr_nombre', 'unique', ['rule' => 'validateUnique', 'provider' => 'table', 'message' => __('Ya existe un proveedor igual al que estás intentando introducir. Si el fallo persiste por favor, contacta con un administrador del sistema.')]);

        $validator
            ->scalar('pr_direccion')
            ->minLength('pr_direccion', 3, __('Ha de contener más de 3 caracteres'))
            ->maxLength('pr_direccion', 90, __('No puede contener más de 90 caracteres'))
            ->allowEmpty('pr_direccion');

        $validator
            ->integer('pr_codigo_postal')
            ->allowEmpty('pr_codigo_postal');

        $validator
            ->scalar('pr_poblacion')
            ->minLength('pr_poblacion', 3, __('Ha de contener más de 3 caracteres'))
            ->maxLength('pr_poblacion', 50, __('No puede contener más de 50 caracteres'))
            ->allowEmpty('pr_poblacion');

        $validator
            ->scalar('pr_provincia')
            ->allowEmpty('pr_provincia');

        $validator
            ->integer('pr_telefono_princ')
            ->minLength('pr_telefono_princ', 9, __('Ha de contener más de 9 caracteres'))
            ->maxLength('pr_telefono_princ', 10, __('No puede contener más de 10 caracteres'))
            ->requirePresence('pr_telefono_princ', 'create')
            ->notEmpty('pr_telefono_princ', __('Tienes que rellenar este campo...'));

        $validator
            ->integer('pr_telefono_secun')
            ->minLength('pr_telefono_secun', 9, __('Ha de contener más de 9 caracteres'))
            ->maxLength('pr_telefono_secun', 10, __('No puede contener más de 10 caracteres'))
            ->allowEmpty('pr_telefono_secun');

        $validator
            ->scalar('pr_email')
            ->minLength('pr_email', 3, __('Ha de contener más de 3 caracteres'))
            ->maxLength('pr_email', 70, __('No puede contener más de 70 caracteres'))
            ->allowEmpty('pr_email')
            ->add('pr_email', 'email', ['rule' => 'email', 'message' => __('La dirección de email no es válida')]);

        $validator
            ->scalar('pr_web')
            ->minLength('pr_web', 3, __('Ha de contener más de 3 caracteres'))
            ->maxLength('pr_web', 100, __('No puede contener más de 70 caracteres'))
            ->url('pr_web', __('La url no es válida, tiene que comenzar por http:// o https://'))
            ->allowEmpty('pr_web');

        $validator
            ->scalar('pr_comentario')
            ->minLength('pr_comentario', 5, __('Ha de contener más de 5 caracteres'))
            ->allowEmpty('pr_comentario');

        $validator
            ->dateTime('pr_creacion')
            ->allowEmpty('pr_creacion');

        $validator
            ->dateTime('pr_modificacion')
            ->allowEmpty('pr_modificacion');

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
        $rules->add($rules->isUnique(['pr_nombre']));
        $rules->add($rules->existsIn(['app_proveedores_tipo_id'], 'AppProveedoresTipos'));

        return $rules;
    }
}

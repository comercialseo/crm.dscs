<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AppClientesNegocios Model
 *
 * @property \App\Model\Table\AppClientesNegociosSectoresTable|\Cake\ORM\Association\BelongsTo $AppClientesNegociosSectores
 * @property \App\Model\Table\AppClientesTable|\Cake\ORM\Association\BelongsTo $AppClientes
 *
 * @method \App\Model\Entity\AppClientesNegocio get($primaryKey, $options = [])
 * @method \App\Model\Entity\AppClientesNegocio newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AppClientesNegocio[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AppClientesNegocio|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AppClientesNegocio|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AppClientesNegocio patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AppClientesNegocio[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AppClientesNegocio findOrCreate($search, callable $callback = null, $options = [])
 */
class AppClientesNegociosTable extends Table
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

        $this->setTable('app_clientes_negocios');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('AppClientesNegociosSectores', [
            'foreignKey' => 'app_cliente_negocio_sector_id',
            'joinType' => 'INNER'
        ]);

        $this->belongsTo('AppClientes', [
            'foreignKey' => 'app_clientes_id',
            'joinType' => 'INNER'
        ]);

        $this->hasMany('AppFacturasLineas', [
            'foreignKey' => 'fl_negocios_id',
        ]);

        $this->hasMany('AppFacturas', [
            'foreignKey' => 'fc_app_negocios_id',
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
            ->allowEmpty('id', 'create')
            ->add('id', 'unique', ['rule' => 'validateUnique', 'provider' => 'table', 'message' => __('Ya existe un id de negocio de cliente igual al que estás intentando introducir. Si el fallo persiste por favor, contacta con un administrador del sistema.')]);

        $validator
            ->scalar('cn_tipo')
            ->requirePresence('cn_tipo', 'create')
            ->inList('cn_tipo', ['py', 'em', 'mn', 'au'], __('Tienes que elegir un valor de la lista'))
            ->notEmpty('cn_tipo', __('Tienes que rellenar este campo'));

        $validator
            ->scalar('cn_razon_social')
            ->minLength('cn_razon_social', 3, __('Ha de contener más de 3 caracteres'))
            ->maxLength('cn_razon_social', 90, __('No puede contener más de 90 caracteres'))
            ->requirePresence('cn_razon_social', 'create')
            ->notEmpty('cn_razon_social', __('Tienes que rellenar este campo'))
            ->add('cn_razon_social', 'unique', ['rule' => 'validateUnique', 'provider' => 'table', 'message' => __('Ya existe un negocio con esta razón social igual a la que estás intentando introducir. Si el fallo persiste por favor, contacta con un administrador del sistema.')]);

        $validator
            ->scalar('cn_cif_nif')
            ->minLength('cn_cif_nif', 9, __('Ha de contener más de 9 caracteres'))
            ->maxLength('cn_cif_nif', 10, __('No puede contener más de 10 caracteres'))
            ->requirePresence('cn_cif_nif', 'create')
            ->notEmpty('cn_cif_nif', __('Tienes que rellenar este campo'))
            ->add('cn_cif_nif', 'unique', ['rule' => 'validateUnique', 'provider' => 'table', 'message' => __('Ya existe un NIF/CIF de negocio de cliente igual al que estás intentando introducir. Si el fallo persiste por favor, contacta con un administrador del sistema.')]);

        $validator
            ->scalar('cn_direccion')
            ->minLength('cn_cif_nif', 9, __('Ha de contener más de 9 caracteres'))
            ->maxLength('cn_direccion', 70, __('No puede contener más de 70 caracteres'))
            ->requirePresence('cn_direccion', 'create')
            ->notEmpty('cn_direccion', __('Tienes que rellenar este campo'));

        $validator
            ->integer('cn_codigo_postal')
            ->requirePresence('cn_codigo_postal', 'create')
            ->maxLength('cn_codigo_postal', 70, __('No puede contener más de 5 caracteres'))
            ->notEmpty('cn_codigo_postal', __('Tienes que rellenar este campo'));

        $validator
            ->scalar('cn_poblacion')
            ->minLength('cn_poblacion', 3, __('Ha de contener más de 3 caracteres'))
            ->maxLength('cn_poblacion', 50, __('No puede contener más de 50 caracteres'))
            ->requirePresence('cn_poblacion', 'create')
            ->notEmpty('cn_poblacion', __('Tienes que rellenar este campo'));

        $validator
            ->scalar('cn_provincia')
            ->requirePresence('cn_provincia', 'create')
            ->notEmpty('cn_provincia', __('Tienes que rellenar este campo'));

        $validator
            ->scalar('cn_gerente')
            ->minLength('cn_gerente', 3, __('Ha de contener más de 3 caracteres'))
            ->maxLength('cn_gerente', 30, __('No puede contener más de 30 caracteres'))
            ->allowEmpty('cn_gerente');

        $validator
            ->integer('cn_telefono_princ')
            ->requirePresence('cn_telefono_princ', 'create')
            ->maxLength('cn_telefono_princ', 10, __('No puede contener más de 10 caracteres'))
            ->notEmpty('cn_telefono_princ', __('Tienes que rellenar este campo'));

        $validator
            ->integer('cn_telefono_secun')
            ->maxLength('cn_telefono_secun', 10, __('No puede contener más de 10 caracteres'))
            ->allowEmpty('cn_telefono_secun');

        $validator
            ->scalar('cn_email')            
            ->requirePresence('cn_email', 'create')
            ->maxLength('cn_email', 70, __('No puede contener más de 70 caracteres'))
            ->notEmpty('cn_email', __('Tienes que rellenar este campo'))
            ->add('cn_email', 'unique', ['rule' => 'validateUnique', 'provider' => 'table'], __('Ya existe un negocio con el mismo email, tienes que escribir una dirección de correo electrónico distinta'))
            ->add('cn_email', 'email', ['rule' => 'email', 'message' => __('La dirección de email no es válida')]);

        $validator
            ->scalar('cn_web')
            ->minLength('cn_web', 3, __('Ha de contener más de 3 caracteres'))
            ->maxLength('cn_web', 100, __('No puede contener más de 70 caracteres'))
            ->url('cn_web', __('La url no es válida, tiene que comenzar por http:// o https://'))
            ->allowEmpty('cn_web');

        $validator
            ->scalar('cn_comentario')
            ->requirePresence('cn_comentario', 'create')
            ->allowEmpty('cn_comentario');

        $validator
            ->dateTime('cn_creacion')
            ->allowEmpty('cn_creacion');

        $validator
            ->dateTime('cn_modificacion')
            ->allowEmpty('cn_modificacion');

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
        $rules->add($rules->isUnique(['cn_cif_nif']));
        $rules->add($rules->isUnique(['cn_email']));
        $rules->add($rules->isUnique(['cn_razon_social']));
        $rules->add($rules->existsIn(['app_cliente_negocio_sector_id'], 'AppClientesNegociosSectores'));
        $rules->add($rules->existsIn(['app_clientes_id'], 'AppClientes'));

        return $rules;
    }
}

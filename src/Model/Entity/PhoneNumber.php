<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PhoneNumber Entity
 *
 * @property int $id
 * @property int $entity_type
 * @property int $entity_id
 * @property string $phone_num
 * @property \Cake\I18n\Time $created
 * @property bool $is_deleted
 *
 * @property \App\Model\Entity\Entity $entity
 */
class PhoneNumber extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}

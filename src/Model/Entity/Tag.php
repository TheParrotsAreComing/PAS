<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Tag Entity
 *
 * @property int $id
 * @property string $label
 * @property string $color
 * @property int $type_bit
 * @property bool $is_deleted
 *
 * @property \App\Model\Entity\Adopter[] $adopters
 * @property \App\Model\Entity\Cat[] $cats
 * @property \App\Model\Entity\Foster[] $fosters
 */
class Tag extends Entity
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

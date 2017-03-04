<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CatHistory Entity
 *
 * @property int $id
 * @property int $cat_id
 * @property int $adopter_id
 * @property int $foster_id
 * @property \Cake\I18n\Time $start_date
 * @property \Cake\I18n\Time $end_date
 *
 * @property \App\Model\Entity\Cat $cat
 * @property \App\Model\Entity\Adopter $adopter
 * @property \App\Model\Entity\Foster $foster
 */
class CatHistory extends Entity
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

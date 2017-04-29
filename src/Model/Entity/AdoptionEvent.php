<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * AdoptionEvent Entity
 *
 * @property int $id
 * @property \Cake\I18n\Time $event_date
 * @property string $description
 * @property bool $is_deleted
 *
 * @property \App\Model\Entity\UsersEvent[] $users_events
 * @property \App\Model\Entity\Cat[] $cats
 */
class AdoptionEvent extends Entity
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

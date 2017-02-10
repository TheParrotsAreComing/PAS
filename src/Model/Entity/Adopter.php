<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Adopter Entity
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $phone
 * @property int $cat_count
 * @property string $address
 * @property string $email
 * @property string $notes
 * @property \Cake\I18n\Time $created
 * @property bool $is_deleted
 *
 * @property \App\Model\Entity\CatHistory[] $cat_histories
 * @property \App\Model\Entity\Cat[] $cats
 * @property \App\Model\Entity\Tag[] $tags
 */
class Adopter extends Entity
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

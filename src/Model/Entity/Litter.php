<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Litter Entity
 *
 * @property int $id
 * @property int $kc_ref_id
 * @property string $litter_name
 * @property int $the_cat_count
 * @property int $kitten_count
 * @property \Cake\I18n\Time $dob
 * @property \Cake\I18n\Time $asn_start
 * @property \Cake\I18n\Time $asn_end
 * @property string $est_arrival
 * @property string $breed
 * @property string $foster_notes
 * @property string $notes
 * @property \Cake\I18n\Time $created
 * @property bool $is_deleted
 *
 * @property \App\Model\Entity\KcRef $kc_ref
 * @property \App\Model\Entity\Cat[] $cats
 */
class Litter extends Entity
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

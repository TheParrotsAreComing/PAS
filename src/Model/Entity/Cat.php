<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Cat Entity
 *
 * @property int $id
 * @property int $litter_id
 * @property int $adopter_id
 * @property int $foster_id
 * @property string $cat_name
 * @property string $is_kitten
 * @property \Cake\I18n\Time $dob
 * @property string $is_female
 * @property string $breed
 * @property string $bio
 * @property string $caretaker_notes
 * @property string $medical_notes
 * @property int $profile_pic_file_id
 * @property int $microchip_number
 * @property \Cake\I18n\Time $microchiped_date
 * @property \Cake\I18n\Time $created
 * @property bool $adoption_fee_paid
 * @property bool $is_deleted
 *
 * @property \App\Model\Entity\Litter $litter
 * @property \App\Model\Entity\Adopter $adopter
 * @property \App\Model\Entity\Foster $foster
 * @property \App\Model\Entity\File $file
 * @property \App\Model\Entity\CatHistory[] $cat_histories
 * @property \App\Model\Entity\AdoptionEvent[] $adoption_events
 * @property \App\Model\Entity\Tag[] $tags
 */
class Cat extends Entity
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

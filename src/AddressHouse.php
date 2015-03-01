<?php
/**
 * @author Petr Grishin <petr.grishin@grishini.ru>
 */

namespace PetrGrishin\Fias\Entity;


/**
 * @property string id
 * @property string houseId
 * @property string parentId
 * @property string number
 * @property string building
 * @property string structure
 * @property string okato
 * @property string oktmo
 * @property integer postalCode
 */
class AddressHouse extends ActiveRecord {

    public function tableName() {
        return 'fias_address_house';
    }

    public function rules() {
        return array(
            array('id, houseId, parentId, number, building, structure, okato, oktmo, postalCode', 'safe'),
        );
    }

    public function getAddressLine() {
        $result = sprintf('д. %s', $this->number);
        $this->building && $result .= sprintf(', к. %s', $this->building);
        $this->structure && $result .= sprintf(', с. %s', $this->structure);
        return $result;
    }

    public function getData() {
        return array(
            'number' => $this->number,
            'building' => $this->building,
            'structure' => $this->structure,
            'okato' => $this->okato,
            'oktmo' => $this->oktmo,
            'postalCode' => $this->postalCode,
            'guid' => $this->houseId,
        );
    }
}

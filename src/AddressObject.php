<?php
/**
 * @author Petr Grishin <petr.grishin@grishini.ru>
 */

namespace PetrGrishin\Fias\Entity;


/**
 * @property string id
 * @property string addressId
 * @property string parentId
 * @property integer level
 * @property string title
 * @property string prefix
 * @property string oktmo
 * @property integer postalCode
 * @property integer region
 */
class AddressObject extends ActiveRecord {
    /** @var AddressObject|null|false */
    private $parent = false;
    private $prefixAliases = array(
        'обл' => 'обл.',
        'г' => 'г.',
        'ул' => 'ул.',
        'пер' => 'пер.',
        'пл' => 'пл.',
        'ш' => 'ш.',
        'д' => 'д.',
        'с' => 'с.',
        'к' => 'к.',
        'ал' => 'ал.',
        'тер' => 'тер.',
        'гск' => 'гск.',
        'снт' => 'снт.',
    );

    public function tableName() {
        return 'fias_address_object';
    }

    public function rules() {
        return array(
            array('id, addressId, parentId, level, title, prefix, postalCode, region, oktmo', 'safe'),
        );
    }

    /**
     * @return AddressObject|null
     */
    public function getParent() {
        if ($this->parent === false) {
            $this->parent = $this->parentId ? static::model()->findByAttributes(array('addressId' => $this->parentId)) : null;
        }
        return $this->parent;
    }

    public function getAddressLine($delimiter = ', ') {
        $addressParts = array();
        $addressParts[] = $this->getTitleWithPrefix();
        $parent = $this->getParent();
        while ($parent) {
            $addressParts[] = $parent->getTitleWithPrefix();
            $parent = $parent->getParent();
        }
        return implode($delimiter, array_reverse($addressParts));
    }

    public function getTitleWithPrefix() {
        $prefix = $this->prefix;
        if (array_key_exists($prefix, $this->prefixAliases)) {
            $prefix = $this->prefixAliases[$prefix];
        }
        return sprintf('%s %s', $prefix, $this->title);
    }

    public function getData() {
        $results = array();
        $results[] = $this->_getAttributes($this);
        $parent = $this->getParent();
        while ($parent) {
            $results[] = $this->_getAttributes($parent);
            $parent = $parent->getParent();
        }
        return array_reverse($results);
    }

    private function _getAttributes(AddressObject $addressObject) {
        return array(
            'title' => $addressObject->getTitleWithPrefix(),
            'level' => $addressObject->getLevelToString(),
            'levelId' => $addressObject->level,
            'regionId' => $addressObject->region,
            'postalCode' => $this->postalCode,
            'guid' => $addressObject->addressId,
        );
    }

    private function getLevelToString() {
        $label = array(
            1 => 'Регион',
            2 => 'Округ',
            3 => 'Район округа',
            4 => 'Город',
            5 => 'Район города',
            6 => 'Населенный пункт',
            7 => 'Улица',
            90 => 'Дополнительная территория',
            91 => 'Часть дополнительной территории',
        );
        return array_key_exists($this->level, $label) ? $label[$this->level] : null;
    }
}
 
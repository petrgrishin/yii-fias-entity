<?php

class m141007_125740_create_house_table extends CDbMigration {
    const TABLE_NAME = 'fias_address_house';

    public function safeUp() {
        $this->createTable(self::TABLE_NAME, array(
            'id' => 'VARCHAR(36) NOT NULL PRIMARY KEY',
            'houseId' => 'VARCHAR(36) NOT NULL',
            'parentId' => 'VARCHAR(36) NOT NULL',
            'number' => 'VARCHAR(20)',
            'building' => 'VARCHAR(120)',
            'structure' => 'VARCHAR(120)',
            'okato' => 'VARCHAR(11)',
            'oktmo' => 'VARCHAR(11)',
            'postalCode' => 'integer',
        ));
    }

    public function safeDown() {
        $this->delete(self::TABLE_NAME);
    }
}
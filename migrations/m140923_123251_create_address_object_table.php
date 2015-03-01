<?php

class m140923_123251_create_address_object_table extends CDbMigration {
    const TABLE_NAME = 'fias_address_object';

    public function safeUp() {
        $this->createTable(self::TABLE_NAME, array(
            'id' => 'VARCHAR(36) NOT NULL PRIMARY KEY',
            'addressId' => 'VARCHAR(36) NOT NULL',
            'parentId' => 'VARCHAR(36) DEFAULT NULL',
            'level' => 'integer',
            'title' => 'VARCHAR(120)',
            'prefix' => 'VARCHAR(10)',
            'postalCode' => 'integer',
            'region' => 'integer',
        ));
    }

    public function safeDown() {
        $this->dropTable(self::TABLE_NAME);
    }
}
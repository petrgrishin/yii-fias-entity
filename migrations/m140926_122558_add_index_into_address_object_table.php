<?php

class m140926_122558_add_index_into_address_object_table extends CDbMigration {
    const TABLE_NAME = 'fias_address_object';

    public function safeUp() {
        $this->createIndex('addressId', self::TABLE_NAME, 'addressId');
    }

    public function safeDown() {
        $this->dropIndex('addressId', self::TABLE_NAME);
    }
}
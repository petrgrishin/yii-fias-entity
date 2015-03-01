<?php

class m141007_140509_add_index_into_house_table extends CDbMigration {
    const TABLE_NAME = 'fias_address_house';

    public function safeUp() {
        $this->createIndex('parentId', self::TABLE_NAME, 'parentId');
    }

    public function safeDown() {
        $this->dropIndex('parentId', self::TABLE_NAME);
    }
}
<?php

class m141003_114031_add_index_into_address_object_table extends CDbMigration {
    const TABLE_NAME = 'fias_address_object';

    public function safeUp() {
        $this->createIndex('parentId_title', self::TABLE_NAME, 'parentId, title');
    }

    public function safeDown() {
        $this->dropIndex('parentId_title', self::TABLE_NAME);
    }
}
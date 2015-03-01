<?php

class m140925_113302_add_index_into_address_object_table extends CDbMigration {
    const TABLE_NAME = 'fias_address_object';

    public function safeUp() {
        $this->createIndex('parentId', self::TABLE_NAME, 'parentId');
        $this->createIndex('level_title', self::TABLE_NAME, 'level, title');
        $this->createIndex('title', self::TABLE_NAME, 'title');
    }

    public function safeDown() {
        $this->dropIndex('parentId', self::TABLE_NAME);
        $this->dropIndex('level_title', self::TABLE_NAME);
        $this->dropIndex('title', self::TABLE_NAME);
    }
}
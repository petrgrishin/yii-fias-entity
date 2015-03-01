<?php

class m141003_111210_add_index_into_address_object_table extends CDbMigration {
    const TABLE_NAME = 'fias_address_object';

    public function safeUp() {
        $this->createIndex('level_parentId_title', self::TABLE_NAME, 'level, parentId, title');
    }

    public function safeDown() {
        $this->dropIndex('level_parentId_title', self::TABLE_NAME);
    }
}
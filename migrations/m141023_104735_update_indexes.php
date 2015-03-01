<?php

class m141023_104735_update_indexes extends CDbMigration {
    const TABLE_NAME = 'fias_address_house';

    public function safeUp() {
        $this->createIndex('parentId_number_building_structure', self::TABLE_NAME, 'parentId, number, building, structure');
    }

    public function safeDown() {
        $this->dropIndex('parentId_number_building_structure', self::TABLE_NAME);
    }
}
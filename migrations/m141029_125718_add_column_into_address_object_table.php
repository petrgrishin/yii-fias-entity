<?php

class m141029_125718_add_column_into_address_object_table extends CDbMigration {
    const TABLE_NAME = 'fias_address_object';

    public function safeUp() {
        $this->addColumn(self::TABLE_NAME, 'oktmo', 'VARCHAR(11)');

    }

    public function safeDown() {
        $this->dropColumn(self::TABLE_NAME, 'oktmo');
    }
}
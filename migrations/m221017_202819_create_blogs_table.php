<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%blogs}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%users}}`
 */
class m221017_202819_create_blogs_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%blogs}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255),
            'body' => $this->text(),
            'created_by' => $this->integer(11),
            'created_at' => $this->integer(11),
            'updated_at' => $this->integer(11),
            
        ]);

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-blogs-created_by}}',
            '{{%blogs}}',
            'created_by'
        );

        // add foreign key for table `{{%users}}`
        $this->addForeignKey(
            '{{%fk-blogs-created_by}}',
            '{{%blogs}}',
            'created_by',
            '{{%users}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%users}}`
        $this->dropForeignKey(
            '{{%fk-blogs-created_by}}',
            '{{%blogs}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-blogs-created_by}}',
            '{{%blogs}}'
        );

        $this->dropTable('{{%blogs}}');
    }
}

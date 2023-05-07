<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%prdt_category}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%perent}}`
 */
class m230504_194943_create_prdt_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%prdt_category}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            // 'perent_id' => $this->integer(),
            'image' => $this->string(),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
        ]);

        // // creates index for column `perent_id`
        // $this->createIndex(
        //     '{{%idx-prdt_category-perent_id}}',
        //     '{{%prdt_category}}',
        //     'perent_id'
        // );

        // // add foreign key for table `{{%perent}}`
        // $this->addForeignKey(
        //     '{{%fk-prdt_category-perent_id}}',
        //     '{{%prdt_category}}',
        //     'perent_id',
        //     '{{%prdt_category}}',
        //     'id',
        //     'CASCADE'
        // );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // // drops foreign key for table `{{%perent}}`
        // $this->dropForeignKey(
        //     '{{%fk-prdt_category-perent_id}}',
        //     '{{%prdt_category}}'
        // );

        // // drops index for column `perent_id`
        // $this->dropIndex(
        //     '{{%idx-prdt_category-perent_id}}',
        //     '{{%prdt_category}}'
        // );

        $this->dropTable('{{%prdt_category}}');
    }
}

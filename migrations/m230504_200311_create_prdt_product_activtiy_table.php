<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%prdt_product_activity}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%prdt_product}}`
 */
class m230504_200311_create_prdt_product_activtiy_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%prdt_product_activity}}', [
            'id' => $this->primaryKey(),
            'prdt_product_id' => $this->integer()->notNull(),
            'action' => $this->integer(),
            'count' => $this->integer(),
            'status' => $this->integer(),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
        ]);

        // creates index for column `prdt_product_id`
        $this->createIndex(
            '{{%idx-prdt_product_activity-prdt_product_id}}',
            '{{%prdt_product_activity}}',
            'prdt_product_id'
        );

        // add foreign key for table `{{%prdt_product}}`
        $this->addForeignKey(
            '{{%fk-prdt_product_activity-prdt_product_id}}',
            '{{%prdt_product_activity}}',
            'prdt_product_id',
            '{{%prdt_product}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%prdt_product}}`
        $this->dropForeignKey(
            '{{%fk-prdt_product_activity-prdt_product_id}}',
            '{{%prdt_product_activity}}'
        );

        // drops index for column `prdt_product_id`
        $this->dropIndex(
            '{{%idx-prdt_product_activity-prdt_product_id}}',
            '{{%prdt_product_activity}}'
        );

        $this->dropTable('{{%prdt_product_activity}}');
    }
}

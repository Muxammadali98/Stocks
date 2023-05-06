<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%prdt_product}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%prdt_category}}`
 * - `{{%prdt_brand}}`
 */
class m230504_195119_create_prdt_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%prdt_product}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'prdt_category_id' => $this->integer()->notNull(),
            'core_stock_id' => $this->integer()->notNull(),
            'artikul' => $this->float(),
            'description' => $this->text(),
            'orginal_price' => $this->float(),
            'price' => $this->float(),
            'count' => $this->integer(),
            'discount' => $this->float(),
            'prdt_brand_id' => $this->integer()->notNull(),
            'created_at' => $this->timestamp(),
            'updated_at' => $this->timestamp(),
        ]);

        // creates index for column `prdt_categoryy_id`
        $this->createIndex(
            '{{%idx-prdt_product-prdt_categoryy_id}}',
            '{{%prdt_product}}',
            'prdt_category_id'
        );

        // add foreign key for table `{{%prdt_category}}`
        $this->addForeignKey(
            '{{%fk-prdt_product-prdt_category_id}}',
            '{{%prdt_product}}',
            'prdt_category_id',
            '{{%prdt_category}}',
            'id',
            'CASCADE'
        );

        // creates index for column `prdt_brand_id`
        $this->createIndex(
            '{{%idx-prdt_product-prdt_brand_id}}',
            '{{%prdt_product}}',
            'prdt_brand_id'
        );

        // add foreign key for table `{{%prdt_brand}}`
        $this->addForeignKey(
            '{{%fk-prdt_product-prdt_brand_id}}',
            '{{%prdt_product}}',
            'prdt_brand_id',
            '{{%prdt_brand}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%prdt_category}}`
        $this->dropForeignKey(
            '{{%fk-prdt_product-prdt_category_id}}',
            '{{%prdt_product}}'
        );

        // drops index for column `prdt_category_id`
        $this->dropIndex(
            '{{%idx-prdt_product-prdt_category_id}}',
            '{{%prdt_product}}'
        );

        // drops foreign key for table `{{%prdt_brand}}`
        $this->dropForeignKey(
            '{{%fk-prdt_product-prdt_brand_id}}',
            '{{%prdt_product}}'
        );

        // drops index for column `prdt_brand_id`
        $this->dropIndex(
            '{{%idx-prdt_product-prdt_brand_id}}',
            '{{%prdt_product}}'
        );

        $this->dropTable('{{%prdt_product}}');
    }
}

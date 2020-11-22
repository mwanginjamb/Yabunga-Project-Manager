<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%bidder}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%bid}}`
 * - `{{%user}}`
 * - `{{%user}}`
 */
class m201121_215903_create_bidder_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%bidder}}', [
            'id' => $this->primaryKey(),
            'bid_id' => $this->integer()->notNull(),
            'offer_price' => $this->float()->notNull(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        // creates index for column `bid_id`
        $this->createIndex(
            '{{%idx-bidder-bid_id}}',
            '{{%bidder}}',
            'bid_id'
        );

        // add foreign key for table `{{%bid}}`
        $this->addForeignKey(
            '{{%fk-bidder-bid_id}}',
            '{{%bidder}}',
            'bid_id',
            '{{%bid}}',
            'id',
            'CASCADE'
        );

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-bidder-created_by}}',
            '{{%bidder}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-bidder-created_by}}',
            '{{%bidder}}',
            'created_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `updated_by`
        $this->createIndex(
            '{{%idx-bidder-updated_by}}',
            '{{%bidder}}',
            'updated_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-bidder-updated_by}}',
            '{{%bidder}}',
            'updated_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%bid}}`
        $this->dropForeignKey(
            '{{%fk-bidder-bid_id}}',
            '{{%bidder}}'
        );

        // drops index for column `bid_id`
        $this->dropIndex(
            '{{%idx-bidder-bid_id}}',
            '{{%bidder}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-bidder-created_by}}',
            '{{%bidder}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-bidder-created_by}}',
            '{{%bidder}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-bidder-updated_by}}',
            '{{%bidder}}'
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            '{{%idx-bidder-updated_by}}',
            '{{%bidder}}'
        );

        $this->dropTable('{{%bidder}}');
    }
}

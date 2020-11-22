<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%bid}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%job}}`
 * - `{{%user}}`
 * - `{{%user}}`
 */
class m201121_215644_create_bid_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%bid}}', [
            'id' => $this->primaryKey(),
            'job_id' => $this->integer(),
            'bid_price' => $this->float()->notNULL(),
            'startdate' => $this->integer(),
            'enddate' => $this->integer(),
            'max_no_of_bids' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        // creates index for column `job_id`
        $this->createIndex(
            '{{%idx-bid-job_id}}',
            '{{%bid}}',
            'job_id'
        );

        // add foreign key for table `{{%job}}`
        $this->addForeignKey(
            '{{%fk-bid-job_id}}',
            '{{%bid}}',
            'job_id',
            '{{%job}}',
            'id',
            'CASCADE'
        );

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-bid-created_by}}',
            '{{%bid}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-bid-created_by}}',
            '{{%bid}}',
            'created_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `updated_by`
        $this->createIndex(
            '{{%idx-bid-updated_by}}',
            '{{%bid}}',
            'updated_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-bid-updated_by}}',
            '{{%bid}}',
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
        // drops foreign key for table `{{%job}}`
        $this->dropForeignKey(
            '{{%fk-bid-job_id}}',
            '{{%bid}}'
        );

        // drops index for column `job_id`
        $this->dropIndex(
            '{{%idx-bid-job_id}}',
            '{{%bid}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-bid-created_by}}',
            '{{%bid}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-bid-created_by}}',
            '{{%bid}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-bid-updated_by}}',
            '{{%bid}}'
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            '{{%idx-bid-updated_by}}',
            '{{%bid}}'
        );

        $this->dropTable('{{%bid}}');
    }
}

<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%job}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%user}}`
 */
class m201121_214422_create_job_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%job}}', [
            'id' => $this->primaryKey(),
            'price' => $this->float()->notNull(),
            'title' => $this->string()->notNull(),
            'description' => $this->text()->notNull(),
            'filepath' => $this->string(100),
            'category' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-job-created_by}}',
            '{{%job}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-job-created_by}}',
            '{{%job}}',
            'created_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `updated_by`
        $this->createIndex(
            '{{%idx-job-updated_by}}',
            '{{%job}}',
            'updated_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-job-updated_by}}',
            '{{%job}}',
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
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-job-created_by}}',
            '{{%job}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-job-created_by}}',
            '{{%job}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-job-updated_by}}',
            '{{%job}}'
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            '{{%idx-job-updated_by}}',
            '{{%job}}'
        );

        $this->dropTable('{{%job}}');
    }
}

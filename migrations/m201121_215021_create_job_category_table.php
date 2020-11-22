<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%job_category}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%user}}`
 */
class m201121_215021_create_job_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%job_category}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(100)->notNull(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-job_category-created_by}}',
            '{{%job_category}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-job_category-created_by}}',
            '{{%job_category}}',
            'created_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `updated_by`
        $this->createIndex(
            '{{%idx-job_category-updated_by}}',
            '{{%job_category}}',
            'updated_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-job_category-updated_by}}',
            '{{%job_category}}',
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
            '{{%fk-job_category-created_by}}',
            '{{%job_category}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-job_category-created_by}}',
            '{{%job_category}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-job_category-updated_by}}',
            '{{%job_category}}'
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            '{{%idx-job_category-updated_by}}',
            '{{%job_category}}'
        );

        $this->dropTable('{{%job_category}}');
    }
}

<?php

use yii\db\Migration;

class m170713_172536_employee extends Migration
{
  public function up()
  {

      $this->createTable('employee', [
          'id' => $this->primaryKey(),
          'name' => $this->string()->notNull(),
          'age' => $this->integer()->notNull(),
          'description' => $this->text(),
      ]);
  }

  public function down()
  {
      $this->dropTable('employee');
  }
}

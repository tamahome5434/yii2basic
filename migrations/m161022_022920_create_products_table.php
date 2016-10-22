<?php

use yii\db\Migration;

/**
 * Handles the creation of table `products`.
 */
class m161022_022920_create_products_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
		 if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%products}}', [
            'id' => $this->primaryKey(),
            'image' => $this->string(),
            'brand' => $this->string(),
            'pname' => $this->string(),
            'sprice' => $this->decimal(5,2),
            'rprice' => $this->decimal(5,2),
        ]);
		
		$this->insert('products', [
            'id' => '1',
            'image' => 'lip.jpg',
            'brand' => 'Yadah',
            'pname' => 'Yadah Pure Green Emulsion',
            'sprice' => '139.00',
            'rprice' => '89.00',
        ]);
		$this->insert('products', [
            'id' => '2',
            'image' => 'none.jpg',
            'brand' => 'Skills',
            'pname' => 'Black Head Pure Cleanser Set',
            'sprice' => '165.00',
            'rprice' => '115.00',
        ]);
		$this->insert('products', [
            'id' => '3',
            'image' => 'none.jpg',
            'brand' => 'Innisfree',
            'pname' => 'Jeju Volcanic 3 in 1 Nose Pack',
            'sprice' => '249.00',
            'rprice' => '199.00',
        ]);
		$this->insert('products', [
            'id' => '4',
            'image' => 'none.jpg',
            'brand' => 'Yadah',
            'pname' => 'Yadah Nail Collection',
            'sprice' => '105.90',
            'rprice' => '20.50',
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%products}}');
    }
}

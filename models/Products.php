<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property integer $id
 * @property string $image
 * @property string $brand
 * @property string $pname
 * @property string $sprice
 * @property string $rprice
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['image', 'brand', 'pname', 'sprice', 'rprice'], 'required'],
            [['sprice', 'rprice'], 'number'],
            [['image', 'brand', 'pname'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'image' => 'Image',
            'brand' => 'Brand',
            'pname' => 'Pname',
            'sprice' => 'Sprice',
            'rprice' => 'Rprice',
        ];
    }
}

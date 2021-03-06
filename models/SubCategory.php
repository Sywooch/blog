<?php 

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\base\InvalidParamException;
use yii\base\Model;

class SubCategory extends ActiveRecord
{

  public function rules()
  {
    return [
      ['category_id', 'required'],
      ['name', 'required'],
      ['name', 'string', 'min'=>3],
    ];
  }

  public function getCategory()
  {
    return $this->hasMany(Category::className(), ['category_id' => 'category_id']);
  }

  public static function tableName()
  {
    return "sub_category";
  }
}
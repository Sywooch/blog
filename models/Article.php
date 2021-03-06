<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\base\InvalidParamException;
use yii\base\Model;

class Article extends ActiveRecord
{

  public function rules(){
    return 
    [
        ['title', 'required'],
        ['title', 'unique'],
        ['full_content', 'required'],
        ['category_id', 'required'], 
        ['sub_category_id', 'required'],
    ];
  }

  public function getCategory()
  {
    return $this->hasMany(Category::className(), ['id' => 'category_id']);
  }

  public function getSubCategory()
  {
    return $this->hasMany(SubCategory::className(), ['id' => 'sub_category_id']);
  }

  public function getComments()
  {
    return $this->hasMany(Comment::className(), ['article_id' => 'id']);
  }

  public function getTags()
  {
    return $this->hasMany(Tag::className(), ["id" => "tag_id"])
                ->viaTable("article-to-tag", ["article_id" => "id"]);
  }


  public static function tableName()
  {
    return "articles";
  }
  
}
<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;
/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property string $title Заголовок
 * @property string|null $descr Описание
 * @property string|null $img Изображение
 * @property int|null $price Цена
 * @property string|null $sdescr
 * @property int|null $cat
 */
class Products extends \yii\db\ActiveRecord
{
    public $imageFile;
	/**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['descr', 'sdescr'], 'string'],
            [['price', 'cat'], 'integer'],
            [['title'], 'string', 'max' => 64],
            [['img'], 'string', 'max' => 24],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'descr' => 'Полное описание',
			'imageFile' => 'Изображение',
            'img' => 'Изображение',
            'price' => 'Цена',
            'sdescr' => 'Краткое описание',
            'cat' => 'Категория',
			'category' => 'Категория',
        ];
    }
	
	 /**
     * @return \yii\db\ActiveQuery
    */ 
    public function getCategory()
    {
        return $this->hasOne(Cats::className(), ['id' => 'cat']);
    }
	
	public function beforeSave($insert)
	{
		if (!parent::beforeSave($insert)) {
			return false;
		}
		$this->imageFile = UploadedFile::getInstance($this, 'imageFile');
		if (isset($this->imageFile) && $this->validate('imageFile')) {
			$imgName = uniqid();
			$imgName = substr($imgName, 6, 7);
			$imgName = $imgName. '.' . $this->imageFile->extension;
			$this->imageFile->saveAs('images/products/' . $imgName);
			if (!$insert) {
				if (file_exists("images/products/$this->img") && $this->img != 'nophoto.png')
					unlink("images/products/$this->img");
			}
			$this->img = $imgName;
		} 
		return true;
	}
	
	public function beforeDelete()
	{
		if (!parent::beforeDelete()) {
			return false;
		}

		if (file_exists("images/products/$this->img") && $this->img != 'nophoto.png')
					unlink("images/products/$this->img");
		return true;
	}
	
	
}

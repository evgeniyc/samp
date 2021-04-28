<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "cats".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $parent
 * @property string|null $img
 */
class Cats extends \yii\db\ActiveRecord
{
    public $imageFile;
	/**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cats';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent'], 'integer'],
            [['name'], 'string', 'max' => 24],
            [['img'], 'string', 'max' => 16],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Наименование',
            'parent' => 'Родительская категория',
            'img' => 'Имя файла',
			'imageFile' => 'Изображение',
        ];
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
			$this->imageFile->saveAs('images/cats/' . $imgName);
			if (!$insert) {
				if (file_exists("images/cats/$this->img") && $this->img != 'nophoto.png')
					unlink("images/cats/$this->img");
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

		if (file_exists("images/cats/$this->img") && $this->img != 'nophoto.png')
					unlink("images/cats/$this->img");
		return true;
	}
	
	public function afterSave($insert, $changedAttributes)	
	{
		 parent::afterSave($insert, $changedAttributes);
		 echo 'Worked!';
	}
	
}


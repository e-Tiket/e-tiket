<?php

/**
 * This is the model class for table "artikel".
 *
 * The followings are the available columns in table 'artikel':
 * @property integer $id
 * @property integer $id_kategori
 * @property string $judul
 * @property integer $tanggal_post
 * @property integer $id_admin_post
 * @property string $isi
 *
 * The followings are the available model relations:
 * @property KategoriArtikel $idKategori
 */
class Artikel extends MyCActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Artikel the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'artikel';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_kategori, judul, id_admin_post', 'required'),
			array('id_kategori, id_admin_post', 'numerical', 'integerOnly'=>true),
			array('judul', 'length', 'max'=>100),
                    array('isi', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_kategori, judul, tanggal_post, id_admin_post, isi', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'idKategori' => array(self::BELONGS_TO, 'KategoriArtikel', 'id_kategori'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_kategori' => 'Kategori',
			'judul' => 'Judul',
			'tanggal_post' => 'Tanggal Post',
			'id_admin_post' => 'Admin Post',
			'isi' => 'Isi',
		);
	}

        public function dropdownModel(){
            $results=Yii::app()->db->createCommand()->select()
                    ->from($this->tableName())
                    ->queryAll();
            $data=array(''=>'- Pilih  -');
            foreach($results as $result){
                $data[$result['id']]=$result['nama'];
            }
            return $data;
        }
        
	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('id_kategori',$this->id_kategori);
		$criteria->compare('judul',$this->judul,true);
		$criteria->compare('tanggal_post',$this->tanggal_post);
		$criteria->compare('id_admin_post',$this->id_admin_post);
		$criteria->compare('isi',$this->isi,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
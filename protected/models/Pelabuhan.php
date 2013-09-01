<?php

/**
 * This is the model class for table "pelabuhan".
 *
 * The followings are the available columns in table 'pelabuhan':
 * @property integer $id
 * @property string $nama
 * @property string $kota
 *
 * The followings are the available model relations:
 * @property PemberangkatanKapal[] $pemberangkatanKapals
 * @property PemberangkatanKapal[] $pemberangkatanKapals1
 */
class Pelabuhan extends MyCActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Pelabuhan the static model class
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
		return 'pelabuhan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nama, kota', 'required'),
			array('nama, kota', 'length', 'max'=>32),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nama, kota', 'safe', 'on'=>'search'),
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
			'pemberangkatanKapals' => array(self::HAS_MANY, 'PemberangkatanKapal', 'id_pelabuhan_tujuan'),
			'pemberangkatanKapals1' => array(self::HAS_MANY, 'PemberangkatanKapal', 'id_pelabuhan_awal'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nama' => 'Nama',
			'kota' => 'Kota',
		);
	}

        public function dropdownModel($pilih='- Pilih  -'){
            $results=Yii::app()->db->createCommand()->select()
                    ->from($this->tableName())
                    ->queryAll();
            $data=array(''=>$pilih);
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
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('kota',$this->kota,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
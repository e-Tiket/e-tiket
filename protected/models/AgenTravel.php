<?php

/**
 * This is the model class for table "agen_travel".
 *
 * The followings are the available columns in table 'agen_travel':
 * @property integer $id
 * @property string $nama
 * @property string $alamat
 * @property string $no_telp
 * @property integer $id_admin
 *
 * The followings are the available model relations:
 * @property Admin $idAdmin
 * @property Travel[] $travels
 */
class AgenTravel extends MyCActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AgenTravel the static model class
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
		return 'agen_travel';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nama, alamat, no_telp', 'required'),
			array('id_admin', 'numerical', 'integerOnly'=>true),
			array('nama', 'length', 'max'=>50),
			array('alamat', 'length', 'max'=>100),
			array('no_telp', 'length', 'max'=>15),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nama, alamat, no_telp, id_admin', 'safe', 'on'=>'search'),
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
			'idAdmin' => array(self::BELONGS_TO, 'Admin', 'id_admin'),
			'travels' => array(self::HAS_MANY, 'Travel', 'id_agen_travel'),
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
			'alamat' => 'Alamat',
			'no_telp' => 'No Telp',
			'id_admin' => 'Id Admin',
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
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('alamat',$this->alamat,true);
		$criteria->compare('no_telp',$this->no_telp,true);
		$criteria->compare('id_admin',$this->id_admin);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
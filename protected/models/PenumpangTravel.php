<?php

/**
 * This is the model class for table "penumpang_travel".
 *
 * The followings are the available columns in table 'penumpang_travel':
 * @property integer $id
 * @property integer $id_order
 * @property integer $id_travel
 * @property string $nama
 * @property string $alamat
 * @property string $no_telp
 * @property string $keterangan
 *
 * The followings are the available model relations:
 * @property Travel $idTravel
 * @property Order $idOrder
 * @property SeatPenumpangTravel[] $seatPenumpangTravels
 */
class PenumpangTravel extends MyCActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PenumpangTravel the static model class
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
		return 'penumpang_travel';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_order, id_travel', 'numerical', 'integerOnly'=>true),
			array('nama', 'length', 'max'=>50),
			array('alamat, keterangan', 'length', 'max'=>255),
			array('no_telp', 'length', 'max'=>15),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_order, id_travel, nama, alamat, no_telp, keterangan', 'safe', 'on'=>'search'),
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
			'idTravel' => array(self::BELONGS_TO, 'Travel', 'id_travel'),
			'idOrder' => array(self::BELONGS_TO, 'Order', 'id_order'),
			'seatPenumpangTravels' => array(self::HAS_MANY, 'SeatPenumpangTravel', 'id_penumpang_travel'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_order' => 'Id Order',
			'id_travel' => 'Id Travel',
			'nama' => 'Nama',
			'alamat' => 'Alamat',
			'no_telp' => 'No Telp',
			'keterangan' => 'Keterangan',
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
		$criteria->compare('id_order',$this->id_order);
		$criteria->compare('id_travel',$this->id_travel);
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('alamat',$this->alamat,true);
		$criteria->compare('no_telp',$this->no_telp,true);
		$criteria->compare('keterangan',$this->keterangan,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
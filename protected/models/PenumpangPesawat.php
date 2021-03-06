<?php

/**
 * This is the model class for table "penumpang_pesawat".
 *
 * The followings are the available columns in table 'penumpang_pesawat':
 * @property integer $id
 * @property string $nama_depan
 * @property string $nama_belakang
 * @property string $alamat
 * @property string $no_ktp
 * @property string $tgl_lahir
 * @property string $jenis_kelamin
 * @property integer $id_flight_order
 * @property string $no_telp
 * @property string $no_telp_lainnya
 *
 * The followings are the available model relations:
 * @property FlightOrder $idFlightOrder
 */
class PenumpangPesawat extends MyCActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PenumpangPesawat the static model class
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
		return 'penumpang_pesawat';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nama_depan, nama_belakang, alamat, tgl_lahir, jenis_kelamin', 'required'),
			array('id_flight_order', 'numerical', 'integerOnly'=>true),
			array('nama_depan, nama_belakang', 'length', 'max'=>50),
			array('alamat', 'length', 'max'=>255),
			array('no_ktp', 'length', 'max'=>20),
			array('jenis_kelamin', 'length', 'max'=>1),
			array('no_telp, no_telp_lainnya', 'length', 'max'=>15),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nama_depan, nama_belakang, alamat, no_ktp, tgl_lahir, jenis_kelamin, id_flight_order, no_telp, no_telp_lainnya', 'safe', 'on'=>'search'),
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
			'idFlightOrder' => array(self::BELONGS_TO, 'FlightOrder', 'id_flight_order'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nama_depan' => 'Nama Depan',
			'nama_belakang' => 'Nama Belakang',
			'alamat' => 'Alamat',
			'no_ktp' => 'No Ktp',
			'tgl_lahir' => 'Tgl Lahir',
			'jenis_kelamin' => 'Jenis Kelamin',
			'id_flight_order' => 'Id Flight Order',
			'no_telp' => 'No Telp',
			'no_telp_lainnya' => 'No Telp Lainnya',
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
		$criteria->compare('nama_depan',$this->nama_depan,true);
		$criteria->compare('nama_belakang',$this->nama_belakang,true);
		$criteria->compare('alamat',$this->alamat,true);
		$criteria->compare('no_ktp',$this->no_ktp,true);
		$criteria->compare('tgl_lahir',$this->tgl_lahir,true);
		$criteria->compare('jenis_kelamin',$this->jenis_kelamin,true);
		$criteria->compare('id_flight_order',$this->id_flight_order);
		$criteria->compare('no_telp',$this->no_telp,true);
		$criteria->compare('no_telp_lainnya',$this->no_telp_lainnya,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
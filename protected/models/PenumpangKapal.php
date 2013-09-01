<?php

/**
 * This is the model class for table "penumpang_kapal".
 *
 * The followings are the available columns in table 'penumpang_kapal':
 * @property integer $id
 * @property string $nama_depan
 * @property string $nama_belakang
 * @property string $alamat
 * @property string $no_ktp
 * @property string $tgl_lahir
 * @property string $jenis_kelami
 * @property integer $id_kapal_order
 *
 * The followings are the available model relations:
 * @property KapalOrder $idKapalOrder
 */
class PenumpangKapal extends MyCActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PenumpangKapal the static model class
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
		return 'penumpang_kapal';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nama_depan, nama_belakang, alamat, no_ktp, tgl_lahir, jenis_kelami', 'required'),
			array('id_kapal_order', 'numerical', 'integerOnly'=>true),
			array('nama_depan, nama_belakang', 'length', 'max'=>50),
			array('alamat', 'length', 'max'=>255),
			array('no_ktp', 'length', 'max'=>20),
			array('jenis_kelami', 'length', 'max'=>1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nama_depan, nama_belakang, alamat, no_ktp, tgl_lahir, jenis_kelami, id_kapal_order', 'safe', 'on'=>'search'),
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
			'idKapalOrder' => array(self::BELONGS_TO, 'KapalOrder', 'id_kapal_order'),
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
			'jenis_kelami' => 'Jenis Kelami',
			'id_kapal_order' => 'Id Kapal Order',
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
		$criteria->compare('jenis_kelami',$this->jenis_kelami,true);
		$criteria->compare('id_kapal_order',$this->id_kapal_order);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
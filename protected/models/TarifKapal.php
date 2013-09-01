<?php

/**
 * This is the model class for table "tarif_kapal".
 *
 * The followings are the available columns in table 'tarif_kapal':
 * @property integer $id
 * @property integer $id_pemberangkatan
 * @property integer $harga
 * @property string $kelas
 *
 * The followings are the available model relations:
 * @property KapalOrder[] $kapalOrders
 * @property PemberangkatanKapal $idPemberangkatan
 */
class TarifKapal extends MyCActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TarifKapal the static model class
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
		return 'tarif_kapal';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('harga, kelas', 'required'),
			array('id_pemberangkatan, harga', 'numerical', 'integerOnly'=>true),
			array('kelas', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_pemberangkatan, harga, kelas', 'safe', 'on'=>'search'),
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
			'kapalOrders' => array(self::HAS_MANY, 'KapalOrder', 'id_tarif_kapal'),
			'idPemberangkatan' => array(self::BELONGS_TO, 'PemberangkatanKapal', 'id_pemberangkatan'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_pemberangkatan' => 'Id Pemberangkatan',
			'harga' => 'Harga',
			'kelas' => 'Kelas',
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
		$criteria->compare('id_pemberangkatan',$this->id_pemberangkatan);
		$criteria->compare('harga',$this->harga);
		$criteria->compare('kelas',$this->kelas,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        public function getTarifByPemberangkatanKapal($id_pemberangkatan){
            $qry=  Yii::app()->db->createCommand()
                    ->select()
                    ->from('tarif_kapal')
                    ->where("id_pemberangkatan='$id_pemberangkatan'");
            return $qry->queryAll();
        }
}
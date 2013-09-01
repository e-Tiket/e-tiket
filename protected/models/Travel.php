<?php

/**
 * This is the model class for table "travel".
 *
 * The followings are the available columns in table 'travel':
 * @property integer $id
 * @property string $asal
 * @property string $tujuan
 * @property string $mobil
 * @property string $jam_berangkat
 * @property string $jam_sampai
 * @property integer $jumlah_seat
 * @property integer $id_agen_travel
 * @property string $keterangan
 *
 * The followings are the available model relations:
 * @property PenumpangTravel[] $penumpangTravels
 * @property AgenTravel $idAgenTravel
 */
class Travel extends MyCActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Travel the static model class
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
		return 'travel';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('asal, tujuan, jam_berangkat, jam_sampai, jumlah_seat, keterangan', 'required'),
			array('jumlah_seat, id_agen_travel', 'numerical', 'integerOnly'=>true),
			array('asal, tujuan', 'length', 'max'=>30),
			array('mobil', 'length', 'max'=>32),
			array('keterangan', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, asal, tujuan, mobil, jam_berangkat, jam_sampai, jumlah_seat, id_agen_travel, keterangan', 'safe', 'on'=>'search'),
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
			'penumpangTravels' => array(self::HAS_MANY, 'PenumpangTravel', 'id_travel'),
			'idAgenTravel' => array(self::BELONGS_TO, 'AgenTravel', 'id_agen_travel'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'asal' => 'Asal',
			'tujuan' => 'Tujuan',
			'mobil' => 'Mobil',
			'jam_berangkat' => 'Jam Berangkat',
			'jam_sampai' => 'Jam Sampai',
			'jumlah_seat' => 'Jumlah Seat',
			'id_agen_travel' => 'Id Agen Travel',
			'keterangan' => 'Keterangan',
		);
	}

        public function dropdownModel(){
            $results=Yii::app()->db->createCommand()->select()
                    ->from($this->tableName())
                    ->queryAll();
            $data=array(''=>'- Pilih Travel -');
            foreach($results as $result){
                $data[$result['id']]=$result['nama'];
            }
            return $data;
        }
        
	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search2()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('asal',$this->asal,true);
		$criteria->compare('tujuan',$this->tujuan,true);
		$criteria->compare('mobil',$this->mobil,true);
		$criteria->compare('jam_berangkat',$this->jam_berangkat,true);
		$criteria->compare('jam_sampai',$this->jam_sampai,true);
		$criteria->compare('jumlah_seat',$this->jumlah_seat);
		$criteria->compare('id_agen_travel',$this->id_agen_travel);
		$criteria->compare('keterangan',$this->keterangan,true);

		return new MyCActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
	public function search($searchParam=array())
	{
		if($searchParam==null){
                    $searchParam=array();
                }
                $sql=  Yii::app()->db->createCommand()
                        ->from('travel')
                        ->join('agen_travel','travel.id_agen_travel=agen_travel.id')
                        ->where('1')
                        ;
                
                foreach($searchParam as $column=>$value){
                    if($value=='')continue;
                    if(strpos($column, '.id')>0 || substr($column, 0,2)=='id'){
                        $sql->andWhere("$column ='$value'");
                    }else
                        $sql->andWhere("travel.$column like '%$value%'");
                }
                $counterSql=  clone $sql;
                $sql->select("travel.*,agen_travel.nama as agen");
                $data=new MyCSqlDataProvider($sql->getText());
                $counterSql->select='count(*) as jumlah';
                $jumlah=$counterSql->select('count(*) as jumlah')->queryRow();
                $data->setTotalItemCount($jumlah['jumlah']);
                $data->setSort(array('attributes'=>array('id','agen','asal','tujuan','mobil','jam_berangkat','jam_sampai','jumlah_seat','id_agen_travel','keterangan')));
                
                return $data;
	}
}
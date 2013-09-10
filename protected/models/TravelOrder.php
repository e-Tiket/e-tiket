<?php

/**
 * This is the model class for table "travel_order".
 *
 * The followings are the available columns in table 'travel_order':
 * @property integer $id
 * @property integer $id_order
 * @property integer $id_travel
 * @property integer $harga
 * @property string $nama
 * @property string $alamat
 * @property string $alamat_tujuan
 * @property string $no_telp
 * @property string $keterangan
 * @property integer $jumlah_seat
 * @property string $tanggal_berangkat
 *
 * The followings are the available model relations:
 * @property SeatPenumpangTravel[] $seatPenumpangTravels
 * @property Travel $idTravel
 * @property Order $idOrder
 */
class TravelOrder extends MyCActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TravelOrder the static model class
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
		return 'travel_order';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('harga, jumlah_seat, tanggal_berangkat', 'required'),
			array('id_order, id_travel, harga, jumlah_seat', 'numerical', 'integerOnly'=>true),
			array('nama', 'length', 'max'=>50),
			array('alamat,alamat_tujuan, keterangan', 'length', 'max'=>255),
			array('no_telp', 'length', 'max'=>15),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_order, id_travel, harga, nama, alamat, no_telp, keterangan, jumlah_seat, tanggal_berangkat', 'safe', 'on'=>'search'),
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
			'seatPenumpangTravels' => array(self::HAS_MANY, 'SeatPenumpangTravel', 'id_penumpang_travel'),
			'idTravel' => array(self::BELONGS_TO, 'Travel', 'id_travel'),
			'idOrder' => array(self::BELONGS_TO, 'Order', 'id_order'),
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
			'harga' => 'Harga',
			'nama' => 'Nama',
			'alamat' => 'Alamat',
			'alamat_tujuan' => 'Alamat Tujuan',
			'no_telp' => 'No Telp',
			'keterangan' => 'Keterangan',
			'jumlah_seat' => 'Jumlah Seat',
			'tanggal_berangkat' => 'Tanggal Berangkat',
		);
	}

        public function dropdownModel(){
            $results=Yii::app()->db->createCommand()->select()
                    ->from($this->tableName())
                    ->queryAll();
            $data=array(''=>'- Pilih Travel Order -');
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
		$criteria->compare('id_order',$this->id_order);
		$criteria->compare('id_travel',$this->id_travel);
		$criteria->compare('harga',$this->harga);
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('alamat',$this->alamat,true);
		$criteria->compare('no_telp',$this->no_telp,true);
		$criteria->compare('keterangan',$this->keterangan,true);
		$criteria->compare('jumlah_seat',$this->jumlah_seat);
		$criteria->compare('tanggal_berangkat',$this->tanggal_berangkat,true);

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
                        ->from('travel_order')
                        ->where('1')
                        ;
                foreach($searchParam as $column=>$value){
                    if($value=='')continue;
                    if(strpos($column, '.id')>0 || substr($column, 0,2)=='id'){
                        $sql->andWhere("$column ='$value'");
                    }else
                        $sql->andWhere("travel_order.$column like '%$value%'");
                }
                $counterSql=  clone $sql;
                $sql->select("travel_order.*");
                $data=new MyCSqlDataProvider($sql->getText());
                $counterSql->select='count(*) as jumlah';
                $jumlah=$counterSql->select('count(*) as jumlah')->queryRow();
                $data->setTotalItemCount($jumlah['jumlah']);
                $data->setSort(array('attributes'=>array('id','id_order','id_travel','harga','nama','alamat','no_telp','keterangan','jumlah_seat','tanggal_berangkat')));
                
                return $data;
	}
}
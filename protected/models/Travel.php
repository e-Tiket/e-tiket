<?php

/**
 * This is the model class for table "travel".
 *
 * The followings are the available columns in table 'travel':
 * @property integer $id
 * @property string $asal
 * @property string $tujuan
 * @property string $mobil
 * @property integer $harga
 * @property string $jam_berangkat
 * @property string $jam_sampai
 * @property integer $jumlah_seat
 * @property integer $id_agen_travel
 * @property string $keterangan
 * @property integer $is_active
 * @property integer $gambar_seat
 *
 * The followings are the available model relations:
 * @property AgenTravel $idAgenTravel
 * @property TravelOrder[] $travelOrders
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
			array('asal, tujuan, harga, jam_berangkat, jam_sampai, jumlah_seat, keterangan', 'required'),
			array('harga, jumlah_seat, id_agen_travel, is_active', 'numerical', 'integerOnly'=>true),
			array('asal, tujuan', 'length', 'max'=>30),
			array('mobil', 'length', 'max'=>32),
			array('keterangan,gambar_seat', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, asal, tujuan, mobil, harga, jam_berangkat, jam_sampai, jumlah_seat, id_agen_travel, keterangan, is_active', 'safe', 'on'=>'search'),
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
			'idAgenTravel' => array(self::BELONGS_TO, 'AgenTravel', 'id_agen_travel'),
			'travelOrders' => array(self::HAS_MANY, 'TravelOrder', 'id_travel'),
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
			'harga' => 'Harga',
			'jam_berangkat' => 'Jam Berangkat',
			'jam_sampai' => 'Jam Sampai',
			'jumlah_seat' => 'Jumlah Seat',
			'id_agen_travel' => 'Agen Travel',
			'keterangan' => 'Keterangan',
			'is_active' => 'Is Active',
			'gambar_seat' => 'Gambar Seat',
		);
	}

public function destinationDropdownModel($data=array()){
            $results=Yii::app()->db->createCommand("
                        select asal as destination from travel 
                            group by asal
                        union
                        select tujuan as destination from travel 
                            group by tujuan")
                    ->queryAll();
            if(count($data)<=0)
                $data=array(''=>'- Pilih  -');
            foreach($results as $result){
                $data[$result['destination']]=$result['destination'];
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
                        ->leftJoin('agen_travel','travel.id_agen_travel=agen_travel.id')
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
                $sql->select("travel.*,IFNULL(agen_travel.nama,'-') as agen");
                $data=new MyCSqlDataProvider($sql->getText());
                $counterSql->select='count(*) as jumlah';
                $jumlah=$counterSql->select('count(*) as jumlah')->queryRow();
                $data->setTotalItemCount($jumlah['jumlah']);
                $data->setSort(array('attributes'=>array('id','agen','asal','tujuan','mobil','jam_berangkat','jam_sampai','jumlah_seat','id_agen_travel','keterangan','harga')));
                
                return $data;
	}
        function getJadwal($asal,$tujuan,$tanggal,$tanggal_sebelum){
                $sqlMaster="
                    select *,date_range.date as tanggal,
                        (travel.jumlah_seat-ifnull((select sum(travel_order.jumlah_seat) 
                                from travel_order 
                                join `order` on `order`.id=travel_order.id_order 
                                where `order`.status<>'unapproved' and tanggal_berangkat=date_range.date),0)) as sisa_seat 
                    from travel
                    join (
                        select date_range.date
                        from 
                        (
                          select curdate() + INTERVAL (a.a + (10 * b.a) + (100 * c.a)) DAY as date
                          from (select 0 as a union all select 1 union all select 2 union all select 3 union all select 4 union all select 5 union all select 6 union all select 7 union all select 8 union all select 9) as a
                          cross join (select 0 as a union all select 1 union all select 2 union all select 3 union all select 4 union all select 5 union all select 6 union all select 7 union all select 8 union all select 9) as b
                          cross join (select 0 as a union all select 1 union all select 2 union all select 3 union all select 4 union all select 5 union all select 6 union all select 7 union all select 8 union all select 9) as c
                        ) date_range
                    ) date_range
                    where (date_range.date between '$tanggal' and '$tanggal_sebelum')
                    having sisa_seat>0
                ";
                $sql=  Yii::app()->db->createCommand(
                            "$sqlMaster and asal='$asal' and tujuan='$tujuan' 
                            UNION
                            $sqlMaster and asal like '%$asal%' and tujuan like '%$tujuan%'" 
                        )
                        ;
                
                
                $data=new MyCSqlDataProvider($sql->getText());
                $data->setTotalItemCount(count($sql->queryAll()));
                $data->setSort(array('attributes'=>array('id','asal','tujuan','tanggal','sisa_seat')));
                
                return $data;
        }
        public function getSeatTerpakai($id,$tanggal){
            $jumlah=Yii::app()->db->createCommand("select ifnull(sum(travel_order.jumlah_seat),0) as jumlah
                                from travel_order 
                                join `order` on `order`.id=travel_order.id_order 
                                where `order`.status<>'unapproved' 
                                    and tanggal_berangkat='$tanggal' 
                                    and travel_order.id_travel='$id'")->queryRow();
            return $jumlah['jumlah'];
        }
}
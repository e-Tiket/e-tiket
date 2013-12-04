<?php

/**
 * This is the model class for table "travel".
 *
 * The followings are the available columns in table 'travel':
 * @property integer $id
 * @property integer $id_kota_asal
 * @property integer $id_kota_tujuan
 * @property string $mobil
 * @property integer $harga
 * @property string $jam_berangkat
 * @property string $jam_sampai
 * @property integer $id_agen_travel
 * @property string $keterangan
 * @property integer $is_active
 * @property integer $id_travel_seat
 *
 * The followings are the available model relations:
 * @property TravelSeat $idTravelSeat
 * @property AgenTravel $idAgenTravel
 * @property TravelKota $idKotaAsal
 * @property TravelKota $idKotaTujuan
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
			array('id_kota_asal, id_kota_tujuan, harga, jam_berangkat, jam_sampai, keterangan, id_travel_seat', 'required'),
			array('id_kota_asal, id_kota_tujuan, harga, id_agen_travel, is_active, id_travel_seat', 'numerical', 'integerOnly'=>true),
			array('mobil', 'length', 'max'=>32),
			array('keterangan', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_kota_asal, id_kota_tujuan, mobil, harga, jam_berangkat, jam_sampai, id_agen_travel, keterangan, is_active, id_travel_seat', 'safe', 'on'=>'search'),
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
			'idTravelSeat' => array(self::BELONGS_TO, 'TravelSeat', 'id_travel_seat'),
			'idAgenTravel' => array(self::BELONGS_TO, 'AgenTravel', 'id_agen_travel'),
			'idKotaAsal' => array(self::BELONGS_TO, 'TravelKota', 'id_kota_asal'),
			'idKotaTujuan' => array(self::BELONGS_TO, 'TravelKota', 'id_kota_tujuan'),
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
			'id_kota_asal' => 'Kota Asal',
			'id_kota_tujuan' => 'Kota Tujuan',
			'mobil' => 'Mobil',
			'harga' => 'Harga',
			'jam_berangkat' => 'Jam Berangkat',
			'jam_sampai' => 'Jam Sampai',
			'id_agen_travel' => 'Agen Travel',
			'keterangan' => 'Keterangan',
			'is_active' => 'Is Active',
			'id_travel_seat' => 'Travel Seat',
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
		$criteria->compare('id_kota_asal',$this->id_kota_asal);
		$criteria->compare('id_kota_tujuan',$this->id_kota_tujuan);
		$criteria->compare('mobil',$this->mobil,true);
		$criteria->compare('harga',$this->harga);
		$criteria->compare('jam_berangkat',$this->jam_berangkat,true);
		$criteria->compare('jam_sampai',$this->jam_sampai,true);
		$criteria->compare('id_agen_travel',$this->id_agen_travel);
		$criteria->compare('keterangan',$this->keterangan,true);
		$criteria->compare('is_active',$this->is_active);
		$criteria->compare('id_travel_seat',$this->id_travel_seat);

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
                        ->join('travel_kota asal', 'asal.id=travel.id_kota_asal')
                        ->join('travel_kota tujuan', 'tujuan.id=travel.id_kota_tujuan')
                        ->join('travel_seat seat', 'seat.id=travel.id_travel_seat')
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
                $sql->select('*,travel.id,asal.kota as kota_asal,tujuan.kota as kota_tujuan');
                $data=new MyCSqlDataProvider($sql->getText());
                $counterSql->select='count(*) as jumlah';
                $jumlah=$counterSql->select('count(*) as jumlah')->queryRow();
                $data->setTotalItemCount($jumlah['jumlah']);
                $data->setSort(array('attributes'=>array('id','kota_asal','kota_tujuan','mobil','harga','jam_berangkat','jam_sampai','id_agen_travel','keterangan','is_active','id_travel_seat')));
                
                return $data;
	}
        function getJadwal($asal,$tujuan,$tanggal,$jumlah=null){
            $having="1=1";
            if($jumlah!=null || $jumlah!=''){
                $having.=" and sisa_seat>=$jumlah";
            }
                $sqlMaster="
                    select *,date_range.date as tanggal,asal.kota as asal,tujuan.kota as tujuan,travel.id,
                        (seat.jumlah-ifnull((select sum(travel_order.jumlah_seat) 
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
                    join travel_seat seat on seat.id=travel.id_travel_seat
                    join travel_kota asal on asal.id=travel.id_kota_asal
                    join travel_kota tujuan on tujuan.id=travel.id_kota_tujuan
                    where date_range.date='$tanggal'
                ";
                $sql=  Yii::app()->db->createCommand(
                            "$sqlMaster and id_kota_asal='$asal' and id_kota_tujuan='$tujuan' 
                                having sisa_seat>0 and $having" 
                        )
                        ;
                
//                echo $sql->getText();
                $data=new MyCSqlDataProvider($sql->getText());
                $data->setTotalItemCount(count($sql->queryAll()));
                $data->setSort(array('attributes'=>array('id','asal','tujuan','tanggal','sisa_seat')));
                
                return $data;
        }
        /**
         * @return int jumlah seat tidak terpakai
         */
        public function getSeatTerpakai($id_travel,$tanggal){
            $jumlah=Yii::app()->db->createCommand("select ifnull(sum(travel_order.jumlah_seat),0) as jumlah
                                from travel_order 
                                join `order` on `order`.id=travel_order.id_order 
                                where `order`.status<>'unapproved' 
                                    and tanggal_berangkat='$tanggal' 
                                    and travel_order.id_travel='$id_travel'")->queryRow();
            return $jumlah['jumlah'];
        }
        /**
         * @return int list seat yang tidak terpakai
         */
        public function getSeatListTidakTerpakai($id_travel,$tanggal){
            $seatTerpakai=  Yii::app()->db->createCommand("
                select seat_penumpang_travel.seat_ke 
                from seat_penumpang_travel
                    join travel_order on travel_order.id=seat_penumpang_travel.id_travel_order
                    join `order` on `order`.id=travel_order.id_order and `order`.status<>'unapproved'
                where travel_order.id_travel='$id_travel' and travel_order.tanggal_berangkat='$tanggal'
            ")->queryAll();
            $travel=$this->findByPk($id_travel);
            $seatList=array();
            for($i=1;$i<=$travel->idTravelSeat->jumlah;$i++){
                $isFound=false;
                foreach($seatTerpakai as $seat){
                    if($seat['seat_ke']==$i){
                        $isFound=true;
                    }
                }
                if(!$isFound){
                    $seatList[$i]=$i;
                }
            }
            return $seatList;
        }
}
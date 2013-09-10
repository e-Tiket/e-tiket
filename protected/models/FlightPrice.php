<?php

/**
 * This is the model class for table "flight_price".
 *
 * The followings are the available columns in table 'flight_price':
 * @property string $kd_flight
 * @property string $pesawat
 * @property integer $harga_naik
 * @property integer $harga_turun
 */
class FlightPrice extends MyCActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return FlightPrice the static model class
	 */
        static $flightPrice=NULL;
        public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'flight_price';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('kd_flight, pesawat, harga_naik, harga_turun', 'required'),
			array('harga_naik, harga_turun', 'numerical', 'integerOnly'=>true),
			array('kd_flight', 'length', 'max'=>20),
			array('pesawat', 'length', 'max'=>30),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('kd_flight, pesawat, harga_naik, harga_turun', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'kd_flight' => 'Kd Flight',
			'pesawat' => 'Pesawat',
			'harga_naik' => 'Harga Naik',
			'harga_turun' => 'Harga Turun',
		);
	}

        public function dropdownModel(){
            $results=Yii::app()->db->createCommand()->select()
                    ->from($this->tableName())
                    ->queryAll();
            $data=array(''=>'- Pilih Flight Price -');
//            foreach($results as $result){
//                $data[$result['id']]=$result['nama'];
//            }
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

		$criteria->compare('kd_flight',$this->kd_flight,true);
		$criteria->compare('pesawat',$this->pesawat,true);
		$criteria->compare('harga_naik',$this->harga_naik);
		$criteria->compare('harga_turun',$this->harga_turun);

		return new MyCActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
	public function search2($searchParam=array())
	{
		if($searchParam==null){
                    $searchParam=array();
                }
                $sql=  Yii::app()->db->createCommand()
                        ->from('flight_price')
                        ->where('1')
                        ;
                foreach($searchParam as $column=>$value){
                    if($value=='')continue;
                    if(strpos($column, '.id')>0 || substr($column, 0,2)=='id'){
                        $sql->andWhere("$column ='$value'");
                    }else
                        $sql->andWhere("flight_price.$column like '%$value%'");
                }
                $counterSql=  clone $sql;
                $sql->select("flight_price.*");
                $data=new MyCSqlDataProvider($sql->getText());
                $counterSql->select='count(*) as jumlah';
                $jumlah=$counterSql->select('count(*) as jumlah')->queryRow();
                $data->setTotalItemCount($jumlah['jumlah']);
                $data->setSort(array('attributes'=>array('kd_flight','pesawat','harga_naik','harga_turun')));
                
                return $data;
	}
        public function getFlightPriceList(){
            if(FlightPrice::$flightPrice!=null && is_array(FlightPrice::$flightPrice)){
                return FlightPrice::$flightPrice;
            }else{
                $flightPriceList=Yii::app()->db->createCommand()
                        ->select()
                        ->from($this->tableName())
                        ->queryAll();

                FlightPrice::$flightPrice=array();
                foreach($flightPriceList as $price){
                    FlightPrice::$flightPrice[$price['kd_flight']]=$price;
                }
            }
            return FlightPrice::$flightPrice;
        }
        public function getFlightPriceByFlightNumber($flight_number){
            $kd= explode('-', $flight_number);
            $kd_flight=$kd[0];
            $flightPriceList=$this->getFlightPriceList();
            if(isset($flightPriceList[$kd_flight]) && is_array($flightPriceList[$kd_flight])){
                return $flightPriceList[$kd_flight];
            }else{
                return array(
                    'kd_flight'=>$kd_flight,
                    'pesawat'=>'',
                    'harga_naik'=>0,
                    'harga_turun'=>0,
                );
            }
        }
        
}
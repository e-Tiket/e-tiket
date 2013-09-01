<?php

/**
 * This is the model class for table "flight_order".
 *
 * The followings are the available columns in table 'flight_order':
 * @property integer $id
 * @property integer $id_order
 * @property integer $flight_id
 * @property integer $flight_date
 * @property string $flight_number
 * @property string $airlanes_name
 * @property string $departure_city
 * @property string $arrival_city
 * @property string $sample_departure_time
 * @property string $simple_arrival_time
 * @property integer $duration
 * @property integer $price_adult
 * @property integer $price_child
 * @property integer $price_infant
 * @property integer $order_adult
 * @property integer $order_child
 * @property integer $order_infant
 * @property integer $is_booked
 *
 * The followings are the available model relations:
 * @property Order $idOrder
 * @property PenumpangPesawat[] $penumpangPesawats
 */
class FlightOrder extends MyCActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return FlightOrder the static model class
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
		return 'flight_order';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_order, flight_id, flight_date, duration, price_adult, price_child, price_infant, order_adult, order_child, order_infant, is_booked', 'numerical', 'integerOnly'=>true),
			array('flight_number', 'length', 'max'=>30),
			array('airlanes_name', 'length', 'max'=>20),
			array('departure_city, arrival_city', 'length', 'max'=>5),
			array('sample_departure_time, simple_arrival_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_order, flight_id, flight_date, flight_number, airlanes_name, departure_city, arrival_city, sample_departure_time, simple_arrival_time, duration, price_adult, price_child, price_infant, order_adult, order_child, order_infant, is_booked', 'safe', 'on'=>'search'),
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
			'idOrder' => array(self::BELONGS_TO, 'Order', 'id_order'),
			'penumpangPesawats' => array(self::HAS_MANY, 'PenumpangPesawat', 'id_flight_order'),
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
			'flight_id' => 'Flight',
			'flight_date' => 'Flight Date',
			'flight_number' => 'Flight Number',
			'airlanes_name' => 'Airlanes Name',
			'departure_city' => 'Departure City',
			'arrival_city' => 'Arrival City',
			'sample_departure_time' => 'Sample Departure Time',
			'simple_arrival_time' => 'Simple Arrival Time',
			'duration' => 'Duration',
			'price_adult' => 'Price Adult',
			'price_child' => 'Price Child',
			'price_infant' => 'Price Infant',
			'order_adult' => 'Order Adult',
			'order_child' => 'Order Child',
			'order_infant' => 'Order Infant',
			'is_booked' => 'Is Booked',
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
		$criteria->compare('flight_id',$this->flight_id);
		$criteria->compare('flight_date',$this->flight_date);
		$criteria->compare('flight_number',$this->flight_number,true);
		$criteria->compare('airlanes_name',$this->airlanes_name,true);
		$criteria->compare('departure_city',$this->departure_city,true);
		$criteria->compare('arrival_city',$this->arrival_city,true);
		$criteria->compare('sample_departure_time',$this->sample_departure_time,true);
		$criteria->compare('simple_arrival_time',$this->simple_arrival_time,true);
		$criteria->compare('duration',$this->duration);
		$criteria->compare('price_adult',$this->price_adult);
		$criteria->compare('price_child',$this->price_child);
		$criteria->compare('price_infant',$this->price_infant);
		$criteria->compare('order_adult',$this->order_adult);
		$criteria->compare('order_child',$this->order_child);
		$criteria->compare('order_infant',$this->order_infant);
		$criteria->compare('is_booked',$this->is_booked);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
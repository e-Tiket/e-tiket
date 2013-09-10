<?php

/**
 * This is the model class for table "seat_penumpang_travel".
 *
 * The followings are the available columns in table 'seat_penumpang_travel':
 * @property integer $id_travel_order
 * @property integer $seat_ke
 *
 * The followings are the available model relations:
 * @property PenumpangTravel $idPenumpangTravel
 */
class SeatPenumpangTravel extends MyCActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SeatPenumpangTravel the static model class
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
		return 'seat_penumpang_travel';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_travel_order, seat_ke', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_travel_order, seat_ke', 'safe', 'on'=>'search'),
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
			'idPenumpangTravel' => array(self::BELONGS_TO, 'PenumpangTravel', 'id_travel_order'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_travel_order' => 'Id Penumpang Travel',
			'seat_ke' => 'Seat Ke',
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

		$criteria->compare('id_travel_order',$this->id_travel_order);
		$criteria->compare('seat_ke',$this->seat_ke);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
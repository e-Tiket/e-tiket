<?php

/**
 * This is the model class for table "travel_kota".
 *
 * The followings are the available columns in table 'travel_kota':
 * @property integer $id
 * @property string $kota
 * @property integer $status
 */
class TravelKota extends MyCActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TravelKota the static model class
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
		return 'travel_kota';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('kota', 'required'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('kota', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, kota, status', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'kota' => 'Kota',
			'status' => 'Status',
		);
	}

        public function dropdownModel(){
            $results=Yii::app()->db->createCommand()->select()
                    ->from($this->tableName())
                    ->queryAll();
            $data=array(''=>'- Pilih Kota -');
            foreach($results as $result){
                $data[$result['id']]=$result['kota'];
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
		$criteria->compare('kota',$this->kota,true);
		$criteria->compare('status',$this->status);

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
                        ->from('travel_kota')
                        ->where('1')
                        ;
                foreach($searchParam as $column=>$value){
                    if($value=='')continue;
                    if(strpos($column, '.id')>0 || substr($column, 0,2)=='id'){
                        $sql->andWhere("$column ='$value'");
                    }else
                        $sql->andWhere("travel_kota.$column like '%$value%'");
                }
                $counterSql=  clone $sql;
                $sql->select("travel_kota.*");
                $data=new MyCSqlDataProvider($sql->getText());
                $counterSql->select='count(*) as jumlah';
                $jumlah=$counterSql->select('count(*) as jumlah')->queryRow();
                $data->setTotalItemCount($jumlah['jumlah']);
                                $data->setSort(array('attributes'=>array('id','kota','status')));
                
                return $data;
	}
}
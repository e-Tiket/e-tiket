<?php

/**
 * This is the model class for table "order".
 *
 * The followings are the available columns in table 'order':
 * @property integer $id
 * @property string $bayar_via
 * @property string $bayar_bank
 * @property integer $bayar_total
 * @property string $pay_keterangan
 * @property integer $id_custommer
 * @property string $waktu
 * @property integer $total_tagihan
 * @property string $status
 *
 * The followings are the available model relations:
 * @property FlightOrder[] $flightOrders
 * @property KapalOrder[] $kapalOrders
 * @property Custommer $idCustommer
 * @property TravelOrder[] $travelOrders
 */
class Order extends MyCActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Order the static model class
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
		return 'order';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('waktu', 'required'),
			array('bayar_total, id_custommer, total_tagihan', 'numerical', 'integerOnly'=>true),
			array('bayar_via', 'length', 'max'=>32),
			array('bayar_bank', 'length', 'max'=>20),
			array('pay_keterangan', 'length', 'max'=>50),
			array('status', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, bayar_via, bayar_bank, bayar_total, pay_keterangan, id_custommer, waktu, total_tagihan, status', 'safe', 'on'=>'search'),
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
			'flightOrders' => array(self::HAS_MANY, 'FlightOrder', 'id_order'),
			'kapalOrders' => array(self::HAS_MANY, 'KapalOrder', 'id_order'),
			'idCustommer' => array(self::BELONGS_TO, 'Custommer', 'id_custommer'),
			'travelOrders' => array(self::HAS_MANY, 'TravelOrder', 'id_order'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'bayar_via' => 'Bayar Via',
			'bayar_bank' => 'Bayar Bank',
			'bayar_total' => 'Bayar Total',
			'pay_keterangan' => 'Pay Keterangan',
			'id_custommer' => 'Id Custommer',
			'waktu' => 'Waktu',
			'total_tagihan' => 'Total Tagihan',
			'status' => 'Status',
		);
	}

        public function dropdownModel(){
            $results=Yii::app()->db->createCommand()->select()
                    ->from($this->tableName())
                    ->queryAll();
            $data=array(''=>'- Pilih Order -');
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
		$criteria->compare('bayar_via',$this->bayar_via,true);
		$criteria->compare('bayar_bank',$this->bayar_bank,true);
		$criteria->compare('bayar_total',$this->bayar_total);
		$criteria->compare('pay_keterangan',$this->pay_keterangan,true);
		$criteria->compare('id_custommer',$this->id_custommer);
		$criteria->compare('waktu',$this->waktu,true);
		$criteria->compare('total_tagihan',$this->total_tagihan);
		$criteria->compare('status',$this->status,true);

		return new MyCActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        /**
         * 
         * @param type $id_custommer
         * @param array $searchParam
         * @return \MyCSqlDataProvider
         */
	public function search($id_custommer=null,$searchParam=array())
	{
		if($searchParam==null){
                    $searchParam=array();
                }
                $sql=  Yii::app()->db->createCommand()
                        ->from('order')
                        ->where('1')
                        ;
                if($id_custommer!=null){
                    $sql->andWhere("id_custommer='$id_custommer'");
                }
                foreach($searchParam as $column=>$value){
                    if($value=='')continue;
                    if(strpos($column, '.id')>0 || substr($column, 0,2)=='id'){
                        $sql->andWhere("$column ='$value'");
                    }else
                        $sql->andWhere("order.$column like '%$value%'");
                }
                $counterSql=  clone $sql;
                $sql->select("order.*");
                $data=new MyCSqlDataProvider($sql->getText());
                $counterSql->select='count(*) as jumlah';
                $jumlah=$counterSql->select('count(*) as jumlah')->queryRow();
                $data->setTotalItemCount($jumlah['jumlah']);
                                $data->setSort(array('attributes'=>array('id','bayar_via','bayar_bank','bayar_total','pay_keterangan','id_custommer','waktu','total_tagihan','status')));
                return $data;
	}
}
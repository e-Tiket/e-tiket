<?php

/**
 * This is the model class for table "order_detail".
 *
 * The followings are the available columns in table 'order_detail':
 * @property integer $id_detail
 * @property string $type
 * @property string $rute
 * @property string $durasi
 * @property string $tanggal_berangkat
 * @property string $biaya
 * @property integer $harga_satuan
 * @property integer $jumlah_tiket
 */
class OrderDetail extends MyCActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return OrderDetail the static model class
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
		return 'order_detail';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tanggal_berangkat, harga_satuan, jumlah_tiket', 'required'),
			array('id_detail, harga_satuan, jumlah_tiket', 'numerical', 'integerOnly'=>true),
			array('type', 'length', 'max'=>6),
			array('rute', 'length', 'max'=>103),
			array('durasi', 'length', 'max'=>19),
			array('biaya', 'length', 'max'=>21),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_detail, type, rute, durasi, tanggal_berangkat, biaya, harga_satuan, jumlah_tiket', 'safe', 'on'=>'search'),
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
			'id_detail' => 'Id Detail',
			'type' => 'Type',
			'rute' => 'Rute',
			'durasi' => 'Durasi',
			'tanggal_berangkat' => 'Tanggal Berangkat',
			'biaya' => 'Biaya',
			'harga_satuan' => 'Harga Satuan',
			'jumlah_tiket' => 'Jumlah Tiket',
		);
	}

        public function dropdownModel(){
            $results=Yii::app()->db->createCommand()->select()
                    ->from($this->tableName())
                    ->queryAll();
            $data=array(''=>'- Pilih Order Detail -');
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

		$criteria->compare('id_detail',$this->id_detail);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('rute',$this->rute,true);
		$criteria->compare('durasi',$this->durasi,true);
		$criteria->compare('tanggal_berangkat',$this->tanggal_berangkat,true);
		$criteria->compare('biaya',$this->biaya,true);
		$criteria->compare('harga_satuan',$this->harga_satuan);
		$criteria->compare('jumlah_tiket',$this->jumlah_tiket);

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
                        ->from('order_detail')
                        ->where('1')
                        ;
                foreach($searchParam as $column=>$value){
                    if($value=='')continue;
                    if(strpos($column, '.id')>0 || substr($column, 0,2)=='id'){
                        $sql->andWhere("$column ='$value'");
                    }else
                        $sql->andWhere("order_detail.$column like '%$value%'");
                }
                $counterSql=  clone $sql;
                $sql->select("order_detail.*");
                $data=new MyCSqlDataProvider($sql->getText());
                $counterSql->select='count(*) as jumlah';
                $jumlah=$counterSql->select('count(*) as jumlah')->queryRow();
                $data->setTotalItemCount($jumlah['jumlah']);
                $data->setSort(array('attributes'=>array('id_detail','type','rute','durasi','tanggal_berangkat','biaya','harga_satuan','jumlah_tiket')));
                
                return $data;
	}
        public function getDetailOrder($id_order){
            if($id_order==null){
                return array();
            }
            return $this->findAllByAttributes(array('id_order'=>$id_order));
        }
}
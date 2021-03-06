<?php

/**
 * This is the model class for table "kapal_order".
 *
 * The followings are the available columns in table 'kapal_order':
 * @property integer $id
 * @property integer $id_order
 * @property integer $is_booked
 * @property integer $id_tarif_kapal
 * @property integer $harga
 *
 * The followings are the available model relations:
 * @property TarifKapal $idTarifKapal
 * @property Order $idOrder
 * @property PenumpangKapal[] $penumpangKapals
 */
class KapalOrder extends MyCActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return KapalOrder the static model class
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
		return 'kapal_order';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_order, is_booked, id_tarif_kapal, harga', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_order, is_booked, id_tarif_kapal, harga', 'safe', 'on'=>'search'),
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
			'idTarifKapal' => array(self::BELONGS_TO, 'TarifKapal', 'id_tarif_kapal'),
			'idOrder' => array(self::BELONGS_TO, 'Order', 'id_order'),
			'penumpangKapals' => array(self::HAS_MANY, 'PenumpangKapal', 'id_kapal_order'),
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
			'is_booked' => 'Is Booked',
			'id_tarif_kapal' => 'Id Tarif Kapal',
			'harga' => 'Harga',
		);
	}

        public function dropdownModel(){
            $results=Yii::app()->db->createCommand()->select()
                    ->from($this->tableName())
                    ->queryAll();
            $data=array(''=>'- Pilih Kapal Order -');
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
		$criteria->compare('is_booked',$this->is_booked);
		$criteria->compare('id_tarif_kapal',$this->id_tarif_kapal);
		$criteria->compare('harga',$this->harga);

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
                        ->from('kapal_order')
                        ->where('1')
                        ;
                foreach($searchParam as $column=>$value){
                    if(strpos($value, '.id')>0){
                        $sql->andWhere("$column ='$value'");
                    }else
                        $sql->andWhere("kapal_order.$column like '%$value%'");
                }
                $counterSql=  clone $sql;
                $sql->select("*");
                $data=new MyCSqlDataProvider($sql->getText());
                $counterSql->select='count(*) as jumlah';
                $jumlah=$counterSql->select('count(*) as jumlah')->queryRow();
                $data->setTotalItemCount($jumlah['jumlah']);
                                $data->setSort(array('attributes'=>array('id','id_order','is_booked','id_tarif_kapal','harga')));
                
                return $data;
	}
}
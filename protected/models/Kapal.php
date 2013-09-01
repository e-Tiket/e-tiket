<?php

/**
 * This is the model class for table "kapal".
 *
 * The followings are the available columns in table 'kapal':
 * @property integer $id
 * @property string $nama
 *
 * The followings are the available model relations:
 * @property PemberangkatanKapal[] $pemberangkatanKapals
 */
class Kapal extends MyCActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Kapal the static model class
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
		return 'kapal';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nama', 'required'),
			array('nama', 'length', 'max'=>32),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nama', 'safe', 'on'=>'search'),
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
			'pemberangkatanKapals' => array(self::HAS_MANY, 'PemberangkatanKapal', 'id_kapal'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nama' => 'Nama',
		);
	}

        public function dropdownModel(){
            $results=Yii::app()->db->createCommand()->select()
                    ->from($this->tableName())
                    ->queryAll();
            $data=array(''=>'- Pilih Kapal -');
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
		$criteria->compare('nama',$this->nama,true);

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
                        ->from('kapal')
                        ->where('1')
                        ;
                foreach($searchParam as $column=>$value){
                    if(strpos($value, '.id')>0){
                        $sql->andWhere("$column ='$value'");
                    }else
                        $sql->andWhere("kapal.$column like '%$value%'");
                }
                $counterSql=  clone $sql;
                $sql->select("*");
                $data=new MyCSqlDataProvider($sql->getText());
                $counterSql->select='count(*) as jumlah';
                $jumlah=$counterSql->select('count(*) as jumlah')->queryRow();
                $data->setTotalItemCount($jumlah['jumlah']);
                                $data->setSort(array('attributes'=>array('id','nama')));
                
                return $data;
	}
        public function getJadwal($id_pelabuhan_awal,$id_pelabuhan_tujuan,$tanggal,$tanggal_sebelum=''){
            $qry=Yii::app()->db->createCommand()
                    ->select("p.*,kapal.nama as kapal")
                    ->from("pemberangkatan_kapal p")
                    ->join("kapal", "p.id_kapal=kapal.id")
                    ->join("pelabuhan asal", "asal.id=p.id_pelabuhan_awal")
                    ->join("pelabuhan tujuan", "tujuan.id=p.id_pelabuhan_tujuan")
                    ->where(array('and',
                        "id_pelabuhan_awal='$id_pelabuhan_awal'",
                        "id_pelabuhan_tujuan='$id_pelabuhan_tujuan'",
                        "tanggal_berangkat>='$tanggal'"
                        ));
            if($tanggal_sebelum!='' && $tanggal_sebelum!=null){
                $qry->andWhere("tanggal_berangkat<='$tanggal_sebelum'");
            }
            $qry->order("tanggal_berangkat asc");
//            echo $qry->getText();exit;
            return $qry->queryAll();
        }
}
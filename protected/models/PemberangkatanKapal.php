<?php

/**
 * This is the model class for table "pemberangkatan_kapal".
 *
 * The followings are the available columns in table 'pemberangkatan_kapal':
 * @property integer $id
 * @property integer $id_pelabuhan_awal
 * @property integer $id_pelabuhan_tujuan
 * @property integer $id_kapal
 * @property string $tanggal_berangkat
 * @property string $jam_berangkat
 * @property string $tanggal_sampai
 * @property string $jam_sampai
 *
 * The followings are the available model relations:
 * @property Kapal $idKapal
 * @property Pelabuhan $idPelabuhanTujuan
 * @property Pelabuhan $idPelabuhanAwal
 * @property TarifKapal[] $tarifKapals
 */
class PemberangkatanKapal extends MyCActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PemberangkatanKapal the static model class
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
		return 'pemberangkatan_kapal';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tanggal_berangkat, jam_berangkat, tanggal_sampai, jam_sampai, id_pelabuhan_awal, id_pelabuhan_tujuan, id_kapal', 'required'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_pelabuhan_awal, id_pelabuhan_tujuan, id_kapal, tanggal_berangkat, jam_berangkat, tanggal_sampai, jam_sampai', 'safe', 'on'=>'search'),
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
			'idKapal' => array(self::BELONGS_TO, 'Kapal', 'id_kapal'),
			'idPelabuhanTujuan' => array(self::BELONGS_TO, 'Pelabuhan', 'id_pelabuhan_tujuan'),
			'idPelabuhanAwal' => array(self::BELONGS_TO, 'Pelabuhan', 'id_pelabuhan_awal'),
			'tarifKapals' => array(self::HAS_MANY, 'TarifKapal', 'id_pemberangkatan'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_pelabuhan_awal' => 'Pelabuhan Awal',
			'id_pelabuhan_tujuan' => 'Pelabuhan Tujuan',
			'id_kapal' => 'Kapal',
                        'tanggal_berangkat' => 'Tanggal Berangkat',
			'jam_berangkat' => 'Jam Berangkat',
			'tanggal_sampai' => 'Tanggal Sampai',
			'jam_sampai' => 'Jam Sampai',
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
	public function search2()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('id_pelabuhan_awal',$this->id_pelabuhan_awal);
		$criteria->compare('id_pelabuhan_tujuan',$this->id_pelabuhan_tujuan);
		$criteria->compare('id_kapal',$this->id_kapal);
                $criteria->compare('tanggal_berangkat',$this->tanggal_berangkat,true);
		$criteria->compare('jam_berangkat',$this->jam_berangkat,true);
		$criteria->compare('tanggal_sampai',$this->tanggal_sampai,true);
		$criteria->compare('jam_sampai',$this->jam_sampai,true);
                
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        public function search($searchParam=array())
	{
		if($searchParam==null){
                    $searchParam=array();
                }
                $sql=  Yii::app()->db->createCommand()
                        ->from('pemberangkatan_kapal')
                        ->join('pelabuhan pelabuhan_awal','pelabuhan_awal.id=pemberangkatan_kapal.id_pelabuhan_awal')
                        ->join('pelabuhan pelabuhan_tujuan','pelabuhan_tujuan.id=pemberangkatan_kapal.id_pelabuhan_tujuan')
                        ->join('kapal','kapal.id=pemberangkatan_kapal.id_kapal')
                        ->where('1')
                        ;
                $sql->order("pemberangkatan_kapal.id desc");
                foreach($searchParam as $column=>$value){
                    if(strpos($value, '.id')>0){
                        $sql->andWhere("$column ='$value'");
                    }else
                        $sql->andWhere("pemberangkatan_kapal.$column like '%$value%'");
                }
                $counterSql=  clone $sql;
                $sql->select('pemberangkatan_kapal.*,pelabuhan_awal.nama as pelabuhan_awal,pelabuhan_tujuan.nama as pelabuhan_tujuan,kapal.nama as kapal');
                $data=new MyCSqlDataProvider($sql->getText());
                $counterSql->select='count(*) as jumlah';
                $jumlah=$counterSql->select('count(*) as jumlah')->queryRow();
                $data->setTotalItemCount($jumlah['jumlah']);
                $data->setSort(array('attributes'=>array('id','id_pelabuhan_awal','id_pelabuhan_tujuan','id_kapal','tanggal_berangkat','jam_berangkat','tanggal_sampai','jam_sampai','pelabuhan_awal','pelabuhan_tujuan','kapal')));
                
                return $data;
	}
        public function getPemberangkatanKapal($id){
            $qry=  Yii::app()->db->createCommand()
                    ->select('pemberangkatan_kapal.*,asal.nama as pelabuhan_asal,tujuan.nama as pelabuhan_tujuan,kapal.nama as kapal')
                    ->from('pemberangkatan_kapal')
                    ->join('pelabuhan asal','asal.id=id_pelabuhan_awal')
                    ->join('pelabuhan tujuan','tujuan.id=id_pelabuhan_tujuan')
                    ->join('kapal','kapal.id=id_kapal')
                    ->where("pemberangkatan_kapal.id='$id'");
            return $qry->queryRow();
        }
        public function duplicate($id,$data){
//            $this->show_array($data);exit;
            $pemberangkatan=  Yii::app()->db->createCommand()
                    ->select()
                    ->from('pemberangkatan_kapal')
                    ->where("id='$id'")
                    ->queryRow()
                    ;
            unset($pemberangkatan['id']);
            $pemberangkatan['tanggal_berangkat']=$data['tanggal_berangkat'];
            $pemberangkatan['jam_berangkat']=$data['jam_berangkat'];
            $pemberangkatan['tanggal_sampai']=$data['tanggal_sampai'];
            $pemberangkatan['jam_sampai']=$data['jam_sampai'];
            $tarifList=Yii::app()->db->createCommand()
                    ->select()
                    ->from('tarif_kapal')
                    ->where("id_pemberangkatan='$id'")->queryAll();
            $conn=  Yii::app()->db;
            $transaction=$conn->beginTransaction();
            try{
                $conn->createCommand()->insert('pemberangkatan_kapal', $pemberangkatan);
                $pemberangkatanMax=$conn->createCommand("select max(id) id from pemberangkatan_kapal")->queryRow();
                foreach($tarifList as $tarif){
                    unset($tarif['id']);
                    $tarif['id_pemberangkatan']=$pemberangkatanMax['id'];
                    $conn->createCommand()->insert('tarif_kapal', $tarif);
                }
                $transaction->commit();
                return true;
            }catch(Exception $e){
                $transaction->rollback();
                return false;
            }
        }
}
<?php

/**
 * This is the model class for table "notification_admin".
 *
 * The followings are the available columns in table 'notification_admin':
 * @property integer $id
 * @property string $url
 * @property string $message
 * @property string $waktu
 * @property integer $read_by
 */
class NotificationAdmin extends MyCActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return NotificationAdmin the static model class
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
		return 'notification_admin';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('url, message, waktu, read_by', 'required'),
			array('read_by', 'numerical', 'integerOnly'=>true),
			array('url', 'length', 'max'=>255),
			array('message', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, url, message, waktu, read_by', 'safe', 'on'=>'search'),
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
			'url' => 'Url',
			'message' => 'Message',
			'waktu' => 'Waktu',
			'read_by' => 'Read By',
		);
	}

        public function dropdownModel(){
            $results=Yii::app()->db->createCommand()->select()
                    ->from($this->tableName())
                    ->queryAll();
            $data=array(''=>'- Pilih Notification Admin -');
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
		$criteria->compare('url',$this->url,true);
		$criteria->compare('message',$this->message,true);
		$criteria->compare('waktu',$this->waktu,true);
		$criteria->compare('read_by',$this->read_by);
                $criteria->order="waktu desc";

		$cActive=new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
                $cActive->setPagination(array(
                    'pageSize' => 30,
                    ));
                return $cActive;
	}
        public function search2($searchParam=array())
	{
		if($searchParam==null){
                    $searchParam=array();
                }
                $sql=  Yii::app()->db->createCommand()
                        ->from('notification_admin')
                        ->where('1')
                        ;
                foreach($searchParam as $column=>$value){
                    if($value=='')continue;
                    
                    if(strpos($column, 'url')>0 || $column=='url'){
                        $sql->andWhere("$column like '$value%'");
                    }else if(strpos($column, 'read_by')>0 || $column=='read_by'){
                        if($value=='0' ){
                            $sql->andWhere("$column is null ");
                        }else
                            $sql->andWhere("$column is not null");
                    }else if(strpos($column, '.id')>0 || substr($column, 0,2)=='id'){
                        $sql->andWhere("$column ='$value'");
                    }else
                        $sql->andWhere("notification_admin.$column like '%$value%'");
                }
                $sql->order(array('waktu desc'));
                $counterSql=  clone $sql;
//                echo $sql->getText();exit;
                $sql->select("notification_admin.*");
                $data=new MyCSqlDataProvider($sql->getText());
                $counterSql->select='count(*) as jumlah';
                $jumlah=$counterSql->select('count(*) as jumlah')->queryRow();
                $data->setTotalItemCount($jumlah['jumlah']);
                $data->setSort(array('attributes'=>array('url', 'message', 'waktu', 'read_by')));
                
                return $data;
	}
        function getLastNotif($last_notif){
            return Yii::app()->db->createCommand()
                    ->select()
                    ->from('notification_admin')
                    ->where("waktu>'$last_notif'")
                    ->andWhere("read_by is NULL")
                    ->order(array('waktu desc'))->queryAll();
        }
        public function getNotification(){
            $lastNotif=Yii::app()->db->createCommand()
                    ->select()
                    ->from('notification_admin')
                    ->where("read_by is null")
                    ->order(array('waktu asc'))
                    ->queryRow();
            if(is_array($lastNotif)){
                return Yii::app()->db->createCommand()
                    ->select()
                    ->from('notification_admin')
                    ->where("waktu>='$lastNotif[waktu]'")
                    ->order(array('waktu desc'))
                    ->queryAll();
            }else{
                return Yii::app()->db->createCommand()
                    ->select()
                    ->from('notification_admin')    
                    ->order(array('waktu desc'))
                    ->limit(1,5)    
                    ->queryAll();
            }
        }
        
        function countUnreadNotification(){
            $notif=Yii::app()->db->createCommand()
                    ->select('count(*) as jumlah')
                    ->from('notification_admin')    
                    ->where("read_by is null")    
                    ->queryRow();
            return $notif['jumlah'];
        }
        public function markAsRead(){
            Yii::app()->db->createCommand()->update("notification_admin", array('read_by'=>Yii::app()->user->getUserId()));
        }
}
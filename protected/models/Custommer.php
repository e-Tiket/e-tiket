<?php

/**
 * This is the model class for table "custommer".
 *
 * The followings are the available columns in table 'custommer':
 * @property integer $id
 * @property string $nama_depan
 * @property string $alamat
 * @property string $nama_belakang
 * @property string $no_telp
 * @property string $no_telp_lainnya
 * @property string $username
 * @property string $password
 * @property string $email
 *
 * The followings are the available model relations:
 * @property Order[] $orders
 * @property ProfilePenumpang[] $profilePenumpangs
 */
class Custommer extends MyCActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Custommer the static model class
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
		return 'custommer';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nama_depan, nama_belakang, no_telp, username, password', 'required'),
			array('nama_depan, password', 'length', 'max'=>32),
			array('alamat, nama_belakang, email', 'length', 'max'=>50),
			array('no_telp, no_telp_lainnya', 'length', 'max'=>15),
			array('username', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nama_depan, alamat, nama_belakang, no_telp, no_telp_lainnya, username, password, email', 'safe', 'on'=>'search'),
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
			'orders' => array(self::HAS_MANY, 'Order', 'id_custommer'),
			'profilePenumpangs' => array(self::HAS_MANY, 'ProfilePenumpang', 'id_costummer'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nama_depan' => 'Nama Depan',
			'alamat' => 'Alamat',
			'nama_belakang' => 'Nama Belakang',
			'no_telp' => 'No Telp',
			'no_telp_lainnya' => 'No Telp Lainnya',
			'username' => 'Username',
			'password' => 'Password',
			'email' => 'Email',
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
		$criteria->compare('nama_depan',$this->nama_depan,true);
		$criteria->compare('alamat',$this->alamat,true);
		$criteria->compare('nama_belakang',$this->nama_belakang,true);
		$criteria->compare('no_telp',$this->no_telp,true);
		$criteria->compare('no_telp_lainnya',$this->no_telp_lainnya,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('email',$this->email,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        public function login(Custommer $custommer){
                $_identity=new UserIdentity($custommer->username,$custommer->password);
                $_identity->type='custommer';
                $_identity->authenticate('custommer');
		if($_identity->errorCode===UserIdentity::ERROR_NONE)
		{
			$duration=  Helper::getQuery('rememberMe') ? 3600*24*30 : 0; // 30 days
			Yii::app()->user->login($_identity,$duration);
                        return true;
                }else{
                    return false;
                }
        }
}
    <?php

/**
 * This is the model class for table "gallery_photo".
 *
 * The followings are the available columns in table 'gallery_photo':
 * @property integer $id
 * @property integer $id_gallery
 * @property integer $rank
 * @property string $nama
 * @property string $deskripsi
 * @property string $path_file
 *
 * The followings are the available model relations:
 * @property Gallery $idGallery
 */
class GalleryPhoto extends MyCActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return GalleryPhoto the static model class
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
		return 'gallery_photo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_gallery', 'required'),
			array('id_gallery, rank', 'numerical', 'integerOnly'=>true),
			array('nama', 'length', 'max'=>512),
			array('path_file', 'length', 'max'=>128),
			array('deskripsi', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_gallery, rank, nama, deskripsi, path_file', 'safe', 'on'=>'search'),
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
			'idGallery' => array(self::BELONGS_TO, 'Gallery', 'id_gallery'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_gallery' => 'Gallery',
			'rank' => 'Rank',
			'nama' => 'Nama',
			'deskripsi' => 'Deskripsi',
			'path_file' => 'Nama File',
		);
	}

        public function dropdownModel(){
            $results=Yii::app()->db->createCommand()->select()
                    ->from($this->tableName())
                    ->queryAll();
            $data=array(''=>'- Pilih Gallery Photo -');
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
		$criteria->compare('id_gallery',$this->id_gallery);
		$criteria->compare('rank',$this->rank);
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('deskripsi',$this->deskripsi,true);
		$criteria->compare('path_file',$this->path_file,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        public function getData(){
            return $this->findAll();
        }
        
        public function getSort(){
            return false;
        }
        public function getPagination(){
            return false;
        }
        public function getTotalItemCount(){
            return false;
        }
        public function getItemCount(){
            return false;
        }
        public function getKeys(){
            return array('path_file');
        }
}
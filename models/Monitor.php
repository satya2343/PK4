<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "monitor".
 *
 * @property integer $id
 * @property string $waktu_masuk
 * @property string $waktu_keluar
 * @property string $id_tempat
 * @property integer $is_there
 */
class Monitor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'monitor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['waktu_masuk', 'id_tempat','is_there'], 'required'],
            [['id', 'is_there'], 'integer'],
            [['waktu_masuk','waktu_keluar'], 'safe'],
            [['id_tempat'], 'availableValidate'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'waktu_masuk' => 'Waktu Masuk',
            'waktu_keluar' => 'Waktu Keluar',
            'id_tempat' => 'Id Tempat',
            'is_there' => 'Is There',
        ];
    }

    //untuk mengecek availability dari tempat parkir
    //bentuk output array of array
    public function cekAvailable(){
        $connection = self::getDb();
        $command = $connection->createCommand('SELECT * FROM `monitor` WHERE waktu_keluar IS NULL ');
        $result = $command->queryAll();
        $dataAvailability = [];
        $status = [];
        $i=1;
        foreach ($result as $data){
            for ($i=1;$i<=5;$i++){
                if ($i == $data['id_tempat']){
                    $status['available'] = 0;
                    $status['id_user'] = $data['id'];
                    $status['is_there'] = $data['is_there'];
                    $dataAvailability[$i]=$status;
                }elseif (empty($dataAvailability[$i])){
                    $status['available']=1;
                    $status['id_user']=0;
                    $status['is_there']=0;
                    $dataAvailability[$i]=$status;
                }
            }
        }
        return $dataAvailability;
    }

    //validasi!!
    //inputan baru harus tidak boleh memberikan alamat parkir yang sama
    public function availableValidate($attribute)
    {
        $tempat = $this->$attribute;

        $available = $this->cekAvailable();
        for ($i=1;$i<=5;$i++){
            if($available[$i]['available'] == 0 && $tempat == $i ){
                $this->addError($attribute,'Tempat Sudah Diisi!!');
            }
        }
    }
}

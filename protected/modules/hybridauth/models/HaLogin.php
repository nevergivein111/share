<?php

/**
 * This is the model class for table "ha_logins".
 *
 * The followings are the available columns in table 'ha_logins':
 * @property integer $userId
 * @property string $loginProvider
 * @property string $loginProviderIdentifier
 *
 * The followings are the available model relations:
 * @property User $user
 */
class HaLogin extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return HaLogin the static model class
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
        return 'ha_logins';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('userId, loginProvider, loginProviderIdentifier', 'required'),
            array('userId', 'numerical', 'integerOnly'=>true),
            array('loginProvider', 'length', 'max'=>50),
            array('loginProviderIdentifier', 'length', 'max'=>100),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('userId, loginProvider, loginProviderIdentifier', 'safe', 'on'=>'search'),
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
            'user' => array(self::BELONGS_TO, 'User', 'userId'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'userId' => 'User',
            'loginProvider' => 'Login Provider',
            'loginProviderIdentifier' => 'Login Provider Identifier',
        );
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

        $criteria->compare('userId',$this->userId);
        $criteria->compare('loginProvider',$this->loginProvider,true);
        $criteria->compare('loginProviderIdentifier',$this->loginProviderIdentifier,true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    /**
     * @param $loginProvider
     * @param $loginProviderIdentity
     * @return User|null
     */
    public static function getUser($loginProvider,$loginProviderIdentity) {
        /* @var $haLogin HaLogin */
        $haLogin = self::model()->findByAttributes(array('loginProvider' => $loginProvider,'loginProviderIdentifier'=>$loginProviderIdentity));
		
		if ($haLogin === null) {
			return null;
		} else {
			// TODO - Can't seem to get this to work with relations properly....
			$user = new User();
			return $user->findByPk($haLogin->userId);
		}
		
	}

    /**
     * @param $userId
     * @return HaLogin[]
     */
    public static function getLogins($userId) {
        return self::model()->findAllByAttributes(array('userId'=>$userId));
	}

    /**
     * @param $userId
     * @param $provider
     * @return HaLogin
     */
    public static function getLogin($userId,$provider) {

        return self::model()->findByAttributes(array('userId'=>$userId,'loginProvider'=>$provider));
	}
}
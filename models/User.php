<?php

namespace app\models;

use app\components\helpers\PasswordHelper;
use Yii;
use yii\base\ErrorException;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $email
 * @property string $username
 * @property string $password_hash
 * @property integer $role_id
 * @property integer $status_id
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property UserStatus $status
 * @property UserRole $role
 * @property Person $student
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    public $authKey;

    public $new_password;


    /**
     * Роли пользователей
     */
    const ROLE_ADMIN                = 1; //Администраторы
    const ROLE_AUTH_USER            = 2; //Авторизированный пользователь
    const ROLE_GUEST                = 3; //Гость


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password_hash', 'email'], 'required'],
            [['role_id', 'status_id', 'created_at', 'updated_at'], 'integer'],
            [['email', 'username'], 'string', 'max' => 100],
            [['email'], 'email'],
            [['password_hash', 'new_password'], 'string', 'max' => 255, 'min' => 6],
            [['email'], 'unique'],
            [['username'], 'unique'],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserStatus::className(), 'targetAttribute' => ['status_id' => 'id']],
            [['role_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserRole::className(), 'targetAttribute' => ['role_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'            => Yii::t('app', 'ID'),
            'email'         => Yii::t('app', 'Email'),
            'username'      => Yii::t('app', 'Login'),
            'password_hash' => Yii::t('app', 'Password'),
            'role_id'       => Yii::t('app', 'Role ID'),
            'status_id'     => Yii::t('app', 'Status ID'),
            'created_at'    => Yii::t('app', 'Created At'),
            'updated_at'    => Yii::t('app', 'Updated At'),
            'new_password'  => Yii::t('app', 'New Password'),
        ];
    }


    public function beforeValidate()
    {

        if (!empty($this->new_password)) {
            $this->password_hash = Yii::$app->getSecurity()->generatePasswordHash($this->new_password);
        }
        if (empty($this->new_password)) {
            $this->password_hash = Yii::$app->getSecurity()->generatePasswordHash(PasswordHelper::generate());
        }

        return parent::beforeValidate();
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            return true;
        }
        return false;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(UserStatus::className(), ['id' => 'status_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRole()
    {
        return $this->hasOne(UserRole::className(), ['id' => 'role_id']);
    }

    public function getStudent()
    {
        return $this->hasOne(Student::className(), ['user_id' => 'id']);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        $user = self::find()->where(['id' => $id])->asArray()->one();
        return !empty($user) ? new static($user) : null;
    }

    /**
     * @inheritdoc
     */
    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        $user = User::find()->where(['access_token' => $token])->one();
        return !empty($user) ? new static($user) : null;
    }

    /**
     * Finds user by username
     *
     * @param  string      $username
     * @return static|null
     */
    public static function findByUsername($username, $role_id = false)
    {
        $user = self::find()->where(['username' => $username]);
        if ($role_id)
            $user->andWhere(['role_id' => $role_id]);
        $user = $user->one();

        return !empty($user) ? new static($user) : null;
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->getSecurity()->validatePassword($password, $this->password_hash);
    }

    /**
     * Редирект в кабинет пользователя согласно ролям
     */
    public static function goToCabinet()
    {
        switch (Yii::$app->user->identity->role_id) {
            case self::ROLE_ADMIN:
                return Yii::$app->response->redirect(Yii::$app->params['cp']['url']['afterLogin']);
            case self::ROLE_AUTH_USER:
                return Yii::$app->response->redirect(Yii::$app->params['authUser']['url']['afterLogin']);
            case self::ROLE_GUEST:
                return Yii::$app->response->redirect(Yii::$app->params['guest']['url']['afterLogin']);

            default:
                throw new ErrorException(Yii::t('app','Invalid user role'));
        }
    }
}

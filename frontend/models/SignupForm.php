<?php
namespace frontend\models;

use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $name;
    public $phone;
    public $city;
    public $ip;
    public $password;
    public $created_at;
    public $updated_at;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'phone', 'city', 'password'], 'trim'],
            [['name', 'phone', 'city', 'password'], 'required', 'message' => '不能为空'],
            ['name', 'string', 'length' => [2, 5], 'tooShort'=>'姓名只能填写2-5个字符', 'tooLong'=>'姓名只能填写2-5个字符'],
            ['phone', 'match', 'pattern' => '/^1[3-9]\d{9}$/', 'message' => '手机号码不正确'],
            ['phone', 'unique', 'targetClass' => '\common\models\User', 'message' => '此手机号码已经被注册'],
            ['password', 'string', 'min' => 6, 'max' => 22, 'tooShort'=>'密码至少为6位字符', 'tooLong'=>'密码最多为22位字符'],
            [['created_at', 'updated_at'], 'default', 'value' => date('Y-m-d H:i:s')],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
    
        $user = new User;
        $user->name = $this->name;
        $user->phone = $this->phone;
        $user->city = $this->city;
        $user->ip = \Yii::$app->request->userIp;
        $user->created_at = $this->created_at;
        $user->updated_at = $this->updated_at;

        $user->setPassword($this->password);

        $user->generateAuthKey();

        return $user->save() ? $user : null;
    }
}

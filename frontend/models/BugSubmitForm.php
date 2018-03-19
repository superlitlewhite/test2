<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\Bug;
use yii\web\UploadedFile;

/**
 * Signup form
 */
class BugSubmitForm extends Model
{
    public $url;
    public $pic;
    public $detail;
    public $created_at;
    public $updated_at;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['url', 'detail'], 'trim'],
            [['url', 'detail'], 'required', 'message' => '不能为空'],
            [['pic'], 'file', 'skipOnEmpty' => true, 'maxFiles' => 5, 'extensions' => ['png', 'jpg', 'gif'], 'message' => '最多不能超过五张图片,格式只能使用png,jpg,gif'],
            [['created_at', 'updated_at'], 'default', 'value' => date('Y-m-d H:i:s')]
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function bugsubmit()
    {
        if (!$this->validate()) {
            return null;
        }
        
        foreach ($this->pic as $pic_tmp) {
            // var_dump($pic_tmp->tempName);
            var_dump('asdasd');

            $path = Yii::getAlias('@webroot/uploads/'. time().'.'. rand(1, 10000) .'.' .$pic_tmp->extension);

            $pic_tmp->saveAs($path);

        }

        $bug = new Bug();
        $bug->url = $this->url;
        $bug->picurl = $path; 
        $bug->detail = $this->detail;
        $bug->created_at = $this->created_at;
        $bug->updated_at = $this->updated_at;
 
        return $bug->save() ? $bug : null;
    }
}

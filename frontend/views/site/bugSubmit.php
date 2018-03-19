<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'BUG提交';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>请填写下列输入框提交您发现的BUG</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'bug-form', 'options' => ['enctype' => 'multipart/form-data']]); ?>

                <?= $form->field($model, 'url')->label('出错页面的url')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'pic[]')->label('上传图片')->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>  

                <?= $form->field($model, 'detail')->label('错误描述')->textarea(['rows'=>3]) ?>

                <div class="form-group">
                    <?= Html::submitButton('提交', ['class' => 'btn btn-primary', 'name' => 'bug-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

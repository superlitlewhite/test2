<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = '注册';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="site-login">
	<h1><?= Html::encode($this->title) ?></h1>

	<p></p>

	<div class="row">
		<div class="col-lg-5">
			<?php $form = ActiveForm::begin(['id' => 'signup-form']); ?>

				<?= $form->field($model, 'phone')->label('手机号码')->textInput(['autofocus' => true]) ?>
				
				<?= $form->field($model, 'name')->label('姓名') ?>

				<?= $form->field($model, 'city')->label('城市') ?>

				<?= $form->field($model, 'password')->label('密码')->passwordInput() ?>

			 	<div class="form-group">
                    <?= Html::submitButton('提交注册', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

			<?php $form = ActiveForm::end(); ?>
		</div>
	</div>

</div>
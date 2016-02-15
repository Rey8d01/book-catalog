<?php
/**
 * @var yii\web\View $this
 * @var app\models\Author $modelAuthor
 * @var yii\widgets\ActiveForm $form
 */

use yii\widgets\ActiveForm;
use yii\helpers\Html;

?>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($modelAuthor, 'name')->textInput(); ?>
<?= $form->field($modelAuthor, 'description')->textarea(); ?>
<?= $form->field($modelAuthor, 'photo')->textInput(); ?>

<div class="form-group">
    <?= Html::submitButton($modelAuthor->isNewRecord ? 'Добавить' : 'Обновить', ['class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>

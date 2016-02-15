<?php
/**
 * @var yii\web\View $this
 * @var app\models\Tag $modelTag
 * @var yii\widgets\ActiveForm $form
 */

use yii\widgets\ActiveForm;
use yii\helpers\Html;

?>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($modelTag, 'title')->textInput(); ?>
<?= $form->field($modelTag, 'alias')->textInput(); ?>

<div class="form-group">
    <?= Html::submitButton($modelTag->isNewRecord ? 'Добавить' : 'Обновить', ['class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>

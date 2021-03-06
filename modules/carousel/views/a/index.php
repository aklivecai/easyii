<?php
use yii\easyii\modules\carousel\models\Carousel;
use yii\helpers\Html;

$this->title = Yii::t('easyii/carousel', 'Carousel');
?>

<?= $this->render('_menu') ?>

<?php if($data->count > 0) : ?>
    <table class="table table-hover">
        <thead>
            <tr>
                <?php if(IS_ROOT) : ?>
                    <th width="30">#</th>
                <?php endif; ?>
                <th><?= Yii::t('easyii', 'Image') ?></th>
                <th width="100"><?= Yii::t('easyii', 'Status') ?></th>
                <th width="120"></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($data->models as $item) : ?>
            <tr data-id="<?= $item->primaryKey ?>">
                <?php if(IS_ROOT) : ?>
                    <td><?= $item->primaryKey ?></td>
                <?php endif; ?>
                <td><a href="/admin/carousel/a/edit/<?= $item->primaryKey ?>"><img src="<?= $item->image ?>" style="width: 550px;"></a></td>
                <td class="status vtop">
                    <?= Html::checkbox('', $item->status == Carousel::STATUS_ON, [
                        'class' => 'switch',
                        'data-id' => $item->primaryKey,
                        'data-link' => '/admin/carousel/a/'
                    ]) ?>
                </td>
                <td>
                    <div class="btn-group btn-group-sm" role="group">
                        <a href="/admin/carousel/a/up/<?= $item->primaryKey ?>" class="btn btn-default move-up" title="<?= Yii::t('easyii', 'Move up') ?>"><span class="glyphicon glyphicon-arrow-up"></span></a>
                        <a href="/admin/carousel/a/down/<?= $item->primaryKey ?>" class="btn btn-default move-down" title="<?= Yii::t('easyii', 'Move down') ?>"><span class="glyphicon glyphicon-arrow-down"></span></a>
                        <a href="/admin/carousel/a/delete/<?= $item->primaryKey ?>" class="btn btn-default confirm-delete" title="<?= Yii::t('easyii', 'Delete item') ?>"><span class="glyphicon glyphicon-remove"></span></a>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <?= yii\widgets\LinkPager::widget([
        'pagination' => $data->pagination
    ]) ?>
<?php else : ?>
    <p><?= Yii::t('easyii', 'No records found') ?></p>
<?php endif; ?>
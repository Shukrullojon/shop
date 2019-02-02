<?php if(isset($category['childs'])): ?>
    <li class="dropdown magz-dropdown">
        <a href="index.html">
            <?= $category['name'] ?><i class="ion-ios-arrow-right"></i>
            <?php if(isset($category['childs'])): ?>
                <ul class="dropdown-menu">
                    <?= $this->getMenuHtml($category['childs']) ?>
                </ul>
            <?php endif;?>
        </a>
    </li>
<?php endif; ?>

<?php if(!isset($category['childs'])): ?>
    <li>
        <a href="<?= \yii\helpers\Url::to(['category/view','id'=>$category['id']]) ?>">
            <?= $category['name'] ?>
        </a>
    </li>
<?php endif; ?>



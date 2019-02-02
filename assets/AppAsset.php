<?php
namespace app\assets;
use yii\web\AssetBundle;

class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'scripts/bootstrap/bootstrap.min.css',
		'scripts/ionicons/css/ionicons.min.css',
		'scripts/toast/jquery.toast.min.css',
		'scripts/owlcarousel/dist/assets/owl.carousel.min.css',
		'scripts/owlcarousel/dist/assets/owl.theme.default.min.css',
		'scripts/magnific-popup/dist/magnific-popup.css',
		'scripts/sweetalert/dist/sweetalert.css',
		'css/style.css',
		'css/skins/all.css',
		'css/demo.css',
    ];
    public $js = [
    	'js/jquery.js',
		'js/jquery.migrate.js',
		'scripts/bootstrap/bootstrap.min.js',
		//<script>var $target_end=$(".best-of-the-week");</script>
		'scripts/jquery-number/jquery.number.min.js',
		'scripts/owlcarousel/dist/owl.carousel.min.js',
		'scripts/magnific-popup/dist/jquery.magnific-popup.min.js',
		'scripts/easescroll/jquery.easeScroll.js',
		'scripts/sweetalert/dist/sweetalert.min.js',
		'scripts/toast/jquery.toast.min.js',
		'js/demo.js',
		'js/e-magz.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}

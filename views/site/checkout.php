<?php
    use yii\helpers\Url;
    use yii\helpers\Html;
?>
<section>
    <h4 style="text-align: center">Buyurtmani rasmiylashtirish</h4>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <p style="text-align: center">Bog'lanish uchun</p>
                    </div>
                    <div class="panel-body">
                        <form action="" method="post">
                            <label>Ism</label>
                            <input type="text" class="form-control">
                            <label>Familya</label>
                            <input type="text" class="form-control">
                            <label>Elektron Pochta</label>
                            <input type="text" class="form-control">
                            <label>Tel</label>
                            <input type="text" class="form-control">
                            <label>Yetqazib berish</label>
                            <select class="form-control">
                                <option>Uy yoki officka yetqazib berish</option>
                                <option>Pick - up</option>
                            </select>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</section>

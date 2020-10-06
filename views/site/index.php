<?php

    /* @var $this yii\web\View */

    $this->title = 'Главная страница';
?>
<div class="site-index">

    <div class="jumbotron">

        <p><a class="btn btn-primary" href="/postbackview">Список импортов</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-7">
                <b>Пример запроса:</b><br>
                http://postback.com.xsph.ru/postback?cid=0974dsye2sy0256&campaign_id=213&time=1596407855299&sub1=200802add6cf&event=Install
            </div>

            <div class="col-lg-6">
                <b>Аpi:</b><br>
                http://postback.com.xsph.ru/postback/api
                <br>
                <b>Аpi пример запроса:</b><br>
                http://postback.com.xsph.ru/postback/api?group_by=campaign_id&create_from=2020-10-05
            </div>
        </div>

    </div>
</div>

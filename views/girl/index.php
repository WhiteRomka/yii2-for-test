<?php

use yii\data\ActiveDataProvider;
use yii\web\View;
use yii\widgets\Pjax;

/** @var View $this */
/** @var ActiveDataProvider $dataProvider */
?>
<?php Pjax::begin(['timeout' => 5000]); ?>
<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <h3>No Ajax</h3>
            <?php $p = ['id', 'price', 'age'];?>
            <?php foreach ($p as $param) :?>
                <div class="row">
                    <div class="col-sm-4">
                        <span style="text-transform: uppercase"> <?= $param?>:</span>
                    </div>
                    <div class="col-sm-4">
                        <a data-pjax="1" class="js-super" href="?sort=<?= $param?>"> <?= $param?> >>></a>
                    </div>
                    <div class="col-sm-4">
                        <a data-pjax="1" href="?sort=-<?= $param?>"> <?= $param?> <<< </a>
                    </div>
                </div>
            <?php endforeach;?>
            <div class="row">
                <a data-pjax="1" class="js-super-super" href="?sort=-id&GirlSearch[name]=Alice">Super Link</a>
            </div>
        </div>

        <div class="col-sm-6">
            <h3>Ajax</h3>
            <div class="col-sm-4">
                <span style="text-transform: uppercase"> ID:</span>
            </div>
            <div class="col-sm-4">
                <a data-pjax="1" class="js-sort-id-asc" href="?sort=id"> id >>></a>
            </div>
            <div class="col-sm-4">
                <a data-pjax="1" class="js-sort-id-desc" href="?sort=-id"> id <<<</a>
            </div>
        </div>
    </div>
</div>
<br>


<div class="js-ajax-paste">
<?= $this->render('_girls', ['dataProvider' => $dataProvider])?>
</div>
<?php Pjax::end(); ?>

<script>
   /* document.addEventListener('DOMContentLoaded', function(){
        $(document).on('click', '.js-sort-id-asc, .js-sort-id-desc', function(e){
            console.log('click');
            e.preventDefault();
            let target =  e.target;
            if ($(target).hasClass('js-sort-id-asc')) {
                $.get('/girl/index?sort=id')
                    .done(function(data){
                        paste(data)
                    })
            }
            if ($(target).hasClass('js-sort-id-desc')) {
                $.get('/girl/index?sort=-id')
                    .done(function(data){
                        paste(data)
                    })
            }
        })

        function paste(content) {
            console.log('paste');
            $('.js-ajax-paste').html(content)
            updateURL();
        }

        $(document).on('click', '.js-super', function(e){
            e.preventDefault();
            $('.js-super-super').click();
            setTimeout(()=>{
                alert('yyy');
                updateURL();
            },3000)

        })


        function updateURL() {
            if (history.pushState) {
                var baseUrl = window.location.protocol + "//" + window.location.host + window.location.pathname;
                var newUrl = baseUrl + '?tyapk=awesome';
                history.pushState(null, null, newUrl);
            }
            else {
                console.warn('History API не поддерживается');
            }
        }
    })*/
</script>

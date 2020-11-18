<?php

/* @var $this yii\web\View */

$this->title = Yii::$app->params['GeneralTitle'];
$absoluteUrl = \yii\helpers\Url::home(true);
?>
<div class="site-index">

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">My Appraisals</div>
                </div>
                <div class="card-body">
                    <table class="table table-hover" id="appraisal"></table>
                </div>
            </div>
        </div>
    </div>



</div>
<input type="hidden" id="absolute" value="<?= $absoluteUrl ?>" />
<?php

$script = <<<JS

    const url = document.querySelector('#absolute').value;
    $('#appraisal').DataTable({
           
            //serverSide: true,  
            ajax: url+'site/list',
            paging: true,
            searching: false,
            columns: [
                { title: 'id' ,data: 'id'},
                { title: 'Appraisal Calendar' ,data: 'calendar'},
                { title: 'Employee No' ,data: 'Employee_no'},
                { title: 'Department' ,data: 'Department'},
                { title: 'Action' ,data: 'link'},
                   
            ] ,                              
           language: {
                "zeroRecords": "No Appraisals display"
            },
            
            order : [[ 0, "asc" ]]
            
           
       });
JS;

$this->registerJs($script);
?>

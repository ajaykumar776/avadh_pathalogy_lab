<?php
use yii\bootstrap\Alert;
use yii\db\Query ;
use app\models\BillItem;
use app\models\Category;
use app\models\BillItemSearch;
use yii\web\Controller;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use app\models\HospitalBill;
use app\models\Scategory;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Connection;

?>

<?php
 



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        @media print {
            body * {
                visibility: hidden;
            }
            .print,.print *{
                visibility: visible;

            }

            

        }
    </style>
</head>
<body><br><br><br><br>
<div class="container ">
		<div class="row">
			<div class="col-md-12 print">
				<table class="table table-bordered table-hover">
					<thead class="thead-dark">
						<tr>
							<th>ITEMS</th>
							<th>UNIT-RATE</th>
							<th>QUANTITY</th>
							<th>AMOUNT</th>
						</tr>
					</thead>
					<tbody>
							<?php foreach($billitems as $billitem){?>
                               <?php $data= $billitem->category_id;?>

                                <?php $subcategory =  Scategory::find()->where(['category_id'=> $billitem->category_id])->where(['amount'=> $billitem->unit_rate])->one();?>
                                <?php $total = HospitalBill::find()->where(['id'=> $billitem->hospital_bill_id])->one();?>
                                <tr>
                                    <td><?php  echo $subcategory->name;?></td>
                                    <td><?php  echo $billitem->unit_rate; ?></td>
                                    <td><?php  echo $billitem->quantity; ?></td>
                                    <td><?php  echo $billitem->amount; ?></td>
                                    
                                </tr>
                            <?php }?>

                        
									
					</tbody>
						
				</table> <h2>Total Amount :<span class="text-align:left"><?php  echo $total->total_charges;?></span><h2>
                
			</div>
            
		</div>
        <button type="button" id="btn" onclick="window.print()" class="btn btn-outline-info ">PRINT </button>
    </div>
</body>
</html>
   
   
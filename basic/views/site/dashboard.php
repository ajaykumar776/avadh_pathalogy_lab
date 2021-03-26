<!-- <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd">
	<div class="container-fluid">
		<ul class="nav navbar-nav navbar-center">
			<li class="nav-item">
				<a href="http://localhost/ajay_office/yii/basic/web/index.php?r=site/dashboard" class="nav-link">Dashboard</a>
			</li>
		</ul>
	</div>
</nav><br> -->
<br><br><br>
<div class="container">

	<div class="row" style="padding:20px">
			<div class="col-md-2">
				<div class="card bg-light" style="width:300px">
					<div class="card-header"><p>Doctors</p></div>
					<div class="card-body"><p class="card-text">No.of total Doctors:<?php echo Yii::$app->Common->get_doctor();?></p>
						<a href="http://localhost/ajay_office/avadh_pathalogy_lab/basic/web/index.php?r=doctor/index"class="btn btn-danger">click here to see</a>
					</div>
				</div>
			</div>
			<div class="col-md-2">
				<div class="card bg-light" style="width:300px">
					<div class="card-header"><p>Patients</p></div>
					<div class="card-body"><p class="card-text">No.of Patient: <?php echo Yii::$app->Common->get_patient();?></p>
						<a href="http://localhost/ajay_office/avadh_pathalogy_lab/basic/web/index.php?r=patient/index"class="btn btn-info">click here to see </a>
					</div>
				</div>
			</div>
			<div class="col-md-2">
				<div class="card bg-light" style="width:300px">
					<div class="card-header"><p>Category</p></div>
					<div class="card-body"><p class="card-text">No.of category: <?php echo Yii::$app->Common->get_category();?></p>
						<a href="http://localhost/ajay_office/avadh_pathalogy_lab/basic/web/index.php?r=category/index"class="btn btn-success">click here to see</a>
					</div>
				</div>
			</div>
			<div class="col-md-2">
				<div class="card bg-light" style="width:300px">
					<div class="card-header"><p>Subcategory</p></div>
					<div class="card-body"><p class="card-text">Total Subcategory : <?php echo Yii::$app->Common->get_subcategory();?></p>
						<a href="http://localhost/ajay_office/avadh_pathalogy_lab/basic/web/index.php?r=scategory/index"class="btn btn-primary">click here to see</a>
					</div>
				</div>
			</div>
			<div class="col-md-2">
				<div class="card bg-light" style="width:300px">
					<div class="card-header"><p>Bill</p></div>
					<div class="card-body"><p class="card-text">Total Bill : <?php echo Yii::$app->Common->get_bill();?></p>
						<a href="http://localhost/ajay_office/avadh_pathalogy_lab/basic/web/index.php?r=bill/index"class="btn btn-primary">click here to see</a>
					</div>
				</div>
			</div>
			<div class="col-md-2">
				<div class="card bg-light" style="width:300px">
					<div class="card-header"><p>Bill-Item</p></div>
					<div class="card-body"><p class="card-text">Total Bill_item : <?php echo Yii::$app->Common->get_bill_item();?></p>
						<a href="http://localhost/ajay_office/avadh_pathalogy_lab/basic/web/index.php?r=billitem/index"class="btn btn-primary">click here to see</a>
					</div>
				</div>
			</div>
		</div>
		<br><br>

	</div>
	<br><br>
		<div class="row" style="padding:20px">
			<div class="col-md-2">
				<div class="card bg-light" style="width:300px">
					<div class="card-header"><p>Reciept</p></div>
					<div class="card-body"><p class="card-text">No.of Recept:<?php echo Yii::$app->Common->get_reciept();?></p>
						<a href="http://localhost/ajay_office/avadh_pathalogy_lab/basic/web/index.php?r=receipt/index"class="btn btn-danger">click here to see</a>
					</div>
				</div>
			</div>
			<div class="col-md-2">
				<div class="card bg-light" style="width:300px">
					<div class="card-header"><p>Doctor-Commisssion</p></div>
					<div class="card-body"><p class="card-text">No.of commission: <?php echo Yii::$app->Common->get_Dcommision();?></p>
						<a href="http://localhost/ajay_office/avadh_pathalogy_lab/basic/web/index.php?r=dcommission/index"class="btn btn-info">click here to see </a>
					</div>
				</div>
			</div>
			 <div class="col-md-2">
				<div class="card bg-light" style="width:300px">
					<div class="card-header"><p>Stored Commision</p></div>
					<div class="card-body"><p class="card-text">No.of stored_commission: <?php echo Yii::$app->Common->get_Scommision();?></p>
						<a href="http://localhost/ajay_office/avadh_pathalogy_lab/basic/web/index.php?r=stored/index"class="btn btn-success">click here to see</a>
					</div>
				</div>
			</div>
			
			 <!-- <div class="col-md-2">
				<div class="card bg-light" style="width:300px">
					<div class="card-header"><p>paid-bills</p></div>
						<a href="http://localhost/ajay_office/avadh_pathalogy_lab/basic/web/index.php?r=hospital%2Findex"class="btn btn-primary">click here to see</a>
					</div>
				</div>
			</div>
			<div class="col-md-2">
				<div class="card bg-light" style="width:300px">
					<div class="card-header"><p>Unpaid-Bills</p></div>
					<a href="http://localhost/ajay_office/avadh_pathalogy_lab/basic/web/index.php?r=hospital%2Findex1"class="btn btn-primary">click here to see</a></div>
				</div>
			</div> -->
		</div> 
		<br><br>
</div>









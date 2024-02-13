<?php
	$id = $this->session->userdata('id');
    $pro = $this->Institute_model->password($id); ?>

<div class="card card-primary card-outline" style="width: 100%">
   <div class="card-body">
      <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
         <li class="nav-item">
            <a class="nav-link <?php if($title == 'SMS Purchase') { echo 'active'; }?>"  id="custom-content-below-profile-tab" data-toggle="pill" href="#tab_1" role="tab" aria-controls="custom-content-below-profile" aria-selected="false">SMS Purchase</a>
         </li>
         <li class="nav-item">
            <a class="nav-link <?php if($title == 'All Trainee') { echo 'active'; }?>" id="custom-content-below-home-tab" data-toggle="pill" href="#tab_4" role="tab" aria-controls="custom-content-below-home" aria-selected="true"> Sent SMS</a>
         </li>
      </ul>

<div class="box-body no-padding">
  <!-- Custom Tabs -->
  <div class="nav-tabs-custom">
    <div class="tab-content">
        <div class="tab-pane active" id="tab_1">
          	<div class="card card-primary " style="width:100%;">
				<div class="card-body">
					<div class="row">
						<div class="col-sm-3" >
							Balance : <b> 
							<?php
								$sent = $this->Institute_model->sms_count();
								$balance = $this->Institute_model->sms_balance();
							 	echo $balance->total - $sent->total;
							?> SMS</b>
						</div>
						<div class="col-sm-3" >
							SMS Expire at : <b> 
							<?php
							
							?></b>
						</div>
						<div class="col-sm-3">
							SMS Sent : <b>
							<?php
							 	$sent = $this->Institute_model->sms_count();
							 	echo number_format($sent->total,0);
							?></b>
						</div>
						<div class="col-sm-3">
							<b> 
							
							</b>
						</div>
					</div>		
					<!-- <iframe src="http://api.greenweb.com.bd/g_api.php?token=18677c9556a641c202072e06285856fa&expiry&rate&tokensms&totalsms"></iframe> -->
				</div>
				<div class="card-body">
					<div class="col-sm-6">
						<form method="post" action="<?= base_url() ?>institute/sms_purchase_now">
						<div class="card card-primary">
							<div class="card-body">						
								<div class="form-group">
									<label>Purchase message amount</label>
									<input class="js-calc form-control" type="number"  id="shares"  name="sms_amount" placeholder="100">
								</div>
								
								<div class="form-group">	
								    <label>Message Rate</label>
								    <input class="js-calc form-control" name="shares2" id="shares2" disabled type="text" value="0.35" />
								</div>
								<div class="form-group">	
								    <label>Total</label>								    
									৳ <span id="result"></span>
								</div>
								<div class="form-group">								
									<button class="btn btn-info" type="submit">Purchase Now</button>							
								</div>
<!-- <script type="text/javascript">

function calcular(){
    var valor1 = parseInt(document.getElementById('txt1').value, 10);
    var valor2 = parseInt(document.getElementById('txt2').value, 10);
    document.getElementById('result').value = valor1 * valor2;
}</script>
<input id="txt1" type="text" value="1" onfocus="calcular()"/>
<input id="txt2" type="text" value="0.35" onblur="calcular()"/>

<input id="result" type="text"/> -->


</head>
<body>

<form>
</form>

<br />

</body>







							</div>
						</div>
						</form>
					</div>
				</div>
			</div>
      	</div>
      <!-- /.tab-pane --><!-- /.tab-pane -->
        <div class="tab-pane" id="tab_4">
        	<style type="text/css">
        		.tdbreak {
						  word-break: break-all
						}
        	</style>
        	<div class="card card-primary">
        		<div class="card-body">
		        	<table id="example1" class="table table-bordered table-striped" >
		        		<thead>
			           		<tr>
			           			<td width="5%">ID</td>
			           			<td width="35%">Numbers</td>
			           			<td width="35%">SMS</td>
			           			<td width="10%">Total Numbers</td>
			           			<td width="10%">Total SMS sent</td>
			           		</tr>
			           	</thead>
			           	<tbody>
		           		<?php $i = 1;  foreach ($this->Institute_model->all_sent_sms() as $key => $value) { ?>           
		           		<tr>
		           			<td><?= $i ?></td>
		           			<td  class="tdbreak"><?= $value->numbers; ?></td>
		           			<td><?= $value->message; ?></td>
		           			<td><?= $value->total; ?></td>
		           			<td><?= $value->total_sms; ?></td>
		           		</tr>
		           		<?php $i++; } ?>
		           		</tbody>
		           </table>
		        </div>
       		</div>
        </div><!-- /.tab-pane -->
      <!-- /.tab-pane -->
      <!-- /.tab-pane -->
    </div>
    <!-- /.tab-content -->
  </div>
  <!-- nav-tabs-custom -->
</div>




<script type="text/javascript">
	     function limitText(text) {       
       $('.fn_countdown').text('Remaining :'+(320 - text.length));        
     }
     
</script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script type="text/javascript">

    $(document).ready(function(){

        $(".js-calc").keyup(function(){

            var val1 = parseInt($("#shares").val());
            var val2 = parseFloat($("#shares2").val());

            if ( ! isNaN(val1) && ! isNaN(val2))
            {
                 $("#result").text(val1 * val2);
            }
        });

    });

    </script>

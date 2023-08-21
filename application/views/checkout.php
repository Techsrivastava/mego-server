<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity "sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style>
    
    
	.logo{
		max-width:30%;
		text-align:center;
		margin-left:auto;
		margin-right:auto;
		display:block;
	}
	.text-pink{
		color:#fa6b8b
	}
	.btn-pink{color:#fff;background-color:#fa6b8b;border-color:#fa6b8b}.btn-pink:hover{color:#fff;background-color:#0b5ed7;border-color:#0a58ca}.btn-check:focus+.btn-pink,.btn-pink:focus{color:#fff;background-color:#0b5ed7;border-color:#0a58ca;box-shadow:0 0 0 .25rem rgba(49,132,253,.5)}.btn-check:active+.btn-pink,.btn-check:checked+.btn-pink,.btn-pink.active,.btn-pink:active,.show>.btn-pink.dropdown-toggle{color:#fff;background-color:#0a58ca;border-color:#0a53be}.btn-check:active+.btn-pink:focus,.btn-check:checked+.btn-pink:focus,.btn-pink.active:focus,.btn-pink:active:focus,.show>.btn-pink.dropdown-toggle:focus{box-shadow:0 0 0 .25rem rgba(49,132,253,.5)}.btn-pink.disabled,.btn-pink:disabled{color:#fff;background-color:#fa6b8b;border-color:#fa6b8b}
	
	.border-modify{
		border:2px solid #333;
		border-top:2px solid #333 !important;
	}
</style>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
	<img src="https://megodating.com/assets/dist/img/mego.png" class="mt-3 mb-3 logo">
	
	<div class="col-md-12 col-lg-12 order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-pink">Your cart</span>
        </h4>
        <ul class="list-group mb-3">
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div class="col-9">
              <h6 class="my-0"><?php echo $PACKAGE[0]->PR_PACKAGE_NAME; ?></h6>
              <small class="text-muted"><?php echo $PACKAGE[0]->PR_PACKAGE_DESC; ?><span class="tou-node" id="tou-0-93d2b6fa-8a7a-4518-b0ae-f8f5ec7385db"></span></small>
            </div>
            <span class="text-muted">Rs <?php echo $PACKAGE[0]->PR_PRICE; ?></span>
          </li>
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div class="col-9">
              <h6 class="my-0">GST</h6>
              <small class="text-muted">18% as per government law <span class="tou-node" id="tou-0-36501bca-ac55-4c34-994c-d23c61b8278e" lang="es"></span></small>
            </div>
            <span class="text-muted">Rs <?php $totalamnt=$PACKAGE[0]->PR_PRICE*18/100;
					                    	$tamnt=$totalamnt+$PACKAGE[0]->PR_PRICE;
					                    	echo $totalamnt; ?></span>
          </li>
          <li class="list-group-item border-0">
			<br/>
		  </li>
          <li class="list-group-item d-flex justify-content-between border-modify">
            <span>Total (INR)</span>
            <strong>Rs <?php echo $tamnt; ?></strong>
          </li>
        </ul>
         <?php 
		                                 $uerid=$USERDATA[0]->PR_USER_ID;
		                                 $name=$USERDATA[0]->PR_NAME;
		                                 $mobile =$USERDATA[0]->PR_PHONE;
		                                 $email ="rohit@milleniance.in";//$USERDATA[0]->PR_EMAIL;
		                                 $order="MEGO-".time();
		                                 $bookingId=$order;
		                                 $secretKey = "7bfb746297ee7a796649b84e740632502b5aded8";
		                              
		                                 $rtrnu=base_url().'admin/payment_response?order_id='.$bookingId.'&user_id='.$uerid;

		                                 $postData = array( 
		                                  "appId" =>'14638737871383540b3a274d3d783641', 
		                                  "orderId" =>$order, 
		                                  "orderAmount" =>$tamnt, 
		                                  "orderCurrency" =>'INR', 
		                                  "orderNote" =>'MEGO DATING APP', 
		                                  "customerName" =>$name, 		                                  
		                                  "customerEmail" =>$email,
		                                  "customerPhone" =>$mobile, 
		                                  "returnUrl" =>$rtrnu, 
		                                  "notifyUrl" =>'',
		                                );
		                                ksort($postData);
		                                $signatureData = "";
		                                foreach ($postData as $key => $value){
		                                    $signatureData .= $key.$value;
		                                }
		                                $signature = hash_hmac('sha256', $signatureData, $secretKey,true);
		                                $signature = base64_encode($signature);


		                            	?>
<form action="https://www.cashfree.com/checkout/post/submit"  method="post" id="my_form_id" enctype="multipart/form-data" >                                
                                    <input type="hidden" name="appId" value="14638737871383540b3a274d3d783641"/>
                                    <input type="hidden" name="orderId" value="<?php echo $order; ?>"/>
                                    <input type="hidden" name="orderAmount" value="<?php echo $tamnt; ?>"/>
                                    <input type="hidden" name="orderCurrency" value="INR"/>
                                    <input type="hidden" name="orderNote" value="MEGO DATING APP"/>
                                    <input type="hidden" name="customerName" value="<?php echo $name; ?>"/>
                                    <input type="hidden" name="customerEmail" value="<?php echo $email; ?>"/>
                                    <input type="hidden" name="customerPhone" value="<?php echo $mobile; ?>"/>
                                    <input type="hidden" name="returnUrl" value="<?php echo $rtrnu; ?>"/>
                                    <input type="hidden" name="notifyUrl" value=""/>
                                    <input type="hidden" name="signature" value="<?php echo $signature; ?>"/>                     



                                    <!--<img id="loaderimg" src="<?php echo base_url('frontend_assets/images/loader.gif'); ?>" style="width:300px; height:200px; display: none;">-->

                                    <button id="atonlinebtn" type="submit" class="w-100 btn btn-pink btn-lg mt-4" >Checkout</button></a>
                               <!--      <button  id="atcounterbtn" onclick="payatcounter('<?php echo $bookingId; ?>');" type="button" class="com-btn btn-sm send_btn pull-right" style="margin-right: 10px;">Pay at Counter</button></a> -->

                                   <!--  onclick="chkuserLogin('<?php echo $uerid; ?>');" -->
                          			</form>
		
      </div>
</div>
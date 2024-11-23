<?php

//	include("include/config.php");
	//include("include/functions.php");

 /*$sqlvault=$obj->query("select id,npid,user_cd from tbl_user_np where user_id='".$user_id."' and user_cd!='' and npid!=''  and status=1 order by id desc");
$num=0;//$obj->numRows($sqlvault);
$carddata=$obj->fetchNextObject($sqlvault);*/

$amount=100;
$delivery_charges=4.99;
$eservicefee=4.6;
$taxtotal=4.99;
$subtotal=100;
?>
<html>
    <head>
        <meta charset="utf-8">
         <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
         <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,500&display=swap" rel="stylesheet">
<style type="text/css">
 .form-group {
    width: 290px;
}

.formInner {
    font-family: 'Abel' !important;
    max-width: 100%;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    margin: 20px auto;
    text-align: center;
}

#payButton {
    width: 150px;
    display: block;
    margin: 20px auto;
    height: 50px !important;
    font-size: 20px;
    background-color: #387b3b;
    border-color: #387b3b;
    color: #FFF;
    border-radius: 5px;
}

#payButton:hover {
    background-color: #387b3b;
    border-color: #387b3b;
    box-shadow: 0 3px 4px #bbbbbb;
}

#payButton:active {
    opacity: 0.7;
}

.payment-field {
    border-radius: 4px;
    width: 48%;
    margin-bottom: 14px;
    font-size: 16px;
    transition: 200ms;
}

.payment-field input:focus {
    border: 2px solid #CCC;
    outline: none !important;
}

.payment-field:hover {
    box-shadow: 0 2px 4px #dddddd;
}

.payment-field input {
    border: 2px solid rgb(28, 196, 139);
    width: 100%;
    border-radius: 2px;
    padding: 4px 8px;
    height: 45px !important;
}
#ccnumber {
    font-size:20px!important;
    height: 44px!important;
}
#ccexp {
    font-size:20px!important;
    height: 44px!important;
}
#cvv {
    font-size:20px!important;
    height: 44px!important;
}
#payment-fields {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
}

#ccnumber {
    width: 100%;
    font-size: 32px;
    height: 40px !important;
}

#ccexp,
#cvv {
    font-size: 32px;
     height: 40px !important;
}

.CollectJSInlineIframe, .CollectJSInlineIframe #ccnumber{
    height: 55px !important;
}
@media only screen and (max-width: 600px) {
 .theForm {
        width: 300px;
        max-width: 90%;
        margin: auto;
    }

    .form-group {
        width: 100%;
    }
}
 .clsPgLoader{z-index: 9999;} 
 .clsPgLoader span {
    display: inline-block;
    width: 50px;
    height: 50px;
    background-image: url(images/loading.gif);
    background-repeat: no-repeat;
    background-size: cover;
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%,-50%);
    animation: spin 2.5s linear infinite;
}
.clsPgLoader {
    display: none;
    position: fixed;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    background-color: rgba(255,255,255,0.6);
    z-index: 2;
}
  </style>
        <!-- COLLECT.JS INLINE -->
<script src="https://secure.nationalprocessinggateway.com/token/Collect.js" data-tokenization-key="5mN8N7-jhr55W-N22pxX-uAW2s9"></script>

        <script type="text/javascript"> 
		
        document.addEventListener('DOMContentLoaded', function () {
  CollectJS.configure({ 
      'validationCallback' : function(field, status, message) {
                        if (status) {
                            var message = field + " is now OK: " + message;
                            if(field=='ccnumber')
                            {
                            $(".validation-form1").hide();    
                            $(".validation-form1").html('');
                            }
                            else if(field=='ccexp')
                            {
                                $(".validation-form2").hide();
                               $(".validation-form2").html('');
                            }
                            else if(field=='cvv')
                            {
                                $(".validation-form3").hide();
                                $(".validation-form3").html('');
                            }
                        } else {
                           var message =  message;
                            if(field=='ccnumber')
                            {
                            $(".validation-form1").show();    
                            if(message=='Field is empty')
                            {
                                message='Card number field is empty'
                            }
                            else
                            {
                                message;
                            }
                            $(".validation-form1").html(message);
							$(".clsPgLoader").hide();
                            }
                            else if(field=='ccexp')
                            {
                                $(".validation-form2").show();
                                 if(message=='Field is empty')
                            {
                                message='Card exp field is empty'
                            }
                            else
                            {
                                message;
                            }
                                $(".validation-form2").html(message);
								$(".clsPgLoader").hide();
                            }
                            else if(field=='cvv')
                            {
                                $(".validation-form3").show();
                                 if(message=='Field is empty')
                            {
                                message='CVV field is empty'
                            }
                            else
                            {
                                message;
                            }
                                $(".validation-form3").html(message);
								$(".clsPgLoader").hide();
                            }
                        }
                        console.log(message);
                        
                         
                    },
    'callback': function (response) {
           $(document).ready(function () {
                setTimeout(function(){
                    $.ajax({
                        url: "app-results-sandbox-np.php",
                        dataType: "json",
                        data: {ptoken: ''+ response.token, np_cnumber: ''+ response.card.number,"subtotal":$("#subtotal").val(),"delivery_charges":0,"eservicefee":$("#eservicetax").val(),"taxtotal":$("#stax").val(),'delivery_notesbox':$("#delivery_notesbox").val() },
                        type: "POST",
                        success: function (results) {
						 var  parsed_data  = JSON.parse(JSON.stringify(results));	
		                console.log(parsed_data);
		                 window.location='https://dev.goquicklly.com/events-web/booking';
                         if(parsed_data.success==true){
							$(".clsPgLoader").show();
                            
                            document.getElementById("paymentSuccessInfo").innerHTML ='Payment Successfull';
                            window.location='https://dev.goquicklly.com/events-web/booking';
                            } else {
                            $(".clsPgLoader").hide();
						
                             document.getElementById("paymentErrorInfo").innerHTML =parsed_data.message;
                            //window.location='failed.html?message='+parsed_data.message;
                            }
                        },
                    });

                }, 2000);
            });
        
    },
    variant: 'inline',
    googleFont: 'Abel',
    invalidCss: {
      color: '#B40E3E',
      'border-color': '#B40E3E',
    },
    validCss: {
      color: '#14855F'
    },
    customCss: {
     'height':'40px',
     'border-color': '#ddd',
     'border-style': 'solid',
     'border-width':'1px',
     'font-size':'13px',
     'font-family':'poppins',
    },
    focusCss: {
      'border-color': '#1CC48B',
      'border-style': 'solid',
      'border-width': '1px'
    },
    fields: {
      cvv: {
        placeholder: 'CVV'
      },
      ccnumber: {
          placeholder: 'Card Number'
      },
      ccexp: {
          placeholder: 'Valid Through'
      }
    }
  });
});


</script>

</head>

<body>
<img src="https://secure.nationalprocessinggateway.com/shared/images/clear.gif" width="280px" height ="40px" border="0" style="position:absolute"/>
<div class="">
  <div class="row">
 
<?php //if($subtotal<'0.5'){ ?>
  <?php
//} //e/lse { ?>

<div class="col-md-12" style="background-color:#f3f3f3;">
    <center>
        <img src="images/npg-log.png" style="padding: 13px;" loading="lazy" alt="Quicklly - Indian Groceries, Food &amp; More">
        
    </center>
     <button type="button" class="close" data-dismiss="modal" style="border: 0px;
    position: relative;
    float: right;
    top: -56px;" >
         <span aria-hidden="true"><img src="images/icon-sticky-close.svg"></span>
        </button>  
     <div class="" style="background-color: #fff;
    padding: 17px;
    border-radius: 5px;">
 

    <form class="theForm" action="app-results-sandbox-np.php">
        <input type="hidden" id="subtotal">
        <input type="hidden" id="stax">
        <input type="hidden" id="eservicetax">
         <div>
            <b style="font: normal normal 14px / 16px Poppins;
    color: #000000;
    opacity: 1;
    text-shadow: 0 0 black;">Select Payment Method</b>
            <div style="margin-top: 14px;
    border: solid 1px #afacac;
    padding: 7px;">
                <input type="radio" checked> <b style="position: relative; top: -2px; font: normal normal 12px / 17px Poppins;
    color: #000;">Credit Card/ Debit Card</b>
            </div>
        </div>
        <hr>
              <div class="formInner">
            <div id="payment-fields">
               <div class="payment-field" id="ccnumber"></div>
                <div class="payment-field" id="ccexp"></div>
                <div class="payment-field" id="cvv"></div>
                <div class="payment-field" id="token"></div>
            </div>
        </div>
        <!-- <div style="position: relative; top: -23px;">
            <input type="checkbox"> <span style="font: normal normal 13px / 17px Poppins; color: #000000; opacity: 1;">Save my card for faster payments in the future</span>
        </div>-->
        <div style="position: relative; top: -26px;">
            <b><span class="showtotalonnp" style="color:#000;"><?=@$amount?></span></b> <span style="font: normal normal 13px / 17px Poppins; color: #000000; opacity: 1;">(Total Amount Payable)</span>
        </div>
         <div class="validation-form1 alert alert-danger" style="display:none;"></div>
         <div class="validation-form2 alert alert-danger" style="display:none;"></div>
         <div class="validation-form3 alert alert-danger" style="display:none;"></div>
        <!-- <input type="submit" id="pay_amount"  value="Pay" name="pay_amount" style="height:45px; width:120px; font-size:20px; color:#fff; background:rgb(23, 162, 64); border:1px solid rgba(0,153,204,1); border-radius:4px"> -->
        <button type="submit" id="payButton" style="height: 41px !important;
    width: 100%;
    color: #fff;
    background: #F05336;
    border: 1px solid #F05336;
    border-radius: 4px;
    font: normal normal 14px / 17px Poppins; margin:0px;">
            Pay <span class="showtotalonnp" style="color:#fff;"><?=@$amount?></span>
        </button>
        <center><div style="color:red; " id="paymentErrorInfo"></div></center>
        <center><div style="color:green; " id="paymentSuccessInfo"></div></center>
        
    </form>
   
   </div>
   <center style="padding: 12px;">
       <b style="font: normal normal 14px / 29px Poppins;
    color: #000;
    text-shadow: 0 0 black;">We Accept</b><br>
       <img style="width: 100%;" src="images/we-accept-payment.png">
   </center>
    </div>
    
</div>
</div>

<div class="clsPgLoader"><span></span></div>
<?php// } ?>
    <div id="paymentTokenInfo"></div>
    <script>
 $("#payButton").on('click', function(e){
      $(".clsPgLoader").show();
     var a = $(".validation-form1").html();
     var b = $(".validation-form2").html();
     var c = $(".validation-form3").html();
     if(a=='' && b=='' && c=='')
     {
     $(".clsPgLoader").show();
     }
     else
     {
         $(".clsPgLoader").hide();
     }
  });
  
 
   
    
  function changePaymentMethod()
  {
      $("#paywithsavedcards").hide();
      $('#changemethod').show();
  }
  function backToSaveCards()
  {
      $("#paywithsavedcards").show();
      $('#changemethod').hide();
  }
</script>

</body>
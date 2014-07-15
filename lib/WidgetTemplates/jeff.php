<div class="MakeOfferBController">
	<button id="maoButton" onclick="showOffer()" style="cursor:pointer" type="button">Request a Deal</button>
</div>
<div >
	<div class="buttonControllerBlue" style="display:none" id="newOfferCloud">
		<div class="NewOffer buttonNOF" >
			<p>Like This Product?</p>
			<p>Send An Offer to Us. </p>
			<p>Id Like To Offer You:</p>
			<p class="price">$<input type="text" value="0.00" id="priceBox"  /></p>
			<p class="price"><input type="text" value="" placeholder="Please provide your email" id="emailBox" style="width:265px;font-size:13px" /></p> 
			<p class="small">We will get back to you quickly with our response.</p>
		</div>
		<p class="s_button"><button id="sbtOfferBTN" onclick="doSubmitOffer()" type="button" style="cursor:pointer">SUBMIT OFFER</button></P>
	</div>
	<div class="buttonControllerGreen" style="display:none" id="newOfferThankCloud">
		<div class="NewOffer buttonNOF thanksButton">
			<p class="thnk_larg">THANK YOU</p>
			<p class="thnk_larg">FOR YOUR INTEREST</p>
			<p>We Will Be In Touch Shortly</p>
		</div>
	</div>
</div>

<style type="text/css">
.buttonControllerBlue{position:relative; width:340px;}

.buttonControllerBlue p.s_button{text-align:center; background:none;}
.buttonControllerBlue p.s_button button{background: none repeat scroll 0 0 #CC4E00;
    border: 1px solid #CC4E00;
    border-radius: 5px;
	-wekbit-border-radius: 5px;
	-moz-border-radius: 5px;
	-o-border-radius: 5px;
    -wekbit-box-shadow: 0 3px 4px rgba(0, 0, 0, 0.7);
	-o-box-shadow: 0 3px 4px rgba(0, 0, 0, 0.7);
	-moz-box-shadow: 0 3px 4px rgba(0, 0, 0, 0.7);
	box-shadow: 0 3px 4px rgba(0, 0, 0, 0.7);
    color: #FFFFFF;
    font-weight: bold;
    padding: 5px;
    text-align: center;}
.NewOffer.buttonNOF:after {
    border-color: rgba(0, 0, 0, 0) rgba(0, 110, 165, 0.7);
    border-width: 40px 0 0 40px;
    bottom: auto;
    left: 40px;
    right: auto;
    top: -40px;
}

.NewOffer:after {
    border-color: rgba(0, 110, 165, 0.7) rgba(0, 0, 0, 0);
    border-style: solid;
    border-width: 20px 0 0 20px;
    bottom: -20px;
    content: "";
    display: block;
    left: 50px;
    position: absolute;
    width: 0;
}

.NewOffer.buttonNOF {
    background: repeat scroll 0 0 rgba(0, 110, 165, 0.7);
}

.NewOffer {
    background: none repeat scroll 0 0 rgba(0, 110, 165, 0.7);
    border-radius: 10px;
    color: #FFFFFF;
    margin: 3em 0 1em;
    padding: 10px 30px;
    position: relative;
    text-align: center;
    width: 280px;
	min-height:160px;
}

.NewOffer p{font-weight:bold; font-size:20px; margin:3px 0;}
.NewOffer p input{border: 1px solid #666666;
    border-radius: 3px;
    font-size: 20px;
    margin: 10px 0;
    padding: 0 10px;
    width: 110px;
	font-weight:bold;
	}
.NewOffer p.small{color:#ffff00; font-size:12px;}
.NewOffer p.price{font-weight:bold; font-size:24px;}

.buttonControllerGreen{position:relative; width:340px;}
.buttonControllerGreen .thanksButton {
    background: none repeat scroll 0 0 rgba(0, 122, 61, 0.7);  
}

.buttonControllerGreen .thanksButton:after
{

    border-color: rgba(0, 0, 0, 0) rgba(0, 122, 61, 0.7);
}

.thanksButton p.thnk_larg{font-size: 25px;
    margin: 5px 0;}

.buttonControllerGreen .thanksButton:after {
    border-color: rgba(0, 0, 0, 0) rgba(0, 122, 61, 0.7);
}

.thanksButton .email_comm_link{background: none repeat scroll 0 0 #B6D916;
    border: 1px solid #254829;
    border-radius: 5px;
    bottom: -18px;
    color: #000000;
    display: block;
    font-size: 12px;
    left: 27%;
    padding: 5px;
    position: absolute;
    text-align: center;
    text-decoration: none;
    width: 130px;}

	
.MakeOfferBController{background: none repeat scroll 0 0 #CA4E15;
    border: 2px solid #CA4E15;
    border-radius: 100px;
    width: 65px;}
.MakeOfferBController button{background: none repeat scroll 0 0 #CA4E15;
    border: 3px solid #FFFFFF;
    border-radius: 100px;
    color: #FFFFFF;
    font-size: 12px;
    margin: 2px;
    padding: 10px;
    text-align: center;
    width: 61px;}
.MakeOfferBController button span.offersmall{font-size: 9px;
    font-weight: normal;}
</style>
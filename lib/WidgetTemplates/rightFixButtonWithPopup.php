
<div id="mao_container" onclick="doOffer()">
    Make An Offer
</div>
<div id="offerSection">
    <div class="closeButton" onclick="doCloseOffer()">[x]</div>
    <div style="padding:30px;">
        <div style="margin-top:10px;" class="offerGood"> 
            <div>
                <span class="productName" style="font-weight:bold;text-decoration: underline"></span>
            </div>
            <div style="margin-top:8px;">
            <span >Retail Price:</span>
            <span class="_price" style="font-weight:bold"></span>
            </div>
        </div>
        <div class="offerGood" style="margin-top:20px;">
            Buy this product at your own price. <br />Just enter your price below and hit submit
        </div>
        <div style="margin-top:30px;" class="offerGood"> 
            <span style="padding:0px 10px">$</span><input type="text" class="offerTextBox" id="offerTextBox" placeholder="Enter your offer price here"/>
        </div>

        <div style="margin-top:10px" class="submitOfferButton offerGood " onclick="OfferPriceSubmit()" >
            <div>SUBMIT YOUR OFFER NOW</div>
        </div>

        <div style="margin-top:10px">
            <div class="progress progress-striped active" style="width:100%" id="doWait">
                <div class="bar" style="width: 100%;" data-percentage="100" id="progress_bar"></div>
            </div>
        </div>

        <div style="margin-top:10px">
            <div class="offerAccepted">
                Congrats!, You have got the offer. <br /><br />
                <a href="javascript:;" style="color:blue" onclick="cClick()">Click here</a> to checkout now. 
                <br /><br />
                Or, If want to choose product specific options,  <a href="javascript:;" style="color:blue" onclick="doCloseOffer()">Click here</a>
                <br /><br />
                In any case, discount is already going to apply in cart page. Happy Buying


            </div>
        </div>

        <div style="margin-top:10px">
            <div class="offerRejected">
                Alas, Your offer price is not possible. Please try again.
            </div>
        </div>

    </div>
    <div class="poweredBy">
        <span>Powered by MaO</span>
    </div>
</div>
<div id="overlay">&nbsp;</div>
<style type="text/css">
    .offerAccepted{
        font-weight: bold;
        color:green;
        display:none;
    }
    .offerRejected{
        font-weight: bold;
        color:red;
        display:none;
    }
    .submitOfferButton{
        background-color: #53B7CE;
        text-align:center;
        border-bottom: 8px double #FFFFFF;
        color: #FEFEFE;
        font-size: 16px;
        padding: 7px;
        width:370px;
        margin-left:16px;
        cursor:pointer;
    }
    #doWait{
        display:none;
    }
    .progress.active .bar {
        animation: 2s linear 0s normal none infinite progress-bar-stripes;
    }

    .progress .bar {
        -moz-box-sizing: border-box;
        background-color: #0E90D2;
        background-image: -moz-linear-gradient(center top , #149BDF, #0480BE);
        background-repeat: repeat-x;
        box-shadow: 0 -1px 0 rgba(0, 0, 0, 0.15) inset;
        color: #FFFFFF;
        font-size: 12px;
        height: 18px;
        text-align: center;
        text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
        transition: width 0.6s ease 0s;

    }
    .progress .bar {
    }
    .progress-striped .bar {
        background-color: #149BDF;
        background-image: linear-gradient(-45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
        background-size: 40px 40px;
    }
    @-webkit-keyframes progress-bar-stripes {
        from {
        background-position: 40px 0;
    }
    to {
        background-position: 0 0;
    }
    }
    @-moz-keyframes progress-bar-stripes {
        from {
        background-position: 40px 0;
    }
    to {
        background-position: 0 0;
    }
    }
    @-ms-keyframes progress-bar-stripes {
        from {
        background-position: 40px 0;
    }
    to {
        background-position: 0 0;
    }
    }
    @-o-keyframes progress-bar-stripes {
        from {
        background-position: 0 0;
    }
    to {
        background-position: 40px 0;
    }
    }
    @keyframes progress-bar-stripes {
        from {
        background-position: 40px 0;
    }
    to {
        background-position: 0 0;
    }
    }
    .poweredBy{
        bottom: 3px;
        font-family: verdana;
        font-size: 11px;
        font-style: italic;
        position: absolute;
        right: 61px; 
    }

/*    #offerSection .offerTextBox{
        border:1px solid gold !important;
        border-width: 0px 0px 2px 0px !important;
        font-family: cursive !important;
        font-size: large;
        padding:10px;
        width:80%;
        height:16px !important;
    }*/
    .closeButton{
        cursor: pointer;
        float:right;
        margin-right:10px;
        margin-top:4px;
    }
    #overlay{
        background-color: white;
        opacity:0.8;
        position:fixed;
        width:100%;
        height:100%;
        top:0px;
        left:0px;
        display:none;
        z-index:999999999;
    }
    #offerSection{

        font-size:17px !important;
        background-image: url(<?php print _OFFER_APP_BASE_URL?>instance/front/media/img/MaOLogo_boy.png);
        background-position: right bottom;
        background-repeat: no-repeat;
        background-size: 10%;
        color:black;
        display:none;
        width:500px;
        height:500px;
        border-radius: 4px;
        background-color: white;
        box-shadow: 0 0 1em gold;
        position:fixed;
        left:50%;
        top:50%;
        margin-left:-250px;
        margin-top:-250px;
        z-index:9999999999;
    }
    #mao_container{
        position:fixed;
        right:10px;
        top:50%;
        transform: rotate(270deg);
        font-family:cursive;
        border: 0 none;
        border-radius: 6px 6px 6px 6px;
        box-shadow: 0 1px 0 rgba(255, 255, 255, 0.1) inset, 0 1px 5px rgba(0, 0, 0, 0.25);
        color: #FFFFFF;
        font-size: 24px;
        font-weight: 200;
        padding: 19px 24px;
        transition: none 0s ease 0s;
        cursor:pointer;
        background-color: #006DCC;
        background-image: linear-gradient(to bottom, #0088CC, #0044CC);
        background-repeat: repeat-x;
        border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
        color: #FFFFFF;
        text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
        vertical-align: middle;
        text-align: center;
        line-height: 20px;
        display: inline-block;
    }
    #mao_container:hover{
        box-shadow: 0 1px 0 rgba(255, 255, 255, 0.1) inset, 0 1px 5px rgba(0, 0, 0, 0.25);
    }
</style>
<?php if($customer_id == "99"):?>
<style type="text/css">
#mao_container{
	background-color: #FF0097;
	z-index:9999 !important;
    background-image: none;
}
</style>
<?php endif;?>
<?php if($customer_id == "100"):?>
<style type="text/css">
#mao_container{
	background-color: #E65100;
	z-index:9999 !important;
    background-image: none;
}
#offerTextBox{
    border: 1px solid #DADADA;
    padding: 10px;
    width: 349px;
}
</style>
<?php endif;?>
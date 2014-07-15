<div id="mao_container" onclick="doOffer()" style="cursor: pointer;">
    Like the Product?
</div>
<div id="offerSection">
    <div class="closeButton" onclick="doCloseOffer()">[x]</div>
    <div style="padding:10px;">
        <div style="margin-top:10px;" class="offerGood"> 

            <div style="margin-top:0px;">
                <span >Retail Price:</span>
                <span class="_price" style="font-weight:bold;color:#f66606"></span>
            </div>
        </div>
        <div class="offerGood" style="margin-top:20px;">
            Offer Price
        </div>
        <div style="margin-top:5px; border: 1px solid #888888;border-radius: 6px 6px 6px 6px;" class="offerGood">
            <span style="padding:0px 5px">$</span><input type="text" class="offerTextBox" id="offerTextBox" placeholder=""/>
        </div>

        <div style="margin-top:10px" class="submitOfferButton offerGood " onclick="OfferPriceSubmit()" >
            <div>SUBMIT YOUR OFFER</div>
        </div>

        <div style="margin-top:10px">
            <div class="progress progress-striped active" style="width:100%" id="doWait">
                <div class="bar" style="width: 100%;" data-percentage="100" id="progress_bar"></div>
            </div>
        </div>

        <div style="margin-top:10px">
            <div class="accepted offerAccepted" onclick="cClick()">
                Accepted<br /> Add to cart
                <!--<a href="javascript:;" style="color:blue" onclick="cClick()">Add to Cart</a>.
                <a href="javascript:;" style="color:blue" onclick="doCloseOffer()">Click here</a>-->
            </div>
        </div>

        <div style="margin-top:10px">
            <div class="decline offerRejected" onclick="tryAgain()"> 
                Declined. Submit Again.
            </div>
        </div>

    </div>
    <div class="poweredBy">
        <a target="_blank" href="http://www.makeanofferapp.com/" style="font-family:Life Savers;text-decoration: none;color:black"><span>Powered by MaO</span><img src="http://makeanofferapp.com/mao_alpha/offer-price/MaOLogo_boy-32.png" width="32"/></a>
    </div>
</div>
<!-- <div id="overlay">&nbsp;</div> -->
<style type="text/css">
    @import url(http://fonts.googleapis.com/css?family=Life+Savers:400,700);
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
        border-radius: 7px 7px 7px 7px;
        color: #FEFEFE;
        cursor: pointer;
        font-size: 16px;
        height: 49px;
        margin-left: 16px;
        padding: 7px;
        text-align: center;
        width: 108px;
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
        bottom: 5px;
        font-size: 11px;
        position: relative;
        right: -19px; 
    }

    #offerSection .offerTextBox{
        padding: 6px !important;
        width: 75%;
        background-color: #eeeeee;
        font-size: 20px;
        border-radius: 0px 5px 5px 0;
    }
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
        background-color: #DDDDDD;
        color: #000000;
        display: none;
        font-size: 17px !important;
        height: 300px;
        position: fixed;
        right: 0;
        top: 50%;
        width: 160px;
        font-size: 20px !important;
        /*font-family: "Life Savers";*/
        z-index:9999999999;
        /*
                font-size:17px !important;
                background-image: url(http://www.makeanofferapp.com/mao_alpha/instance/front/media/img/MaOLogo_boy.png);
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
                left:0%;
                top:0%;
                margin-left:0px;
                margin-top:0px;
                z-index:9999999999;*/
    }
    #mao_container{
        background: url("http://makeanofferapp.com/mao_alpha/offer-price/MaO-logo-clean-90.png") no-repeat scroll center 65px #53B7CE;
        padding-top: 10px;
        border: 1px solid #232A30;
        border-radius: 15px 0 0 15px;
        box-shadow: -1px 0 5px #f5f5f5;
        color: #FFFFFF;
        height: 320px;
        position: fixed;
        right: 0;
        text-align: center;
        top: 48%;
        width: 74px;
        /* transform: rotate(270deg);
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
         display: inline-block; */
    }
    #mao_container:hover{
        box-shadow: 0 1px 0 rgba(255, 255, 255, 0.1) inset, 0 1px 5px rgba(0, 0, 0, 0.25);

    }
    .decline{
        background-color: #b20000;
        border-radius: 7px 7px 7px 7px;
        color: #FEFEFE;
        cursor: pointer;
        font-size: 16px;
        height: 49px;
        margin-left: 16px;
        padding: 7px;
        text-align: center;
        width: 108px;
    }
    .accepted{
        background-color: #008c23;
        border-radius: 7px 7px 7px 7px;
        color: #FEFEFE;
        cursor: pointer;
        font-size: 16px;
        height: 49px;
        margin-left: 16px;
        padding: 7px;
        text-align: center;
        width: 108px;
    }
</style>

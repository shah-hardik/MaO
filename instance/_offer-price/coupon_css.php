<?php 
    header('Content-Type: text/css');
?>

.loader_img{
  width:25px;
  height:25px;
}
.loader_div{
  margin-left:10px;
}
.offer_price{
  margin-right:10px;
   height: 30px !important;
}
.btn.danger, .alert-message.danger, .btn.danger:hover, .alert-message.danger:hover, .btn.error, .alert-message.error, .btn.error:hover, .alert-message.error:hover, .btn.success, .alert-message.success, .btn.success:hover, .alert-message.success:hover, .btn.info, .alert-message.info, .btn.info:hover, .alert-message.info:hover {
    color: #FFFFFF;
}
.btn .close, .alert-message .close {
    font-family: Verdana,sans-serif;
    line-height: 18px;
}
.btn.danger, .alert-message.danger, .btn.error, .alert-message.error {
    background-color: #C43C35;
    background-image: -moz-linear-gradient(center top , #EE5F5B, #C43C35);
    background-repeat: repeat-x;
    border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
    text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
}
.btn.success, .alert-message.success {
    background-color: #57A957;
    background-image: -moz-linear-gradient(center top , #62C462, #57A957);
    background-repeat: repeat-x;
    border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
    text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
}
.btn.info, .alert-message.info {
    background-color: #339BB9;
    background-image: -moz-linear-gradient(center top , #5BC0DE, #339BB9);
    background-repeat: repeat-x;
    border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
    text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
}
.btn {
    -moz-border-bottom-colors: none;
    -moz-border-left-colors: none;
    -moz-border-right-colors: none;
    -moz-border-top-colors: none;
    background-color: #E6E6E6;
    background-image: linear-gradient(#FFFFFF, #FFFFFF 25%, #E6E6E6);
    background-repeat: no-repeat;
    border-color: #CCCCCC #CCCCCC #BBBBBB;
    border-image: none;
    border-radius: 4px 4px 4px 4px;
    border-style: solid;
    border-width: 1px;
    box-shadow: 0 1px 0 rgba(255, 255, 255, 0.2) inset, 0 1px 2px rgba(0, 0, 0, 0.05);
    color: #333333;
    cursor: pointer;
    display: inline-block;
    font-size: 13px;
    line-height: normal;
    padding: 5px 14px 6px;
    text-shadow: 0 1px 1px rgba(255, 255, 255, 0.75);
    transition: all 0.1s linear 0s;
}
.btn:hover {
    background-position: 0 -15px;
    color: #333333;
    text-decoration: none;
}
.btn:focus {
    outline: 1px dotted #666666;
}
.btn.primary {
    font-family: "DroidSans",Arial,Helvetica,sans-serif;
    font-size: 12px;
    background-color: #B41218;
    background-image: -moz-linear-gradient(center top , #B41218, #B41218);
    background-repeat: repeat-x;
    border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
    color: #FFFFFF;
    margin: 0px 0 0px;
    text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
}
.btn.active, .btn:active {
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.25) inset, 0 1px 2px rgba(0, 0, 0, 0.05);
}
.btn.disabled {
    background-image: none;
    box-shadow: none;
    cursor: default;
    opacity: 0.65;
}
.btn[disabled] {
    background-image: none;
    box-shadow: none;
    cursor: default;
    opacity: 0.65;
}
.btn.large {
    border-radius: 6px 6px 6px 6px;
    font-size: 15px;
    line-height: normal;
    padding: 9px 14px;
}
.btn.small {
    font-size: 11px;
    padding: 7px 9px;
}
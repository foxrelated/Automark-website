/*styles for jquery ui daterangepicker plugin */

.ui-daterangepickercontain {
	position: absolute;
	z-index: 999;
}
.ui-daterangepickercontain .ui-daterangepicker {
	float: left;
	padding: 5px !important;
	width: auto;
	display: inline;
	background-image: none !important;
	clear: left;
}
.ui-daterangepicker ul, .ui-daterangepicker .ranges, .ui-daterangepicker .range-start, .ui-daterangepicker .range-end {
	float: left;
	padding: 0;
	margin: 0;
}
.ui-daterangepicker .ranges {
	width: auto;
	position: relative;
	padding: 5px 5px 40px 0;
	margin-left: 10px;
}
.ui-daterangepicker .range-start, .ui-daterangepicker .range-end {
	margin-left: 5px;
}
.ui-daterangepicker button.btnDone {

  clear:both;
  cursor:pointer;
  position:absolute;
  bottom:0;
  right:0;
  cursor: pointer;
  display: inline-block;
  background-color: #e6e6e6;
  background-repeat: no-repeat;
  background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#ffffff), color-stop(25%, #ffffff), to(#e6e6e6));
  background-image: -webkit-linear-gradient(#ffffff, #ffffff 25%, #e6e6e6);
  background-image: -moz-linear-gradient(top, #ffffff, #ffffff 25%, #e6e6e6);
  background-image: -ms-linear-gradient(#ffffff, #ffffff 25%, #e6e6e6);
  background-image: -o-linear-gradient(#ffffff, #ffffff 25%, #e6e6e6);
  background-image: linear-gradient(#ffffff, #ffffff 25%, #e6e6e6);
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffff', endColorstr='#e6e6e6', GradientType=0);
  padding: 5px 14px 6px;
  margin: 5px;
  text-shadow: 0 1px 1px rgba(255, 255, 255, 0.75);
  color: #333;
  font-size: 13px;
  line-height: normal;
  border: 1px solid #ccc;
  border-bottom-color: #bbb;
  -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
  -moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
  box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
  -webkit-transition: 0.1s linear background-image;
  -moz-transition: 0.1s linear background-image;
  -ms-transition: 0.1s linear background-image;
  -o-transition: 0.1s linear background-image;
  transition: 0.1s linear background-image;
   overflow: visible;

}
.ui-daterangepicker ul {
	width: 17.6em;
	background: none;
	border: 0;
}
.ui-daterangepicker li {
	list-style: none;
	padding: 1px;
	cursor: pointer;
	margin: 1px 0;
}
.ui-daterangepicker .ui-widget-header{
	border:1px solid #ccc;
}

.ui-daterangepicker .ui-state-hover{
	padding: 1px;
    color: #ffffff;
    background: #0064cd;
    background-color: #0064cd;
    background-repeat: repeat-x;
    background-image: -khtml-gradient(linear, left top, left bottom, from(#049cdb), to(#0064cd));
    background-image: -moz-linear-gradient(top, #049cdb, #0064cd);
    background-image: -ms-linear-gradient(top, #049cdb, #0064cd);
    background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #049cdb), color-stop(100%, #0064cd));
    background-image: -webkit-linear-gradient(top, #049cdb, #0064cd);
    background-image: -o-linear-gradient(top, #049cdb, #0064cd);
    background-image: linear-gradient(top, #049cdb, #0064cd);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#049cdb', endColorstr='#0064cd', GradientType=0);
    text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
    border-color: #0064cd #0064cd #003f81;
    border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
}

.ui-daterangepicker .ui-state-hover a{
	color:#fff;
}

.ui-daterangepicker .ui-widget{
	padding-right:4px;
}
.ui-daterangepicker li.preset_0 {
	margin-top: 1.5em !important;
}
.ui-daterangepicker .ui-widget-content a {
	text-decoration: none !important;
	font-weight:normal;
}
.ui-daterangepicker li a {
	font-weight: normal;
	margin: .3em .5em;
	display: block;
}
.ui-daterangepicker li span {
	float: right;
	margin: .3em .2em;
}

.ui-daterangepicker .title-start, .ui-daterangepicker .title-end {
	display: block;
	margin: 0 0 .2em;
	font-size: 1em;
	padding: 0 4px 2px;
}
.ui-daterangepicker .ui-datepicker-inline {
	font-size: 1em;
}
.ui-daterangepicker-arrows {
	padding: 2px;
	width: 204px;
	position: relative;
}
.ui-daterangepicker-arrows input.ui-rangepicker-input {
	width: 158px;
	margin: 0 2px 0 20px;
	padding: 2px;
	height: 1.1em;
}
.ui-daterangepicker-arrows .ui-daterangepicker-prev, .ui-daterangepicker-arrows .ui-daterangepicker-next {
	position: absolute;
	top: 2px; 
	padding: 1px;
}
.ui-daterangepicker-arrows .ui-daterangepicker-prev {
	left: 2px;
}
.ui-daterangepicker-arrows .ui-daterangepicker-next {
	right: 2px;
}
.ui-daterangepicker-arrows .ui-daterangepicker-prev:hover, 
.ui-daterangepicker-arrows .ui-daterangepicker-next:hover,
.ui-daterangepicker-arrows .ui-daterangepicker-prev:focus, 
.ui-daterangepicker-arrows .ui-daterangepicker-next:focus {
	padding: 0;
}

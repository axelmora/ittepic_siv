<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>SIV :: PANEL ADMINISTRATIVO:</title>
  <link href="<?php echo base_url(); ?>css/sintextmaterialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="<?php echo base_url(); ?>css/styletext.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="<?php echo base_url(); ?>css/styles.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="<?php echo base_url(); ?>js/materialize.css" type="text/javascript" rel="stylesheet" media="screen,projection"/>
  <!-- CSS  -->
  <link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.png"/>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url(); ?>js/DataTables/media/css/jquery.dataTables.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>js/DataTables/extensions/Select/css/select.dataTables.min.css">
<style media="screen">
* {
margin:0px auto;
padding: 0px;
text-align:center;
}
body {

}
.cont_principal {
position: absolute;
width: 100%;
height: 100%;
overflow: hidden;
}
.cont_error {
position: absolute;
width: 100%;
height: 300px;
}

.cont_error > h1  {
font-family: 'Lato', sans-serif;
font-weight: 400;
font-size:150px;
position: relative;
left:-100%;
transition: all 0.5s;
}


.cont_error > p  {
font-family: 'Lato', sans-serif;
font-weight: 300;
font-size:24px;
letter-spacing: 5px;
position: relative;
left:100%;
transition: all 0.5s;
  transition-delay: 0.5s;
-webkit-transition: all 0.5s;
-webkit-transition-delay: 0.5s;
}

.cont_aura_1 {
position:absolute;
width:300px;
height: 120%;
top:25px;
right: -340px;
background-color: #FFA042;
box-shadow: 0px 0px  60px  20px  rgba(255,160,66,0.5);
-webkit-transition: all 0.5s;
transition: all 0.5s;
z-index: -5;
}
.cont_aura_2 {
position:absolute;
width:100%;
height: 300px;
right:-10%;
bottom:-301px;
background-color: #FFA042;
box-shadow: 0px 0px 60px 10px rgba(255,160,66,0.5),0px 0px  20px  0px  rgba(0,0,0,0.1);
z-index:5;
transition: all 0.5s;
-webkit-transition: all 0.5s;
z-index: -5;
}

.cont_error_active > .cont_error > h1 {
left:0%;
}
.cont_error_active > .cont_error > p {
left:0%;
}

.cont_error_active > .cont_aura_2 {
  animation-name: animation_error_2;
  animation-duration: 4s;
animation-timing-function: linear;
  animation-iteration-count: infinite;
  animation-direction: alternate;
transform: rotate(-20deg);
}
.cont_error_active > .cont_aura_1 {
transform: rotate(20deg);
right:-170px;
  animation-name: animation_error_1;
  animation-duration: 4s;
animation-timing-function: linear;
  animation-iteration-count: infinite;
  animation-direction: alternate;
}

@-webkit-keyframes animation_error_1 {
from {
  -webkit-transform: rotate(20deg);
transform: rotate(20deg);
}
to {  -webkit-transform: rotate(25deg);
transform: rotate(25deg);
}
}
@-o-keyframes animation_error_1 {
from {
  -webkit-transform: rotate(20deg);
transform: rotate(20deg);
}
to {  -webkit-transform: rotate(25deg);
transform: rotate(25deg);
}

}
@-moz-keyframes animation_error_1 {
from {
  -webkit-transform: rotate(20deg);
transform: rotate(20deg);
}
to {  -webkit-transform: rotate(25deg);
transform: rotate(25deg);
}

}
@keyframes animation_error_1 {
from {
  -webkit-transform: rotate(20deg);
transform: rotate(20deg);
}
to {  -webkit-transform: rotate(25deg);
transform: rotate(25deg);
}
}

@-webkit-keyframes animation_error_2 {
from { -webkit-transform: rotate(-15deg);
transform: rotate(-15deg);
}
to { -webkit-transform: rotate(-20deg);
transform: rotate(-20deg);
}
}
@-o-keyframes animation_error_2 {
from { -webkit-transform: rotate(-15deg);
transform: rotate(-15deg);
}
to { -webkit-transform: rotate(-20deg);
transform: rotate(-20deg);
}
}
}
@-moz-keyframes animation_error_2 {
from { -webkit-transform: rotate(-15deg);
transform: rotate(-15deg);
}
to { -webkit-transform: rotate(-20deg);
transform: rotate(-20deg);
}
}
@keyframes animation_error_2 {
from { -webkit-transform: rotate(-15deg);
transform: rotate(-15deg);
}
to { -webkit-transform: rotate(-20deg);
transform: rotate(-20deg);
}
}

</style>
</head>
<body>
  <div class="cont_principal">
    <div class="cont_error">
      <img  class="img-fluid" src="http://www.ittepic.edu.mx/images/escudo_itt_200x200.png" height="150" width="150"> <br><br>
      <h1>Oops</h1>
      <p>La pagina que estas buscando no existe.</p>
    </div>
    <div class="cont_aura_1"></div>
    <div class="cont_aura_2"></div>
  </div>
</body>
<!--  Scripts-->
<script src="<?php echo base_url(); ?>js/jquery-3.0.0.min.js"></script>
<script src="<?php echo base_url(); ?>js/materialize.js"></script>
<script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>/js/DataTables/media/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>/js/DataTables/tablas.js"></script>
<script type="text/javascript" charset="utf8" src="<?php echo base_url(); ?>/js/DataTables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
<script type="text/javascript">
window.onload = function(){
document.querySelector('.cont_principal').className= "cont_principal cont_error_active";

}
</script>
</html>

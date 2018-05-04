<?php 
  include_once('funcoes.php');
  include_once('sessao.php');
  echo inicio();
?>
<div class="container-fluid">
 <div class="card-header">
   <h1 style="text-align: center;">Calendário</h1>
 </div>
  <hr>
  <!-- Icon Cards-->
  <div class="row">
      <div id="calendario"></div>
  </div>
</div>
<?php
  echo final1();
?>

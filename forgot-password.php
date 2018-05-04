<?php 
include_once('funcoes.php');
echo inicioAutenticacao();
?>
<div class="container">
  <div class="card card-login mx-auto mt-5">
    <div class="card-header">Reset Password</div>
    <div class="card-body">
      <div class="text-center mt-4 mb-5">
        <h4>Forgot your password?</h4>
        <p>Enter your email address and we will send you instructions on how to reset your password.</p>
      </div>
    </div>
  </div>
</div> 
<?php
echo finalAutenticacao();
?>
<?php
    include_once('funcoes.php');
    include_once('sessao.php');
    include_once('conexao.php');
    echo inicio();
?>
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Aguardando Aprovação</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Aprovados</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Recusados</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Arquivados</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

    ...

  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

  ...

</div>
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">

  ...

</div>
<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">

  ...

</div>
</div>
<?php 
    echo final1();
 ?>

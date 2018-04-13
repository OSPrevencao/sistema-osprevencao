<?php 
	include_once('funcoes.php');
	include_once('sessao.php');
	echo inicio();
?>
<div class="container-fluid">
 
	<h1>Calendário</h1>
	<hr>

	<br>	
    <!--Add buttons to initiate auth sequence and sign out-->
    <button id="authorize-button" style="display: none;">Authorize</button>
    <button id="signout-button" style="display: none;">Sign Out</button>

    <!-- <pre id="content"></pre> -->
	

	<!-- Icon Cards-->
	<div class="row">
		<div id="calendario"></div>
	</div>
	<br>
	<br>
	<br>

<!-- 	<div class="row">
		<div class="col-xs-12">
			<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modal-adicionar-evento">
				Adicionar Evento
			</button>
		</div>
	</div>

	<!-- modal bootstrap -->
	<!--<div class="modal fade" id="modal-adicionar-evento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Adicionar evento</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<div class="form-row">
							<input type="text" name = "nome-evento" id = "nome-evento" class="form-control" placeholder="Nome do evento">
						</div>
						<br>
						<br>
						<div class="form-row">
							<input type="date" name = "data-evento" id = "data-evento" class="form-control" >
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
					<button type="button" class="btn btn-primary" id = "add-calendar-event">Adicionar evento</button>
				</div>
			</div> /.modal-content 
		</div/.modal-dialog
	</div> --> <!-- /.modal
</div>
<?php
	echo final1();
?>

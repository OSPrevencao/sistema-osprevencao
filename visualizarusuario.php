<?php
include_once('funcoes.php');
include_once('sessao.php');
include_once('conexao.php');
echo inicio();

$result = select($conn, 'usuario');

?>
<div class="card-header">
<h1>Estoque</h1>
</div>
<div class=" card-header ">
    <form name="frmBusca" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" >
        <div class="form-group">    
            <div class="form-row">
                <div class="col-md-6">
                    <input type="text" name="palavra" class="title_case form-control col-md-10">
                </div>
                <div class="col-md-6">
                    <input type="submit" value="Buscar" class="btn btn-success col-md-2">
                </div>
            </div>
        </div>
    </form>
</div>
<div>
<?php

// Verificamos se a ação é de busca
    if (isset($_POST['palavra'])) {
        // Pegamos a palavra
        $palavra = trim($_POST['palavra']);
        $sql = select(
            $conn,
            'usuario',
            "usuario LIKE '%{$palavra}%'",
            "usuario, nome_usuario, email"

        );

        echo listaRegistro($sql, [
            'usuario' => 'Login ',
            'nome_usuario' => 'Nome do Usuário ',
            'email' => 'email '
        ]);

    }
?>

 </div>
    
<fieldset class="row3">
    <legend><font color="white">-</font></legend>
    <p>
        <table class="table table-inverse table-responsive">
            <thead>
                <tr>
                    <th>Nome do usuário</th>
                    <th>Login</th>
                    <th>E-mail</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach ($result as $row) {?>
                        <tr>
                            <td><?php echo $row['usuario'] ; ?></td>
                            <td><?php echo $row['nome_usuario'] ; ?></td>
                            <td><?php echo $row['email'] ; ?></td>
                            <td>
                            <a class="btn btn-primary" id="vizualizarcadastro" href='editarusuario.php?id=<?php echo $row['id']; ?>' >
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                            </a>
                        </td>
                        <td>
                            <a class="btn btn-primary" id="removercadastro" href='removerusuario.php?id=<?php echo $row['id']; ?>' >
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>

                             </td>
                        </tr>
                    
                <?php }
                ?>
            </tbody>
        </table>
    </p>
</fieldset>

<?php
echo final1();
?>
<?php
include 'navbar.php';
include 'config.php';

// Consulta SQL para listar as tarefas
$sql = "SELECT id, nome, email, telefone, data_do_cadastro FROM leads";
$result = $conn->query($sql);

// Verifica se houve algum erro na execução da consulta SQL
if (!$result) {
    die("Erro ao executar a consulta: " . $conn->error);
}


?>
<br>



<div class="container " style="margin-top: 80px;">
    <div class="row">
        <div class="card">
            <div class="card-body">
                <?php
                // Loop para exibir os dados em cartões
                while ($row = $result->fetch_assoc()) {
                ?>
                    <div class="col-12">
                        <div class="row g-3 needs-validation" novalidate>
                            <div class="col-md-1">
                                <label for="validationCustom01" class="form-label"><strong>Id</strong></label>
                                <p class="card-title"><?php echo $row["id"]; ?></p>
                            </div>
                            <div class="col-md-3">
                                <label for="validationCustom01" class="form-label"><strong>Nome do cliente</strong></label>
                                <p class="card-title"><?php echo $row["nome"]; ?></p>
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom02" class="form-label"><strong>email</strong></label>
                                <p class="card-text"><?php echo $row["email"]; ?></p>
                            </div>
                            <div class="col-md-2">
                                <label for="validationCustomUsername" class="form-label"><strong>telefone</strong></label>
                                <p class="card-text"><?php echo $row["telefone"]; ?></p>
                            </div>

                            <div class="col-md-2">
                                <label for="validationCustomUsername" class="form-label"><strong>Data do cadastro</strong></label>
                                <p class="card-text"><?php echo $row["data_do_cadastro"]; ?></p>
                            </div>

                            <div class="col-12">
                                <a href="editar-cliente.php?id=<?php echo $row['id']; ?>" class="btn btn-secondary" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">Editar</a>
                                <a href="excluir-cliente.php?id=<?php echo $row['id']; ?>" class="btn btn-danger" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;">Excluir</a>
                            </div>

                        </div>
                    </div>
                    <hr class="row" style="margin-top: 10px;">


                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>

<br>
<br>
<br>
<?php

include 'config.php';
include 'navbar.php';

?>

<div class="cardsoma" style="margin-top: 100px;">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total de leads</h5>
                        <p class="card-text">
                            <?php

                            // Consulta SQL para contar o número de linhas na tabela 'leads'
                            $sql = "SELECT COUNT(*) AS total FROM leads";
                            $result = $conn->query($sql);

                            if ($result) {
                                // Se a consulta for bem-sucedida, obtenha o total de linhas
                                $row = $result->fetch_assoc();
                                $totalLeads = $row['total'];

                                // Envie o total para o navegador
                                echo "<h3>" . $totalLeads;
                            } else {
                                // Se ocorrer um erro na consulta, exiba uma mensagem de erro
                                echo "Erro ao executar a consulta: " . $conn->error;
                            }

                            // Feche a conexão com o banco de dados
                            $conn->close();
                            ?>

                        </p>

                    </div>
                </div>
            </div>
            
        </div>
    </div>

</div>
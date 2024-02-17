<?php

include 'navbar.php';
include 'config.php';

?>

<div class="container d-flex justify-content-center" style="margin-top: 130px;">

    <form method="POST" action="">
        <?php

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if (empty($_POST['nome']) || empty($_POST['email']) || empty($_POST['telefone'])) {

                preencherCampos('Por favor, preencha todos os campos.');
            } else {
                $nome = $_POST['nome'];
                $email = $_POST['email'];
                $telefone = $_POST['telefone'];

                $sql = "INSERT INTO leads (nome, email, telefone) VALUES ('$nome', '$email', '$telefone')";

                if ($conn->query($sql) === true) {
                    alertSucess('Cadastrado com sucesso!');
                } else {
                    erroCadastro('Erro ao cadastrar: ' . $conn->error); // Adicionando $conn->error para exibir a mensagem de erro completa
                }
            }
        }

        // Fechando a conexão
        $conn->close();

        function preencherCampos($mensagem)
        {
            echo '<div class="alert alert-danger" role="alert">' . $mensagem . '</div>';
        }

        function alertSucess($mensagem)
        {
            echo '<div class="alert alert-success" role="alert">' . $mensagem . '</div>';
        }

        function erroCadastro($mensagem)
        {
            echo '<div class="alert alert-danger" role="alert">' . $mensagem . '</div>';
        }

        ?>

        <div class="card" style="width: 22rem;">

            <div class="card-body">

                <div class="alert alert-info" role="alert">
                    <strong>Cadastrar novo cliente</strong>
                </div>
                <div class="mb-3">
                    <label for="exampleInputText1" class="form-label">Nome Completo</label>
                    <input type="text" class="form-control" id="exampleInputText1" aria-describedby="textHelp" name="nome" required>
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" required>
                </div>

                <div class="mb-3">
                    <label for="exampleInputNumber1" class="form-label">Telefone</label>
                    <input type="number" class="form-control" id="exampleInputNumber1" name="telefone" required>
                </div>

                <button type="submit" class="btn btn-primary">Cadastrar cliente</button>

    </form>

</div>

</div>

</div>
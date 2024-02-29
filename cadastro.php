    <?php
    // Verifica se o formulário de cadastro foi submetido
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cadastro'])) {
        // Configurações do banco de dados
        $servername = "127.0.0.1"; // Endereço do servidor
        $username = "root"; // Nome de usuário do banco de dados
        $password = ""; // Senha do banco de dados
        $database = "tcc"; // Nome do banco de dados


        // Cria a conexão com o banco de dados
        $conn = new mysqli($servername, $username, $password, $database);

        // Verifica se a conexão foi estabelecida com sucesso
        if ($conn->connect_error) {
            die("Erro na conexão com o banco de dados: " . $conn->connect_error);
        }

        // Função para cadastrar um novo usuário
        function cadastrarUsuario($conn, $email, $senha, $username) {
            // Hash da senha antes de salvar no banco de dados
            $hashedSenha = password_hash($senha, PASSWORD_DEFAULT);
            
            // Prepara a declaração SQL para inserir um novo usuário
            $stmt = $conn->prepare("INSERT INTO usuarios (email, senha, username) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $email, $hashedSenha, $username);
            
            // Executa a declaração preparada e verifica se foi bem-sucedida
            if ($stmt->execute()) {
                return true; // Retorna verdadeiro se o usuário foi cadastrado com sucesso
            } else {
                return false; // Retorna falso se houver erro ao cadastrar o usuário
            }
        }

        // Verifica se os campos do formulário foram enviados e não estão vazios
        if (isset($_POST['email-cadastro']) && isset($_POST['senha-cadastro']) && isset($_POST['username'])) {
            $email = $_POST['email-cadastro'];
            $senha = $_POST['senha-cadastro'];
            $username = $_POST['username'];
            
            // Chama a função para cadastrar o usuário
            if (cadastrarUsuario($conn, $email, $senha, $username)) {
                // Usuário cadastrado com sucesso, redireciona para a página de login
                echo "<p style='font-size: 24px; text-align: center;'>Usuário cadastrado com sucesso!</p>";
                //header("Location: pagLogin.html");
                //exit();
            } else {
                // Erro ao cadastrar usuário, exibe mensagem de erro
                echo "Erro ao cadastrar usuário.";
            }

            header("Refresh: 3; URL=pagLogin.html"); // Redirecionamento após 3 segundos
            exit();
        }

        // Fecha a conexão com o banco de dados
        $conn->close();
    }
    ?>

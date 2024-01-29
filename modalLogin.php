<style>
    #myModal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: #fefefe;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 400px;
        }

        .close {
            float: right;
            cursor: pointer;
        }
</style>


<div id="myModal">
        <div class="modal-content">
            <span class="close" onclick="fecharModal()">&times;</span>
            <!-- Formulário de login aqui -->
            <form>
                <h2>Faça o login para se candidatar</h2>
                <label for="username">Nome de usuário:</label>
                <input type="text" id="username" name="username">
                <label for="password">Senha:</label>
                <input type="password" id="password" name="password">
                <button onclick="performLogin()">Login</button>
        </div>
    </div>
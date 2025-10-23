<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_set_cookie_params([
    'lifetime' => 0,                
    'path' => '/',
    'domain' => 'solum.hubsapiens.com.br',
    'secure' => true,              
    'httponly' => true,           
    'samesite' => 'Lax'           
]);

session_start();

// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";

require_once("./utils/header.php");
echo '<link rel="stylesheet" href="css/pag-vender.css">';
if (isset($_SESSION['usuID'])) {
    
    require_once( "./utils/navbar_logado.php");
} else {
   
    require_once( "./utils/navbar_nao-logado.php");
}


?>
<main>
    <aside class="menu-lateral">
      <div class="perfil">
        <div class="foto"></div>
        <h2>Nome</h2>
        <!-- colocar estrelas de avaliaçã oaqui -->
        <!-- <p>desde 2025</p> -->
        <button class="botao-perfil">minha loja</button>
      </div>

      <div class="menu">
        <ul>
          <li><a href="#" class="menu-item active" data-section="a-venda">A venda</a></li>
          <li><a href="#" class="menu-item" data-section="historico">Histórico de Vendas</a></li>
          <li><a href="#" class="menu-item" data-section="configuracoes">Configurações</a></li>
        </ul>
      </div>
    </aside>

    <section class="conteudo">
    
      <div class="secao-conteudo active" id="a-venda">
        <div class="caixa">
          <h2>à venda</h2>
          <div class="area-rascunhos">
            <p>Por aqui nada...</p>
            <button class="botao-roxo">Criar novo anúncio</button>
          </div>
        </div>
      </div>

      
      <div class="secao-conteudo" id="historico">
        <div class="caixa">
          <h2>Histórico de Vendas</h2>
          <div class="area-historico">
            <p>Nenhuma venda registrada ainda</p>
          </div>
        </div>
      </div>


      <div class="secao-conteudo" id="configuracoes">
        <div class="caixa">
          <h2>Configurações da Loja</h2>
          <div class="area-configuracoes">
            <form class="form-configuracoes">
              <div class="form-group">
                <label for="nome-loja">Nome da Loja</label>
                <input type="text" id="nome-loja" name="nome-loja">
              </div>
              <div class="form-group">
                <label for="descricao-loja">Descrição</label>
                <textarea id="descricao-loja" name="descricao-loja"></textarea>
              </div>
              <button type="submit" class="botao-roxo">Salvar alterações</button>
            </form>
          </div>
        </div>
      </div>
    </section>
  </main>
  
  <?php require_once("./utils/footer.php"); ?>

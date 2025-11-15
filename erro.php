<?php include 'header.php';
    // Processamento do formulário de pesquisa
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if(isset($_POST['pesquisa'])){
            $pesquisa = $_POST['pesquisa'];

            foreach($receitas_json as $r){
                if(strtolower($r['titulo']) == $pesquisa){
                    $id = $r['id'];
                    header("Location: receitas.php?id=$id");
                    exit;
                }
            }
        }
    }
?>
<div class="container mt-5">
    <!--- Formulário de pesquisa --->
    <div class="row">
        <div class="col-4">
            <h1>Pesquisa de receitas</h1>
            <form action="" method="post">
                <span class="input-group">
                    <input type="text" class="form-control botao-pesquisa" name="pesquisa" id="pesquisa" placeholder="Bolo de chocolate, salada...">
                    <button class="btn btn-primary botao-pesquisa" type="submit" name="button-pesquisa" id="button-pesquisa">Cozinhar <i class="bi bi-fork-knife"></i></button>
                </span>
            </form>
        </div>
    </div>
    <!--Conteúdo da página de erro-->
    <div class="container mt-5 container-thumbnail">
        <h1>Ops... Nenhuma receita encontrada!</h1>
        <img src="data/imagens/prato_vazio.jpg" alt="Prato vazio" class="img-fluid">
    </div>
</div>
<?php include 'footer.php'; ?>
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
    <!--Container com todas as receitas-->
    <div class="container-flex mt-5 container-receitas">
        <div class="row justify-content-center" style="padding-left: 20px; padding-right: 20px;">
            <?php foreach ($receitas_json as $r): ?>
            <a href="receitas.php?id=<?= urlencode($r['id']) ?>" class="col-3 btn btn-thumbnail">
                <img src="<?= $r['thumbnail'] ?>" alt="<?= ucwords($r['titulo']) ?>" class="img-fluid-thumbnail menu-thumbnail">
                <h5><strong><?= ucwords($r['titulo']) ?></strong></h5>
                <p>Autor: <?= $r['autor'] ?></p>
            </a>
            <?php endforeach ?>
        </div>
        <br>
    </div>
</div>
<?php include 'footer.php'; ?>
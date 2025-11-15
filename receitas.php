<?php include 'header.php';
// Processamento do formulário de pesquisa
if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST['pesquisa'])){
        $pesquisa = strtolower(trim($_POST['pesquisa']));
        foreach($receitas_json as $r){
            if(strtolower($r['titulo']) == $pesquisa){
                $id = $r['id'];
                header("Location: receitas.php?id=$id");
                exit;
            }else {
                header("Location: erro.php");
            }
        }
    }
}
// Processamento da exibição da receita
if($_SERVER['REQUEST_METHOD'] == "GET"){
    if(isset($_GET['id'])){
        foreach($receitas_json as $r){
            if($r['id'] == $_GET['id']){
                $receita = [
                    'id'=> $r['id'],
                    'titulo'=> $r['titulo'],
                    'autor'=> $r['autor'],
                    'thumbnail'=> $r['thumbnail'],
                    'tags'=> $r['tags'],
                    'tempo'=> $r['tempo'],
                    'ingredientes'=> $r['ingredientes'],
                    'descricao'=> $r['descricao']
                ];
                break;
            }
        }
    } else {
        header("Location: erro.php");
    }
}?>
<!--Conteúdo da página de receitas-->
<div class="container mt-5">
    <div class="row">
        <div class="col-4">
            <h1>Pesquisa de receitas</h1>
            <form action="" method="post">
                <span class="input-group">
                    <input type="text" class="form-control" name="pesquisa" id="pesquisa" placeholder="Bolo de chocolate, salada...">
                    <button class="btn btn-primary" type="submit" id="button-pesquisa">Cozinhar <i class="bi bi-fork-knife"></i></button>
                </span>
            </form>
        </div>
    </div>
    <div class="container mt-5 container-thumbnail">
        <div class="row">
            <div class="col-12" style="border-bottom: 4px solid green;">
                <img src="<?=$receita['thumbnail']?>" alt="Imagem de <?=$receita['titulo']?>" class="img-fluid">
                <h1 class="pt-3"><strong><?=ucwords($r['titulo'])?></strong></h1>
                <p>Autor: <strong><?=$receita['autor']?></strong></p>
                <p><i class="bi bi-alarm-fill"></i> Tempo: <strong><?=$receita['tempo']?></strong></p>
            </div>
            <div class="col-12 pt-3">
                <h3>Ingredientes:</h3>
                <ul>
                    <?php foreach($receita['ingredientes'] as $ingrediente): ?>
                        <li><?=$ingrediente?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="col-12 pt-3">
                <h3>Descrição:</h3>
                <p><?=$receita['descricao']?></p>
            </div>
            <div class="col-12 pt-5 pb-5">
                <h5>Tags</h5>
                <?php foreach($receita['tags'] as $tag): ?>
                    <span class="badge bg-success"><?=$tag?></span>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
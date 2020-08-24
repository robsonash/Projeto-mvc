 <nav>
    <div class="nav-wrapper">
        <form method="post" action="/home/buscar">
        <div class="input-field">
            <input id="search" name="search" type="search" required>
          <label class="label-icon" for="search"><i class="material-icons">search</i></label>
          <i class="material-icons">close</i>
        </div>
      </form>
    </div>
  </nav>
<br>

<div class="row container">
<?php
if (!empty($data['mensagem'])):
    foreach ($data['mensagem'] as $m):
        echo $m . "<br>";
    endforeach;
endif;
?>

<?php 
$pagination = new App\Pagination($data['registros'], isset($_GET['page']) ? $_GET['page'] : 1, 5);
?>
<?php
if(empty($pagination->resultado())):
    echo "nenhum registro encontrado!";
endif;
?>
<?php // foreach ($data['registros'] as $note): 
foreach ($pagination->resultado() as $note):
?>
   
  
    
    <img style="float:left; margin:0 15px 15px 0;"src="<?php echo URL_BASE;?>/uploads/<?php echo $note['imagem'];?>" width="300" alt="imagem">
    <h3 class="light"><a href="/notes/ver/<?php echo $note['id']; ?>"><?php echo $note['titulo']; ?></a></h3>
    <p><?php echo $note['texto']; ?></p><br><br><br><br>
     <?php if(isset($_SESSION['logado'])): ?>
      <a class="waves-effect waves-light btn orange" href="/notes/editar/<?php echo $note['id']; ?>">Editar</a>  
    <a class="waves-effect waves-light btn red" href="/notes/excluir/<?php echo $note['id']; ?>">Excluir</a> <br><br>
      <?php endif;?>
<?php endforeach; ?><br><br><br><br><br><br>
<?php //paginação
$pagination->navigator();
?>

</div>
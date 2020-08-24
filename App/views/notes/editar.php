<div class="row container">
<h1> Editar bloco de anotação</h1>
<?php
if(!empty($data['mensagem'])):
    foreach($data['mensagem'] as $m):
    echo $m."<br>";
    endforeach;
endif;
?>
<form action="/notes/editar/<?PHP echo $data['registros']['id']?>" method="POST" enctype="multipart/form-data">
     <div class="row">
          <div class="input-field col s12">
                <input type="text" value="<?PHP echo $data['registros']['titulo']?>" name="titulo"><br>
            <label for="Titulo">Titulo</label>
          </div>
        </div>
     <div class="row">
        <div class="input-field col s12">
         <textarea  class="materialize-textarea" name="texto"><?PHP echo $data['registros']['texto']?></textarea>
          <label for="Texto">Texto</label>
        </div>      
      </div>
    
    <?php
    if(!empty($data['registros']['imagem'])):
        ?>
        <div class="row">
         <div class="input-field col s12">
    <button class="waves-effect waves-light btn red" name="deletarimagem">Deletar imagem</button>
    <button class="waves-effect waves-light btn orange" name="atualizar">Atualizar</button>
</div></div>
    <?php
    else: ?>
        <div class="row">
         <div class="input-field col s12">
        <input  type="file" name="foo" value="" required /><br>
        <button class="waves-effect waves-light btn orange" name="atualizarimagem">Atualizar</button>
          <label for="imagem">Imagem</label>
         </div>
  </div> 
      
      <?php
    endif;
?>
</form>
</div>




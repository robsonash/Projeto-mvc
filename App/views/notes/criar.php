<div class="row container">
    <h1> Criar bloco de anotação</h1>
    <?php
    if (!empty($data['mensagem'])):
        foreach ($data['mensagem'] as $m):
            echo $m . "<br>";
        endforeach;
    endif;
    ?>
    <form action="/notes/criar" method="POST" enctype="multipart/form-data">
        <div class="row">
          <div class="input-field col s12">
            <input id="titulo" type="text" name="titulo" required >
            <label for="Titulo">Titulo</label>
          </div>
        </div>
      
      <div class="row">
        <div class="input-field col s12">
            <textarea type="text" id="texto" name="texto" required class="materialize-textarea"></textarea>
          <label for="Texto">Texto</label>
        </div>
      </div>
   <div class="row">
         <div class="input-field col s12">
        <input  type="file" name="foo" value="" required /><br>
          <label for="imagem">Imagem</label>
         </div>
  </div>  
        
         <div class="row">
         <div class="input-field col s12">
        <button class="waves-effect waves-light btn" name="cadastrar">Cadastrar</button>
         </div>
  </div> 
        
           
    </form>
  </div>  

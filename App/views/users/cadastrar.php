<div class="row container">
<h1> Cadastrar usuario</h1>
<?php
if(!empty($data['mensagem'])):
    foreach($data['mensagem'] as $m):
    echo $m."<br>";
    endforeach;
endif;
?>
<form action="/users/cadastrar" method="POST">
    <div class="row">
        <div class="input-field col s12">
            <input id="nome" type="text" name="nome" class="validate" required >
          <label for="nome">Nome</label>
        </div>
      </div>
   <div class="row">
        <div class="input-field col s12">
            <input id="email" type="email" name="email" class="validate" required>
          <label for="email">Email</label>
        </div>
      </div>
    <div class="row">
        <div class="input-field col s12">
            <input id="password" type="password" name="senha" class="validate" required>
          <label for="password">Password</label>
        </div>
      </div>
  <div class="row">
        <div class="input-field col s12">
    <button class="waves-effect waves-light btn" name="cadastrar">Cadastrar</button>
   </div> </div>

</form>
</div>
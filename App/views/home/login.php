<br>
<?php
if (!empty($data['mensagem'])):
    foreach ($data['mensagem'] as $m):
        echo $m . "<br>";
    endforeach;
endif;
?>


<div class="row container">
<h1> Fazer login </h1>

<form action="/home/login" method="POST">
        <div class="row">
        <div class="input-field col s12">
            <input id="email" type="email" name="email" class="validate">
          <label for="email">Email</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
            <input id="password" type="password" name="senha" class="validate">
          <label for="password">Password</label>
        </div>
      </div>
     <div class="row">
        <div class="input-field col s12">
    <button class="waves-effect waves-light btn" name="entrar">Entrar</button>
</div></div>
    </form>

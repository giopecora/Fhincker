<div class="container">
  <div class="row" id="pwd-container">
    <div class="col-md-4"></div>
    <div class="col-md-4">
      <section class="login-form">
        <form method="post" enctype="multipart/form-data" action="EnvioPlanos/importar">
          <label for="arquivo1">Arquivo dos Soldados</label>
          <input type="file" align="center" class="form-control-file" id="arq1" required name="arq1" aria-describedby="fileHelp">
          </br>
          <label for="arquivo2">Arquivo das Naves</label>
          <input type="file" class="form-control-file" id="arq2" name="arq2" required aria-describedby="fileHelp">
          <br>
          <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Enviar</button>
        </form>
      </section>  
    </div>
  </div>
</div>

<div class="container">
  
  <div class="row" id="pwd-container">
    <div class="col-md-4"></div>
    
    <div class="col-md-4">
      <section class="login-form">
        <form method="post" action="Login/validar" role="login">
        
          <?php echo $_SESSION['mensagemLogin'];?>
          <input type="text" name="usuario" placeholder="usuario" required class="form-control input-lg"/>
          <input type="password" name="senha" class="form-control input-lg" id="senha" placeholder="senha" required="" />
          
          <div class="pwstrength_viewport_progress"></div>
          
          
          <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Entrar</button>
          
        </form>
      </section>  
      </div>
      
      
      
      

  </div>
  
 </div>
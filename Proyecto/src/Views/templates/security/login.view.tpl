<style>
  .redondo{
  background-color: #4c53af !important;
  border-color: #4c53af !important;
  display: block;
  border-radius: 10px;
  color: aliceblue !important;
  }
  .formulario{
    padding: 50px;
    background-color: #f2f9ff !important;
  }

  .fondo{  
    background: radial-gradient(to bottom, blue, white);
  }


</style>
<body style="background: linear-gradient(to bottom, #FFCD70, white); !important">
<section class="fullCenter ">
  <form class="grid " method="post" action="index.php?page=sec_login{{if redirto}}&redirto={{redirto}}{{endif redirto}}">
    <section class="depth-1 row col-12 col-m-8 offset-m-2 col-xl-6 offset-xl-3 formulario">
      <h1 class="col-12" >Iniciar Sesión</h1>
    </section>
    <section class="depth-1 py-5 row col-12 col-m-8 offset-m-2 col-xl-6 offset-xl-3 formulario">
      <div class="row">
        <label class="col-12 col-m-4 flex align-center " for="txtEmail">Correo Electrónico</label>
        <div class="col-12 col-m-8">
          <input class="width-full" type="email"  id="txtEmail" name="txtEmail" value="{{txtEmail}}" />
        </div>
        {{if errorEmail}}
          <div class="error col-12 py-2 col-m-8 offset-m-4">{{errorEmail}}</div>
        {{endif errorEmail}}
      </div>
      <div class="row">
        <label class="col-12 col-m-4 flex align-center" for="txtPswd">Contraseña</label>
        <div class="col-12 col-m-8">
         <input class="width-full" type="password" id="txtPswd" name="txtPswd" value="{{txtPswd}}" />
        </div>
        {{if errorPswd}}
        <div class="error col-12 py-2 col-m-8 offset-m-4">{{errorPswd}}</div>
        {{endif errorPswd}}
      </div>
    {{if generalError}}
      <div class="row">
        {{generalError}}
      </div>
    {{endif generalError}}
     <div class="row right flex-end px-4">
      <p><a href="index.php?page=sec_recuperar">Olvide mi Contraseña</a></p>
    </div>
    <div class="row right flex-end px-4">
      <button class="primary redondo" id="btnLogin" type="submit">Iniciar Sesión</button>
    </div>
    </section>
  </form>
</section>
</body>

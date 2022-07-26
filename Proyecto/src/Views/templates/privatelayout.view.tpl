<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{SITE_TITLE}}</title>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/{{BASE_DIR}}/public/css/appstyle.css" />
  
  
  {{foreach SiteLinks}}
  <link rel="stylesheet" href="/{{~BASE_DIR}}/{{this}}" />
  {{endfor SiteLinks}}
  {{foreach BeginScripts}}
  <script src="/{{~BASE_DIR}}/{{this}}"></script>
  {{endfor BeginScripts}}
</head>
<style>

.encabezado{
  background-color: #8ce272 !important;
 position: relative;
  display: flex;
  
}




</style>
<body>
  

  <header class="encabezado">
    <input type="checkbox" class="menu_toggle" id="menu_toggle" />
    <label for="menu_toggle" class="menu_toggle_icon">
      <div class="hmb dgn pt-1"></div>
      <div class="hmb hrz"></div>
      <div class="hmb dgn pt-2"></div>
    </label>
    <a href="index.php?page=home" class="header-logo-container"></a>
    <h1>{{SITE_TITLE}}</h1>
    <nav id="menu">
      <ul>
      
        <li><a href="index.php?page=admin_admin"></i>&nbsp;Inicio</a></li>
        {{foreach NAVIGATION}}
            <li><a href="{{nav_url1}}">{{nav_label1}}</a></li>    
                 <li><a href="{{nav_url2}}">{{nav_label2}}</a></li> 
                 <li><a href="{{nav_url3}}">{{nav_label3}}</a></li>    
                 <li><a href="{{nav_url4}}">{{nav_label4}}</a></li> 
               
        {{endfor NAVIGATION}}
           <li><a href="index.php?page=sec_logout" class="menu-logout">Cerrar sesión</a></li>
      </ul>

      
    </nav>
   <div class="bottons" style="left:100px;">
    {{with login}}
    <span class="username">{{userName}} </span>
   <a href="index.php?page=carrito&mode=DSP" class="button " >Carrito</a>
    {{endwith login}}

    </div>




  </header>
  <main>
    {{{page_content}}}
  </main>
  
  {{foreach EndScripts}}
  <script src="/{{~BASE_DIR}}/{{this}}"></script>
  {{endfor EndScripts}}
</body>
</html>

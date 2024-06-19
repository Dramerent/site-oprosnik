<? include "/mine/apps/ospanel/domains/localhost/admin/db.php";?>
<!DOCTYPE html>
<html>
<head>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <meta charset='utf-8'>
    <link rel="icon" href="img/png-clipart-coffee-cup-tea-emoji-drink-coffee-cocktail-smiley.png" type="image/x-icon/" >
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Главное меню</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen'  >
    <script src='main.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
      #navbar-{
        display: flex;
        flex-wrap: nowrap;
      }
      .window{
        width: 70%;
        height: auto;
        display: flex;
        padding: 50px;
        background-color:lightgrey;
        margin: auto;
      }
      .photo{
        width: 50%;
        height: auto;
      }
      .textwindow{
        width: 40%;
        height: 100%;
        margin:0 auto;
        display: flex;
        flex-direction: column;
      }
      .p1{
        font-size: 3vw;
        font-weight: bold;
      }
      .p2{
        font-size: 2.5vw;
      }
      .p3{
        font-size: 2vw;
      }
      
      

    </style>

</head>
<body style="background-color:rgb(217,217,217)">
  <?php if ($_COOKIE['user'] != ''): ?>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <nav class="navbar navbar-light bg-light">
          <div class="container-fluid">
            <a class="navbar-brand">
              <img src="img/parma.jpg" alt="" width="30" height="24" class="d-inline-block align-text-top">
            </a>
          </div>
        </nav>
        <div class="container-fluid">
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" ><p>Привет, <?=$_COOKIE['user'];if($_COOKIE['user']=='ilya'):?>,[Admin]<?php endif?></p>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/admin/info.php">Личный кабинет</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/admin/stat.php">статистика
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/admin/oprosi.php">Опросы</a>
              </li>
            </ul>
          </div>
        </div> 
        <?php if($_COOKIE['user']=='ilya'):{?>
          <a href="/admin//admin.php?do=add">
            <button type="button" class="btn btn-success" name="opros" style="margin:0 20px 0 0;white-space:nowrap">
              Создать опрос
</button></a>
          
        <?php }; endif;
        ?>
       
        <nav class="navbar navbar-light bg-light">
          <form class="container-fluid justify-content-start">
            
            <a href='/sborishe/time.php'><button class="btn btn-sm btn-outline-secondary" type="button">Выход</button></a>
          </form>
        </nav>
        <!--посковое окно-->
      </nav>
      <div class = "window">
        <div class = "photo">
                      
                      <?php if ($_COOKIE['user']=='ivan'):?>
                          <img style="border-style:groove;border-width:1vw"src="/admin/img/ivan.jpg"
                          alt="Generic placeholder image" class="img-fluid">
                          
                      <?php elseif ($_COOKIE['user']=='nikita'):?> 
                          <img style="border-style:groove;border-width:1vw"src="/admin/img/nikita.jpg"
                          alt="Generic placeholder image" class="img-fluid">
                      <?php elseif ($_COOKIE['user']=='karina'):?> 
                          <img style="border-style:groove;border-width:1vw"src="/admin/img/karina.jpg"
                          alt="Generic placeholder image" class="img-fluid">
                      <?php elseif ($_COOKIE['user']=='ilya'):?> 
                          <img style="border-style:groove;border-width:1vw"src="/admin/img/ilya.jpg"
                          alt="Generic placeholder image" class="img-fluid">
                      <?php elseif ($_COOKIE['user']=='nika'):?> 
                          <img style="border-style:groove;border-width:1vw"src="/admin/img/img.jpg"
                          alt="Generic placeholder image" class="img-fluid">
                          <?php else:?>
                            <img style="border-style:groove;border-width:1vw"src="/admin/img/noname.jpg"
                            alt="Generic placeholder image" class="img-fluid">
                      <?php endif?>
        </div>
        <div class ="textwindow">
        <p class = "p1"><?=$_COOKIE['user']?></p>
        <p class = "p2"><?php if($_COOKIE['user']!='ilya'):?>пользователь<?php else:?>Админ <?php endif?></p>
        <p class = "p3"><?=$_COOKIE['email']?></p><a style = "width:min-content" href='/sborishe/time.php'><button type="button" class="btn btn-secondary btn-lg">выйти</button></a>
        </div>
      </div>          
                      
                     
                          
                          
                        
                        
                        </nav>
                      </div>
                    </div>
                  </div>
                </div>
             
            </div>
         
      </section>
  <?php endif;?>
   
    
	</body>
</html>
</body>
</html>
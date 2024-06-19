<!DOCTYPE html>
<html>
<head>
  <?php require "/mine/apps/ospanel/domains/localhost/admin/quest/connect.php";?>
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
                <a class="nav-link active" aria-current="page" ><p>Привет, <?=$_COOKIE['user']; if ($_COOKIE['user']=='ilya'):?>,[Admin]<?php endif?></p>
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
        <a href="/admin//admin.php?do=add"><button type="button" class="btn btn-success" name="opros" style="margin:0 20px 0 0;white-space:nowrap">Создать опрос</button></a>
        <?php }; endif;
        ?>
        

        
       
        <nav class="navbar navbar-light bg-light">
          <form class="container-fluid justify-content-start">
            
            <a href='/sborishe/time.php'><button class="btn btn-sm btn-outline-secondary" type="button">Выход</button></a>
          </form>
        </nav>
        <!--посковое окно-->
      </nav>
      
     
      
      <table class="table">
        <thead>
          <tr>
            <th scope="col">Имя</th>
            <th scope="col">название опроса</th>
            <th scope="col">Результаты</th>
          </tr>
        </thead>
        <tbody>
           <?php  $info="SELECT * FROM itog";
            $result=mysqli_query($connect,$info);
            $row_count=mysqli_num_rows($result);
            echo  $row_count;
            if($row_count>0){
              for ($i=0; $i< $row_count;$i++){
                $row_arr=mysqli_fetch_array($result);
                $quest=$row_arr['quest'];
                $nam=$row_arr['nam'];
                $itog=$row_arr['itog'];
                if ($_COOKIE['user']==$nam && $itog != ''){
                
                echo'<tr>
                  <td>'.$nam.'</td>
                  <td>'.$quest.'</td>
                  <td>'.$itog.'</td>
                </tr>';
                }
                elseif($itog == ''){
                }
                elseif($_COOKIE['user']=='ilya'&& $itog != ''){
                  echo'<tr>
                  <td>'.$nam.'</td>
                  <td>'.$quest.'</td>
                  <td>'.$itog.'</td>
                </tr>';
                }
                }
                }
              ?>
            
              
              </tbody>
           </table>
           
                
           
              
          </tr>

        </tbody>
      </table>
      
   
    <?php endif?>
	

</body>
</html>
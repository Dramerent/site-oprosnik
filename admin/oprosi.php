<?php
    include_once  '/mine/apps/ospanel/domains/localhost/admin/db.php';

    $do = trim(strip_tags($_GET['do']));
    if ($do == 'save') {
        $title = trim($_POST['title']);

        $res = $db->prepare("INSERT IGNORE INTO tests (`title`) VALUES (:title)");
        $res->execute([
            ':title' => $title,
        ]);
        $testId = $db->lastInsertId();

        $questionNum = 1;
        while (isset($_POST['question_' . $questionNum])) {
            $question = trim($_POST['question_' . $questionNum]);
            if (empty($question)) {
                continue;
            }

            $res = $db->prepare("INSERT IGNORE INTO questions (`test_id`, `question`) VALUES (:test_id, :question)");
            $res->execute([
                ':test_id' => $testId,
                ':question' => $question,
            ]);
            $questionId = $db->lastInsertId();

            $answerNum = 1;
            while (isset($_POST['answer_text_' . $questionNum . '_' . $answerNum])) {
                $answer = trim($_POST['answer_text_' . $questionNum . '_' . $answerNum]);
                $score = trim($_POST['answer_score_' . $questionNum . '_' . $answerNum]);
                if (empty($answer)) {
                    continue;
                }

                $res = $db->prepare("INSERT IGNORE INTO answers (`question_id`, `answer`, `score`) 
                                    VALUES (:question_id, :answer, :score)");
                $res->execute([
                    ':question_id' => $questionId,
                    ':answer' => $answer,
                    ':score' => $score,
                ]);

                $answerNum++;
            }
            $questionNum++;
        }

        $resultNum = 1;
        while (isset($_POST['result_' . $resultNum])) {
            $result = trim($_POST['result_' . $resultNum]);
            $scoreMin = trim($_POST['result_score_min_' . $resultNum]);
            $scoreMax = trim($_POST['result_score_max_' . $resultNum]);

            $res = $db->prepare("INSERT IGNORE INTO results (`test_id`, `score_min`, `score_max`, `result`) 
                                    VALUES (:test_id, :score_min, :score_max, :result)");
            $res->execute([
                ':test_id' => $testId,
                ':score_min' => $scoreMin,
                ':score_max' => $scoreMax,
                ':result' => $result,
            ]);

            $resultNum++;
        }

        header ('Location: /admin/oprosi.php?do=list ');
    }

    if ($do != 'add') {
        $do = 'list';
    }
    ?>
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
        .wind{
            width: 1000px;
            height: 100px;
            border-style: double;
            display: flex;
            border-color: black;
            margin-left: auto;
            margin-right: auto;
            margin-top: 50px;
            position:relative;
            background-attachment: fixed;
            border-radius: 30px;
        }
        .img{
            width: 100px;
            height: 100%;
            border-color: black;
            display: flex;
            position: relative;
          
            padding: auto;
            border-style: double ;
            border-radius: 30px;
          
            
           
        }
        .window{
          border-style: double;
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
                <a class="nav-link active" aria-current="page"><p>Привет, <?=$_COOKIE['user']; if($_COOKIE['user']=='ilya'):?>,[Admin]<?php endif?></p>
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
      
        <?php include_once 'inc/' . $do . '.php'; ?>
      
        <?php endif;?>
       
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/app.js"></script>
	</body>
</html>
</body>
</html>
<style>
    .col-md-6{
        margin: 0 auto ;
    }
    .window{
        min-height: 200px;
        max-height: auto;
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: center;
        align-items: center;
        align-content: space-around;
        font-style: italic;
        font-size: 20px;
        gap: 30px
        
    }
    .window a{
       text-decoration: none; 
       color: white;
       font-size: 20px;
       
    }
    .window .textName{
        font-size: 35px;
        background-color:gainsboro;
        width: 100%;
    }
    .window button{
        width: 30%;
        height: auto;
        padding: 5px 0;
        background-color: red;
        border-color: red;
        border-radius: 20px;
        border-style: groove;
        
        

    }
   

    
</style>
<div class="col-md-6">
    <div class="card mt-4">
        <div class="card-header">
            <h2 class="text-center">Список тестов</h2>
        </div>
        <div class="card-body">
            <ul class="list">
                <?php
                $res = $db->query("SELECT * FROM tests");
                while ($row = $res->fetch()) {?>
                    <div class = "window">
                        <p class = "textName"> <?php echo $row['title']; ?><?php if($row['title'] == ''):?>noname_test<?php endif?></p>
                        <button class = "test111"><a href="index.php?id=<?php echo $row['id']; ?>">пройти тест </a></button>
                    </div>
                <?php } ?>
            </ul>
        </div>
    </div>

   
</div>
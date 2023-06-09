<style>
body{
    background-image: url("toyota.jpg");
    background-size: no-repeat;
    display: block;
    justify-content:center;
    margin-top:5%;
    margin-bottom:5%;
}

.main{
  font-family:'Pooppins',sans-serif;
    display: grid;
    height: 100%;
    place-items: center;
    background: #fff;
    padding: 40px;
    width: 250px;
    margin-left: auto;
    margin-right: auto;
    background: linear-gradient(135deg,#ff8200,#198754);
border-radius: 10px;
animation: animate 3s linear infinite;
    border: 2px solid #26527C;
}
@keyframes animate{
    100%{filter: hue-rotate(360deg);}
}
h1{
    margin-left: 50%;
    margin-right:65;
}

a{
    color: black;
    display: flex;
    justify-content:flex;
}

	
.button {
  
  padding: 5%;
  border: 1px solid #26527C;
  border-radius: 3px;
  display: flex;
  align-items: center;
  justify-content: center;
}

.pas{
    margin:2%;
    padding: 5%;
    border: 1px solid;
    border-color: #26527C;
    border-radius: 3px;
}
	
.error {
    border-color: #fd0130;
  }
</style>


<body>
    <div class="main">
	    
    <?php
       if (!empty($messages)) {
         print('<div id="messages">');
         // Выводим все сообщения.
         foreach ($messages as $message) {
            print($message);
         }
         print('</div>');
      }
    ?>
	    
    <h1>Форма</h1>
    
    <form action="index.php" method="POST">
            <div class="pas <?php if ($errors['name']) {print 'error';} ?>" >
                Имя:
                <input name="name" placeholder="Введите имя" 
                 value="<?php print $values['name']; ?>" />
            </div>

            <div class="pas <?php if ($errors['email']) {print 'error';} ?>">
                E-mail:
                <input name="email" type="email" placeholder="Введите почту" value="<?php print $values['email']; ?>"
	            >
            </div>

            <div class="pas" >
                Год рождения:
                <select id="yearB" name="year" >
                <?php
             for($i=1950;$i<=2023;$i++){
             if($values['year']==$i){
             printf("<option value=%d selected>%d </option>",$i,$i);
              }
             else{
             printf("<option value=%d>%d </option>",$i,$i);
            }
          }
          ?>
          </select>
            </div>

            <div class="pas <?php if ($errors['radio-1']) {print 'error';} ?>"> 
                Пол:<br>
                <input type="radio" name="radio-1" value="male"  <?php if($values['radio-1']=="male") {print 'checked';} ?>/>
                Мужской
                <input type="radio" name="radio-1" value="female" <?php if($values['radio-1']=="female") {print 'checked';} ?>/>
                Женский
            </div>



            <div class="pas <?php if ($errors['radio-2']) {print 'error';} ?>">
                Количество конечностей:<br>
                    <input type="radio" name="radio-2" value="1" <?php if($values['radio-2']=="1") {print 'checked';} ?>/>
                    1

                    <input type="radio" name="radio-2" value="2" <?php if($values['radio-2']=="2") {print 'checked';} ?>/>
                    2

                    <input type="radio" name="radio-2" value="3" <?php if($values['radio-2']=="3") {print 'checked';} ?>/>
                    3

                    <input type="radio" name="radio-2" value="4" <?php if($values['radio-2']=="4") {print 'checked';} ?>/>
                    4
            </div>


            <div class="pas <?php if ($errors['super']) {print 'error';} ?>">
                Сверхспособности:
                
                    <select name="super[]" multiple="multiple">
                    <?php if ($errors['super']) {print 'class="error"';} ?> >
                    <option value="inv" <?php if($values['inv']==1){print 'selected';} ?>>Бессмертие</option>
                    <option value="walk" <?php if($values['walk']==1){print 'selected';} ?>>Прохождение сквозь стены</option>
                    <option value="fly" <?php if($values['fly']==1){print 'selected';} ?>>Левитация</option>
                    </select>
                
            </div>

            <div class="pas <?php if ($errors['bio']) {print 'error';} ?>">
                Биография:
                <textarea name="bio"><?php print $values['bio']; ?></textarea>
            </div>

                        <?php 
                $cl_e='';
                $ch='';
                if($values['check-1'] or !empty($_SESSION['login'])){
                $ch='checked';
                }
                if ($errors['check-1']) {
                $cl_e='class="error"';
                }
                if(empty($_SESSION['login'])){
                print('
                <div  '.$cl_e.' >
                <input name="check" type="checkbox" '.$ch.'> Я согласен на обработку данных <br>
                </div>');}
                ?>

                <p class = "button">
                   <input type="submit" value="Отправить" />
                </p>
                </form>
            <?php
            if(empty($_SESSION['login'])){
            echo'
            <div class="login">
                <p> <a href="login.php">У меня уже есть аккаунт</a></p>
            </div>';
            }
            else{
                echo '
                <div class="logout">
                <form action="index.php" method="post">
		   <p class = "button">
                      <input name="logout" type="submit" value="Выйти">
                   </p>
                </form>
                </div>';
            } ?>

            <!-- <div class="pas <?php if ($errors['check-1']) {print 'error';} ?> ">
                <input type="checkbox" name="check-1" <?php if($values['check-1']==TRUE){print 'checked';} ?>/> С контактом ознакомлен(а)
            </div>
            <p>
                Отправка формы:
                <input type="submit" value="Send" />
            </p> -->
        </form>
    </div>
</body>
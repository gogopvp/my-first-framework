<?phprequire "/models/users.php";require "input_processing.php";unset($messageForUser);switch ($action){    case "index":        if (isset($_POST['login'])) {            $loginForNewRegistration = $_POST['login'];            if ($loginForNewRegistration == '') {                unset($loginForNewRegistration);            }        }//заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную        if (isset($_POST['password'])) {            $passwordForNewRegistration=$_POST['password'];            if ($passwordForNewRegistration =='') {                unset($passwordForNewRegistration);            }        }//если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт        if (empty($loginForNewRegistration) or empty($passwordForNewRegistration))        {            $messageForUser = "Заполните пожалуйста все поля";            include ("/views/registration.php");            exit();        }//если логин и пароль введены, то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести        $loginForNewRegistration = clearInput($loginForNewRegistration);        $passwordForNewRegistration = clearInput($passwordForNewRegistration);        $resultOfChecking = checkingIfUserExists($loginForNewRegistration);        if (!empty($resultOfChecking['id'])) {            $messageForUser = "Извините, введённый вами логин уже зарегистрирован. Введите другой логин.";            include ("/views/registration.php");            exit ();        }// Проверяем, есть ли ошибки        $isUserRegistred = RegisterUser($loginForNewRegistration,$passwordForNewRegistration);        if ($isUserRegistred)        {            $messageForUser = "Вы успешно зарегистрированы! Теперь вы можете зайти на сайт. <a href='../'>Главная страница</a>";            include ("/views/registration.php");            exit ();        }        else {            $messageForUser = "Ошибка! Вы не зарегистрированы.";            include ("/views/registration.php");            exit ();        }}
<div class="form">
    <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
        <fieldset>
            <legend>Оставьте отзыв!</legend>
            <div id="main_info" style="display: flex; flex-direction: column; gap: 10px;">
                <div>
                    <label for="name">Имя:
                        <input type="text" name="name"/>
                    </label>
                </div>
                <div>
                    <label for="email">Email:
                        <input type="email" name="email"/>
                    </label>
                </div>
            </div>
            <div id="extra_info">
                <div>
                    <p><label for="review">Оцените наш сервис!</label></p>
                    <div style="display: flex; flex-direction: column;">
                        <p><input id="review" type="radio" name="review"
                                  value="10" checked>Хорошо</p>
                        <p><input id="review" type="radio" name="review"
                                  value="8">Удовлетворительно</p>
                        <p><input id="review" type="radio" name="review"
                                  value="5">Плохо</p>
                    </div>
                </div>
            </div>
            <div id="message_info">
                <div>
                    <p><label for="comment">Ваш комментарий: </label></p>
                    <textarea id="comment" name="comment" cols="30"
                              rows="10" class="comment"></textarea>
                </div>
            </div>
            <div id="buttons" style="display: flex; flex-direction: row; gap: 10px; margin-top: 10px;">
                <input type="submit" value="Отправить"/>
                <input type="reset" value="Удалить"/>
            </div>
        </fieldset>
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $data = [
            'name' => $_POST['name'] ?? '',
            'email' => $_POST['email'] ?? '',
            'review' => $_POST['review'] ?? '',
            'comment' => $_POST['comment'] ?? ''
        ];
        $errors = testData($data);
        if (empty($errors)) {
            ?>
            <div id="result">
                <p>Ваше имя: <b><?php echo $_POST["name"] ?></b></p>
                <p>Ваш e-mail: <b><?php echo $_POST["email"] ?></b></p>
                <p>Оценка товара: <b><?php echo $_POST["review"] ?></b></p>
                <p>Ваше сообщение: <b><?php echo $_POST["comment"] ?></b></p>
            </div>
            <?php
        }
    }
    function testData(&$data){
        $errors[] = testName($data['name']);
        $errors[] = testEmail($data['email']);
        $errors[] = testReview($data['review']);
        $errors[] = testComment($data['comment']);
        return $errors;
    }
    function testName($name)
    {
        if (empty($name)) {
            return "Name is required";
        } else {
            $name = test_input($name);
            if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
                return "Only letters and white space allowed";
            }
        }
    }
    function testEmail($email)
    {
        if (empty($email)) {
            return "Email is required";
        } else {
            $email = test_input($email);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return "Invalid email format";
            }
        }
    }

    function testReview($review)
    {
        if (empty($review)) {
            return "Review is required";
        }
    }

    function testComment($comment)
    {
        if (empty($comment)) {
            return "Comment is required";
        }
    }
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        return htmlspecialchars($data);
    }
    ?>
</div>

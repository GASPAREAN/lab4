<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Обзор одежды</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <h1>Обзор одежды</h1>
        <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
            <div class="mb-3">
                <label for="brand" class="form-label">Бренд одежды</label>
                <input type="text" class="form-control" id="brand" name="brand" required>
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Тип одежды</label>
                <select class="form-select" id="type" name="type" required>
                    <option value="">Выберите тип</option>
                    <option value="shirt">Рубашка</option>
                    <option value="pants">Брюки</option>
                    <option value="dress">Платье</option>
                    <option value="jacket">Куртка</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="size" class="form-label">Размер</label>
                <input type="text" class="form-control" id="size" name="size" required>
            </div>
            <button type="submit" class="btn btn-primary">Отправить</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $brand = $_POST["brand"];
    $type = $_POST["type"];
    $size = $_POST["size"];
?>
    <div class='container mt-5'>
        <h2>Результаты обзора одежды:</h2>
        <div class='card'>
            <div class='card-body'>
                <?php
                echo "<p class='card-text'><strong>Бренд одежды:</strong> $brand</p>";
                echo "<p class='card-text'><strong>Тип одежды:</strong> $type</p>";
                echo "<p class='card-text'><strong>Размер:</strong> $size</p>";
                ?>
            </div>
        </div>
    </div>
<?php
}
?>

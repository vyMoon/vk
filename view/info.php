<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <title>Информация</title>
    </head>

    <body>
        <h2> <?php echo $name ?> </h2>
        <ul>
            <?php foreach($user['friends'] as $a) : ?>
                <li> <?php echo $a['first_name'] . ' ' .  $a['last_name']?> </li>
            <?php endforeach ?>
        </ul>
        <p>
            <a href="./controller/controller.php?action=logout">выйти</a>
        </p>

    </body>
</html>

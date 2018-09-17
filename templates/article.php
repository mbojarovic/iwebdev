<?php
/** @var \App\View $this */
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP-2</title>
</head>
<body>

    <h1><?php echo $this->langs['article'] ?></h1>
    <article>
        <h2>
                <?php echo $this->article->title; ?>
        </h2>
        <p><?php echo $this->article->content; ?></p>
    </article>

</body>
</html>
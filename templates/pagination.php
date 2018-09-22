<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>
<body>

<?php

if ($this->pagination['total_no_of_records'] > 0) { ?>
    <nav aria-label="...">
        <ul class="pagination">

            <?php

            $total_no_of_pages = ceil($this->pagination['total_no_of_records'] / $this->pagination['records_per_page']);
            $current_page = 1;

            if (isset($_GET['page'])) {
                $current_page = $_GET['page'];
            }

            if ($current_page != 1) {
                $previous = $current_page -1; ?>


                <li class="page-item">
                    <a class="page-link" href="<?= $this->pagination['path'] ?>?page=1">First</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="<?= $this->pagination['path'] ?>?page=<?= $previous ?>" tabindex="-1">Previous</a>
                </li>

            <?php } ?>

            <?php
            $i = 1;
            while ($i <= $total_no_of_pages) {
                if ($i == $current_page) { ?>
            <li class="page-item active">
                <a class="page-link" href="<?= $this->pagination['path'] ?>?page=<?= $i ?>"<span class="sr-only"><?= $i ?></span></a>
            </li>
                <?php } else { ?>
                    <li class="page-item"><a class="page-link" href="<?= $this->pagination['path'] ?>?page=<?= $i ?>"><?= $i ?></a></li>
                <?php }
                $i++;
            } ?>

            <?php if ($current_page != $total_no_of_pages) {
                $next = $current_page +1; ?>

            <li class="page-item">
                <a class="page-link" href="<?= $this->pagination['path'] ?>?page=<?= $next ?>">Next</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="<?= $this->pagination['path'] ?>?page=<?= $total_no_of_pages ?>">Last</a>
            </li>

            <?php } ?>
        </ul>
    </nav>
<?php } ?>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
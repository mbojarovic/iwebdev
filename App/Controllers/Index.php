<?php

namespace App\Controllers;

use App\Controller;
use App\Models\Article;

class Index extends Controller
{

    protected function handle()
    {
        $this->view->langs = $this->lang;

    }

    protected function pagination()
    {
        $starting_position = 0;
        $records_per_page = 2;
        $self = '/../../index/';

        if(isset($_GET['page']))
        {
            $starting_position = ($_GET['page'] -1) * $records_per_page;
        }

            $this->view->articles = Article::findMultiAll($starting_position, $records_per_page);
            echo $this->view->render(__DIR__ . '/../../templates/index.php');

            $total_no_of_records = Article::countAll();

            if($total_no_of_records > 0) {
                ?><tr><td colspan="3">

                    <?php
                    $total_no_of_pages=ceil($total_no_of_records / $records_per_page);
                    $current_page = 1;

                    if(isset($_GET['page'])) {
                        $current_page=$_GET['page'];
                    }

                    if($current_page != 1) {
                        $previous = $current_page -1;
                        echo "<a href='".$self."?page=1'>First</a>&nbsp;&nbsp;";
                        echo "<a href='".$self."?page=".$previous."'>Previous</a>&nbsp;&nbsp;";
                    }
                    for($i=1;$i<=$total_no_of_pages;$i++)
                    {
                        if ($i == $current_page) {
                            echo "<strong><a href='".$self."?page=".$i."' style='color:red;text-decoration:none'>".$i."</a></strong>&nbsp;&nbsp;";
                        } else {
                            echo "<a href='".$self."?page=".$i."'>".$i."</a>&nbsp;&nbsp;";
                        }
                    }

                    if($current_page != $total_no_of_pages) {
                        $next=$current_page +1;
                        echo "<a href='".$self."?page=".$next."'>Next</a>&nbsp;&nbsp;";
                        echo "<a href='".$self."?page=".$total_no_of_pages."'>Last</a>&nbsp;&nbsp;";
                    }
                    ?></td></tr><?php
            }
        }
}
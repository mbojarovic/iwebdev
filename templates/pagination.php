<?php

if($this->pagination['total_no_of_records'] > 0) {
    ?><tr><td colspan="3">

        <?php
        $total_no_of_pages = ceil($this->pagination['total_no_of_records'] / $this->pagination['records_per_page']);
        $current_page = 1;

        if(isset($_GET['page'])) {
            $current_page=$_GET['page'];
        }

        if($current_page != 1) {
            $previous = $current_page -1;
            echo "<a href='".$this->pagination['path']."?page=1'>First</a>&nbsp;&nbsp;";
            echo "<a href='".$this->pagination['path']."?page=".$previous."'>Previous</a>&nbsp;&nbsp;";
        }
        for($i=1;$i<=$total_no_of_pages;$i++)
        {
            if ($i == $current_page) {
                echo "<strong><a href='".$this->pagination['path']."?page=".$i."' style='color:red;text-decoration:none'>".$i."</a></strong>&nbsp;&nbsp;";
            } else {
                echo "<a href='".$this->pagination['path']."?page=".$i."'>".$i."</a>&nbsp;&nbsp;";
            }
        }

        if($current_page != $total_no_of_pages) {
            $next = $current_page +1;
            echo "<a href='".$this->pagination['path']."?page=".$next."'>Next</a>&nbsp;&nbsp;";
            echo "<a href='".$this->pagination['path']."?page=".$total_no_of_pages."'>Last</a>&nbsp;&nbsp;";
        }
        ?></td></tr><?php
}
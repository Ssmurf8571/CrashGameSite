<?php
    include('../libs/authorization/db.php');

    $result2 = mysqli_query($db,"SELECT user, date, message FROM message");

    if($result2)
    {
        $rows = mysqli_num_rows($result2);
        
        for ($i = 0 ; $i < $rows ; ++$i)
        {
            $row = mysqli_fetch_row($result2);
                $j=0; echo '<span class="username">'.$row[$j].'</span>';
                $j=1; echo '<span class="date">'.$row[$j].'</span>';
                $j=2; echo '<span class="umessage">'.$row[$j].'</span>';
            echo "<br>";
        }
        
        mysqli_free_result($result2);
    } else {
        echo "Error connected...";
    }
?>
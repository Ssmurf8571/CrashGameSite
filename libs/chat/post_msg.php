<?php

    require __DIR__ . '/../authorization/db.php';

    // $result = mysqli_query($db,"SELECT user, date, message FROM message");

    // $rows = mysqli_num_rows($result);
    
    // for ($i = 0 ; $i < $rows ; ++$i)
    // {
    //     $row = mysqli_fetch_row($result);
    //         $j=0; echo '<span class="username">'.$row[$j].'</span>';
    //         $j=1; echo '<span class="date">'.$row[$j].'</span>';
    //         $j=2; echo '<span class="umessage">'.$row[$j].'</span>';
    //     echo "<br>";
    // }


    $result = mysqli_query($db,"SELECT user, date, message FROM message");
    while ($row = $result->fetch_assoc()) {
        echo '<span class="username">'.$row['user'].'</span>';
        echo '<span class="date">'.$row['date'].'</span>';
        echo '<span class="umessage">'.$row['message'].'</span>';
        echo '<br>';
    }
    
    mysqli_free_result($result);

?>
<?php

    require __DIR__ . '/../db.php';

    $result = mysqli_query($db,"SELECT user, date, message FROM message");
    while ($row = $result->fetch_assoc()) {

        echo '<span class="username">'.$row['user'].'</span>';
        echo '<span class="date">'.$row['date'].'</span>';

        echo '<span class="umessage"><xmp>'.$row['message'].'</xmp></span>';
        echo '<br>';

    }
    
    mysqli_free_result($result);

?>
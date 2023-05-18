<?php
        #total amount recorded
        $total1 = 0;
        $query1 = mysqli_query($connection, " SELECT * FROM finance");
        while ($result1 = mysqli_fetch_array($query1)) {
          $total1 += $result1['amount'];
        }
        #total free will recorded
        $total2 = 0;
        $query2 = mysqli_query($connection, " SELECT * FROM finance");
        while ($result2 = mysqli_fetch_array($query2)) {
          $total2 += $result2['free_will'];
        }
        #total ministries amount added together
        $total3 = 0;
        $query3 = mysqli_query($connection, " SELECT * FROM finance WHERE ministry='Youth' OR ministry='Pemem' OR ministry='Women' OR ministry='Children' OR ministry='Evangelism' OR ministry='Welfare'");
        while ($result3 = mysqli_fetch_array($query3)) {
          $total3 += $result3['amount'];
        }
        #total tithes recorded
        $total4 = 0;
        $query4 = mysqli_query($connection, " SELECT * FROM finance WHERE type='Tithes'");
        while ($result4 = mysqli_fetch_array($query4)) {
          $total4 += $result4['amount'];
        }
        #total offering recorded
        $total5 = 0;
        $query5 = mysqli_query($connection, " SELECT * FROM finance WHERE type='Offering'");
        while ($result5 = mysqli_fetch_array($query5)) {
          $total5 += $result5['amount'];
        }
        #total missions offering recorded
        $total6 = 0;
        $query6 = mysqli_query($connection, " SELECT * FROM finance WHERE type='Missions'");
        while ($result6 = mysqli_fetch_array($query6)) {
          $total6 += $result6['amount'];
        }

        #total youth amount recorded
        $total7 = 0;
        $query7 = mysqli_query($connection, " SELECT * FROM finance WHERE ministry='Youth'");
        while ($result7 = mysqli_fetch_array($query7)) {
          $total7 += $result7['amount'];
        }
        #total Pemem amount recorded
        $total8 = 0;
        $query8 = mysqli_query($connection, " SELECT * FROM finance WHERE ministry='Pemem'");
        while ($result8 = mysqli_fetch_array($query8)) {
          $total8 += $result8['amount'];
        }
        #total Women amount recorded
        $total9 = 0;
        $query9 = mysqli_query($connection, " SELECT * FROM finance WHERE ministry='Women'");
        while ($result9 = mysqli_fetch_array($query9)) {
          $total9 += $result9['amount'];
        }
        #total Welfare amount recorded
        $total10 = 0;
        $query10 = mysqli_query($connection, " SELECT * FROM finance WHERE ministry='Welfare'");
        while ($result10 = mysqli_fetch_array($query10)) {
          $total10 += $result10['amount'];
        }
        #total Children amount recorded
        $total11 = 0;
        $query11 = mysqli_query($connection, " SELECT * FROM finance WHERE ministry='Children'");
        while ($result11 = mysqli_fetch_array($query11)) {
          $total11 += $result11['amount'];
        }
        #total Evangelism amount recorded
        $total12 = 0;
        $query12 = mysqli_query($connection, " SELECT * FROM finance WHERE ministry='Evangelism'");
        while ($result12 = mysqli_fetch_array($query12)) {
          $total12 += $result12['amount'];
        }

        #total Offertory amount recorded
        $total13 = 0;
        $query13 = mysqli_query($connection, " SELECT * FROM finance WHERE type='Offering' OR type='Tithes' OR type='Missions'");
        while ($result13 = mysqli_fetch_array($query13)) {
          $total13 += $result13['amount'];
        }

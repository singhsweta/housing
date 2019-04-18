

<script type="text/javascript"> 

    function getEvent(str) {
        if(str.length == 0) {
            //document.getElementById("result").innerHTML="";
            //return;
        }
        if (window.XMLHttpRequest)
         {// code for IE7+, Firefox, Chrome, Opera, Safari
          xmlhttp=new XMLHttpRequest();
        } else {// code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }

        xmlhttp.onreadystatechange=function() {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                document.getElementById("eventDiv").innerHTML=xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","ajax/ret_event.php?search_event="+str,true);
        xmlhttp.send();
    }
</script>

<div class="col-lg-12">
                        <h1 class="page-header">
                            All Events
                            <small>Upload</small>
                        </h1>
                    </div>

                    <div class="col-md-4 col-md-offset-8">
                        <div class="form-group">
                            <input type="text" name="search_event" id="search_event" onkeyup="getEvent(this.value)" placeholder="Enter Event Date(YYYY-MM-DD)" class="form-control">
                        </div>
                    </div>

<div class="col-md-12">
                            <?php 
                                $query = "SELECT * FROM event";
                                $ret_query = mysqli_query($con, $query);
                                echo "<table class='table table-bordered table-hover table-responsive-md table-condensed'>";
                                echo "<thead>";
                                echo "<tr><th>ID</th><th>Title</th><th>Body</th><th>Date</th><th>Duration</th><th>Address</th><th>Status</th><th>Edit</th><th>Delete</th></tr>";
                                echo "</thead>";
                                echo "<tbody id='eventDiv'>";
                                    while($row = mysqli_fetch_array($ret_query)) {
                                        $event_id = $row['event_id'];
                                        $event_status = $row['event_status'];
                                        
                                        echo "<tr>";
                                            echo "<td>".$event_id."</td>";
                                            echo "<td>".$row['event_title']."</td>";
                                            echo "<td>".$row['event_body']."</td>";
                                            echo "<td>".$row['event_date']."</td>";
                                            echo "<td>".$row['event_dur']."</td>";
                                            echo "<td>".$row['event_address']."</td>";
                                            echo "<td><a href='event.php?status={$event_status}&eid={$event_id}'>{$event_status}</a></td>";
                                            echo "<td><a href='event.php?source=update_event&edit={$event_id}'>Edit</a></td>";
                                            echo "<td><a href='event.php?delete={$event_id}'>Delete</a></td>";
                                        echo "</tr>";
                                    }

                                echo "</tbody>";
                                echo "</table>";
                             ?>

                            
                        </div>
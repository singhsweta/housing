
 <script type="text/javascript"> 

    function getPhotos(str) {
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
                document.getElementById("photoDiv").innerHTML=xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","ajax/ret_gallery.php?search_gallery="+str,true);
        xmlhttp.send();
    }
</script>

<div class="col-lg-12">
    <h1 class="page-header">
        All Photos
        <small>Upload</small>
    </h1>
</div>

<div class="col-md-4 col-md-offset-8">
    <div class="form-group">
        <select name="search_gallery" onchange="getPhotos(this.value)" class="form-control">
            <option value="all">--Select One--</option>
            <option value="Approved">Approved</option>
            <option value="Unapproved">Unapproved</option>
        </select>
    </div>
</div>

<div class="col-md-12">
    <?php 
        $query = "SELECT * FROM gallery";
        $ret_query = mysqli_query($con, $query);
        echo "<table class='table table-bordered table-hover table-responsive-md table-condensed'>";
        echo "<thead>";
        echo "<tr><th>ID</th><th>Title</th><th>File</th><th>Status</th><th>Edit</th><th>Delete</th></tr>";
        echo "</thead>";
        echo "<tbody id='photoDiv'>";
            while($row = mysqli_fetch_array($ret_query)) {
                $pid = $row['pid'];
                $ptitle = $row['ptitle'];
                $pstatus = $row['pstatus'];
                $pfile = $row['pfile'];
                echo "<tr>";
                    echo "<td>".$pid."</td>";
                    echo "<td>".$ptitle."</td>";
                    echo "<td><img width='50px' src='../images/$pfile' alt='$ptitle'></td>";
                    echo "<td><a href='gallery.php?status={$pstatus}&ppid={$pid}'>{$pstatus}</a></td>";
                    echo "<td><a href='gallery.php?source=edit_photo&edit={$pid}'>Edit</a></td>";
                    echo "<td><a href='gallery.php?delete={$pid}'>Delete</a></td>";
                echo "</tr>";
            }

        echo "</tbody>";
        echo "</table>";
     ?>

        
    </div>
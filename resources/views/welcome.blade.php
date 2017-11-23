@include('core')
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hongkhai";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

//Find master parent
$sql = "SELECT * FROM hongkhai.group where parent = 0";
$result = $conn->query($sql);

/*if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["groupId"]. " - Name: " . $row["groupName"]. " " . $row["parent"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();*/

    function reCursive($groupId){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "hongkhai";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        $sql = "SELECT * FROM hongkhai.group where parent=".$groupId;
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<li><label class='tree-toggler nav-header' for='group' id='".$row['groupId']."'>".$row['groupName']."</label><input type='hidden' name='groupId' value='".$row['groupId']."'>";
                 if(hasChild($row['groupId'])){
                     echo "<ul class='nav nav-list tree'>";
                     reCursive($row['groupId']);
                 }else{
                    ;
                 }
            }  
        }else{
            return "<li class='divider'></li>";
        }
        echo "</ul>";
        
    }

    function hasChild($groupId){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "hongkhai";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        $sql = "SELECT * FROM hongkhai.group where parent=".$groupId;
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            return true;
        }else{
            return false;
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <!-- Latest compiled and minified CSS -->
<link class="cssdeck" rel="stylesheet" href="{{asset('css/treeTable/tree.bootstrap.css')}}">
<link rel="stylesheet" href="{{asset('css/treeTable/bootstrap-responsive.min.css')}}" class="cssdeck">
</head>
<body>
  <div class="well" style="width:300px; padding: 8px 0;">
    <div style="overflow-y: scroll; overflow-x: hidden; height: 500px;">
        <ul class="nav nav-list">
            <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {       
                        echo "<li><label class='tree-toggler nav-header' for='group' id='".$row['groupId']."'>".$row['groupName']."</label><input type='hidden' name='groupId' value='".$row['groupId']."'>";    
                        if((haschild($row['groupId']))){
                        echo "<ul class='nav nav-list tree'>";
                            reCursive($row['groupId']);
                        }else{

                        }
                        echo "<li class='divider'></li>";
                        //reCursive($row["groupId"]);   
                        //echo "</li>";
                    }
                }else{
                    echo "No group";
                }
                
            ?>
                {{--  <ul class="nav nav-list tree">
                    <li><a href="#">Link</a></li>
                    <li><a href="#">Link</a></li>
                    <li><label class="tree-toggler nav-header">Header 1.1</label>
                        <ul class="nav nav-list tree">
                            <li><a href="#">Link</a></li>
                            <li><a href="#">Link</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="divider"></li>  --}}
        </ul>
    </div>
</div>
</body>

<script class="cssdeck" src="{{asset('js/treeTable/jQuery.treeTable.min.js')}}"></script>
<script class="cssdeck" src="{{asset('js/treeTable/treeTable.bootstrap.min.js')}}"></script>
<script>$(document).ready(function () {
	$('label.tree-toggler').click(function () {
		$(this).parent().children('ul.tree').toggle(300);
	});
});
</script>

</html>
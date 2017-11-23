<?php use App\Http\Controllers\groupController; ?>

            <?php 
                foreach($groupRecord as $group){
                    $treeChild = groupController::groupSearch($group['groupId']);
                    if(count($treeChild) != 0){
                        echo "<a href='#' class='list-group-item' data-parent='#menu".$menu."'>".$group['groupName']."</a>";
                        echo "<div class='collapse' id='menu1sub1'>";
                    }else{
                        echo "<a href='#menu".$menu."sub".$sub." class='list-group-item' data-toggle='collapse'>".$group['groupName']."<i class='fa fa-caret-down'></i></a>";
                        /*echo "<div class='collapse' id='menu".$menu."sub2".$sub"'>
                            <a href='#' class='list-group-item' data-parent='#menu1sub2'>3.2 a</a>
                        </div>";*/
                    }
                 }
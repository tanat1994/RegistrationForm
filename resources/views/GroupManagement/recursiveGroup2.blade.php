<?php use App\Http\Controllers\groupController; ?>

            <?php 
                foreach($groupRecord as $group){
                    $treeChild = groupController::groupSearch($group['groupId']);
                    if(count($treeChild) != 0){
                        echo "<a href='menu".$menu."sub".$sub."' class='list-group-item' data-toggle='collapse' data-parent='#menu".$menu."'>".$group['groupName']."<i class='fa fa-caret-down'></i></a>";
                        echo "<div class='collapse' id='menu".$menu."sub".$sub."'>";
                        echo "<a href='#' class='list-group-item' data-toggle='collapse' data-parent='#menu".$menu."sub".$sub."'>".$group['groupName']."</a>";
                        $sub++;
            ?>
                        @include('GroupManagement.recursiveGroup2',['groupRecord'=>$treeChild, 'menu'=>$menu, 'sub'=>$sub])
            <?php
                    }else{
                        echo "<a href='#' class='list-group-item' data-toggle='collapse' data-parent='#menu".$menu."'>".$group['groupName']."</a>";
                        $sub++;
                    }                    
                 }
                 echo "</div>";

            ?>
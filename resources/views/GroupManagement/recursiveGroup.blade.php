<?php use App\Http\Controllers\groupController; ?>

        <?php 
            foreach($groupRecord as $group){
                echo "<li><a href='/' onclick='myJsFunc();' style='font-size:17px;'>".$group['groupName']."</a>";
                $treeChild = groupController::groupSearch($group['groupId']);
                if(count($treeChild) != 0){
                    echo "<ul>";
        ?>
            @include('GroupManagement.recursiveGroup',['groupRecord'=>$treeChild])
        <?php
                }else{
                    ;
                }
                    echo "</li>";
            }
        ?>
</ul>

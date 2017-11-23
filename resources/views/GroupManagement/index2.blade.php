@extends('core')
<?php use App\Http\Controllers\groupController; ?>
@section('more_script')
    {{--  <link class="cssdeck" rel="stylesheet" href="{{asset('css/treeTable/tree.bootstrap.css')}}">  --}}
    <link type="text/css" rel="stylesheet" href="{{asset('css/dataTables/dataTables.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('css/dataTables/dataTables.bootstrap4.min.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('css/custom.css')}}"/>
    <script src="{{asset('js/dataTables/jQuery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/dataTables/dataTables.bootstrap4.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/filestyle/bootstrap-filestyle.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/filestyle/bootstrap-filestyle.min.js') }}"></script>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

    <style>
            .container{
            margin-top:20px;
            }
            .image-preview-input {
                position: relative;
                overflow: hidden;
                margin: 0px;    
                color: #333;
                background-color: #fff;
                border-color: #ccc;    
            }
            .image-preview-input input[type=file] {
                position: absolute;
                top: 0;
                right: 0;
                margin: 0;
                padding: 0;
                font-size: 20px;
                cursor: pointer;
                opacity: 0;
                filter: alpha(opacity=0);
            }
            .image-preview-input-title {
                margin-left:2px;
            }
    </style>

    <style>
    /* level 1*/
    .list-group .collapse .list-group-item  {
      padding-left:20px;
    }

    /* level 2*/
    .list-group .collapse > .collapse .list-group-item {
      padding-left:30px;
    }

    /* level 3*/
    .list-group .collapse > .collapse > .collapse .list-group-item {
      padding-left:40px;
    }
    </style>


        {{--  <script src="{{asset('js/navgoco/jquery-1.10.2.min.js')}}"></script>  --}}
		<script src="{{asset('js/navgoco/jquery.cookie.js')}}"></script>
		<!-- Add navgoco main js and css files  -->

        <script src="{{asset('js/navgoco/highlight.pack.js')}}"></script>
		<script src="{{asset('js/navgoco/demo.js')}}"></script>

		<script type="text/javascript" src="{{asset('js/navgoco/jquery.navgoco.js')}}"></script>
        <link rel="stylesheet" type="text/css" href="{{asset('css/navgoco/jquery.navgoco.css')}}" media="screen" />
        
        <script type="text/javascript" id="demo1-javascript">
			$(document).ready(function() {
				// Initialize navgoco with default options
				$("#demo1").navgoco({
					caretHtml: '',
					accordion: false,
					openClass: 'open',
					save: true,
					cookie: {
						name: 'navgoco',
						expires: false,
						path: '/'
					},
					slide: {
						duration: 400,
						easing: 'swing'
					},
					// Add Active class to clicked menu item
					onClickAfter: active_menu_cb,
				});

				$("#collapseAll").click(function(e) {
					e.preventDefault();
					$("#demo1").navgoco('toggle', false);
				});

				$("#expandAll").click(function(e) {
					e.preventDefault();
					$("#demo1").navgoco('toggle', true);
				});
			});
	</script>
@endsection


@section('activegroup')
tabbuttonactive
@endsection


@section('htmlheader_title')
{{ trans('menu.group') }}
@endsection


@section('content')
    <div class="row-fluid">
        <div class="col-md-12 divunderline">
            <h2 style="color:#2e7ed0; margin-left: 0.2%"><a href="{{ URL::to('/groupmanagement') }}" style="text-decoration:none;color:#2e7ed0;"><strong>{{ trans('menu.group') }}</strong></a> </h2>
            <hr class="hrbreakline">

            <!-- TREE SECTION -->
            <div class="col-md-2 col-sm-2" style="background-color:#F5F5F5; padding-left:0;">
                <div class="col-md-12" style="background-color:white;align:middle; float:left;">
                    {{--  @include('GroupManagement.treeList')  --}}
                    <?php 
                        $menu = 1;
                        $sub = 1;
                            echo "<div class='list-group panel'>";
                            $master_tree = groupController::groupSearch('0'); 
                            foreach($master_tree as $tree){
                                $treeView = groupController::groupSearch($tree['groupId']);
                                if(count($treeView) != 0){
                                    echo "<a href='#menu".$menu."' class='list-group-item' data-toggle='collapse' data-parent='#sidebar'>".$tree['groupName']."<i class='fa fa-caret-down'></i></a>";
                                    echo "<div class='collapse' id='menu".$menu."'>";
                                }else{
                                    echo "<a href='#menu".$menu."' class='list-group-item' data-toggle='collapse' data-parent='#sidebar'>".$tree['groupName']."</a>";
                                } 
                        ?>
                            @include('GroupManagement.recursiveGroup2',['groupRecord'=>$treeView, 'menu'=>$menu, 'sub'=>$sub])
                        <?php
                            echo "</div>";
                            $menu++;
                        }
                            echo "</div>";
                        ?>
                </div>
            </div>

            <!-- MANAGE SECTION -->
            <div class="col-md-10 col-sm-10" style="background-color: white;">
                <div class="col-md-12">
                    {{--  <h3 style="color:#2e7ed0; margin-left: 0.2%"><a href="{{ URL::to('/groupmanagement') }}" style="text-decoration:none;color:#2e7ed0;float:left;margin-bottom:3px;"><strong>{{ trans('menu.group') }}</strong></a> </h3>  --}}
                    <h3 style="float:left;"><a href="{{ URL::to('/groupmanagement') }}" style="color:#2e7ed0;"><strong>{{ trans('menu.group') }}</strong></a></h3>  
                    <input type="image" src="{{ asset('images/plus.png') }}" style="float:right; width:35px; height:35px; margin-top: 1.2%;" data-toggle="modal" data-target="#myModal"/>
                    <hr class="hrbreakline">
                </div>
               
                <div class="col-md-12">
                    <table class="table table-striped table-bordered table-hover display" id="myTable" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th nowrap style="background-color:#2e7ed0;color:white;"><strong>{{ trans('table.no') }}</strong></th>
                                <th nowrap style="background-color:#2e7ed0;color:white;"><strong>{{ trans('table.groupname') }}</strong></th>
                                <th nowrap style="background-color:#2e7ed0;color:white;"><strong>{{ trans('table.nomember') }}</strong></th>
                                <th nowrap style="background-color:#2e7ed0;color:white;"><strong>{{ trans('table.datecreate') }}</strong></th>
                                <th nowrap style="background-color:#2e7ed0;color:white;"><strong>{{ trans('table.usercreate') }}</strong></th>
                                {{--  <th data-breakpoints="xs" nowrap style="background-color:#2e7ed0"><strong>{{ trans('table.name') }}</strong></th>
                                <th data-breakpoints="xs sm" data-type="date" data-format-string="MMMM Do YYYY" nowrap style="background-color:#2e7ed0"><strong>{{ trans('table.position') }}</strong></th>
                                <th data-breakpoints="xs sm md" data-type="date" data-format-string="MMMM Do YYYY" nowrap style="background-color:#2e7ed0"><strong>{{ trans('table.status') }}</strong></th>  --}}
                            </tr>
                        </thead>
                        <tbody>
                            {{--  @foreach($groupRecord as $record)
                                <tr>
                                    <td>{{ $record['groupId'] }}</td>
                                    <td>{{ $record['groupName'] }}</td>
                                    <td>0</td>
                                    <td>{{ $record['date_create'] }}</td>
                                    <td>{{ $record['user_create'] }}</td>
                                </tr>
                            @endforeach  --}}
                                    <tr>
                                    <td>a</td>
                                    <td>a</td>
                                    <td>a</td>
                                    <td>a</td>
                                    <td>a</td>
                                    </tr>
                                    <tr>
                                    <td>b</td>
                                    <td>b</td>
                                    <td>b</td>
                                    <td>b</td>
                                    <td>b</td>
                                    </tr>
                        </tbody>

                    <tfoot>
                    </tfoot>
            </table>

                <!--*************** MODAL SECTION *************-->
                    <!-- Modal -->
                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog modal-lg">
                            <!-- Modal content-->
                            <div class="modal-content">

                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h2 class="modal-title" style="color:#2e7ed0;"><strong>CREATE METHOD</strong></h2>
                                </div>

                                    <div class="modal-body">
                                        <form class="form-horizontal">
                                            <div class="form-group" style="margin-left: 1%;">
                                                <div class="input-group">
                                                    <h4><strong>1. {{trans('register.importfile')}}</strong></h4>

                                                        {{-- INPUT FILE SECTION --}}
                                                        <div class="container">
                                                            <div class="row-fluid">
                                                                <div class="col-xs-12 col-md-4 ">  
                                                                    <!-- image-preview-filename input [CUT FROM HERE]-->
                                                                    <div class="input-group image-preview">
                                                                        <input type="text" class="form-control image-preview-filename"> <!-- don't give a name === doesn't send on POST/GET -->
                                                                        <span class="input-group-btn">
                                                                            <!-- image-preview-clear button -->
                                                                            <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                                                                <span class="glyphicon glyphicon-remove"></span> Clear
                                                                            </button>
                                                                            <!-- image-preview-input -->
                                                                            <div class="btn btn-default image-preview-input">
                                                                                <span class="glyphicon glyphicon-folder-open"></span>
                                                                                <span class="image-preview-input-title">{{trans('register.choosefile')}}</span>
                                                                                <input type="file" name="input-file-preview"/> <!-- rename it -->
                                                                            </div>
                                                                        </span>
                                                                    </div><!-- /input-group image-preview [TO HERE]--> 
                                                                    <p style="margin-top:5px;">** <a href="#">{{trans('register.clickhere')}}</a> {{trans('register.downloadimportformat')}}</p>
                                                                </div>
                                                            </div>
                                                        </div>{{-- END FILE SECTION --}}
                                                        <hr class="hrbreakline" style="margin-top:-1%;margin-left:1.5%;width:70%;">
                                                    <h4><strong>2. {{trans('register.creategroup')}}</strong></h4>
                                                </div>
                                            </div>         
                                        </form>
                                    </div> 

                                   

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>

                            </div>
                        
                        </div>
                    </div>
                <!--***************  END MODAL SECTION *************-->

                    <script type="text/javascript">
                        $('#input16').filestyle({
                            size : 'sm'
                        });
                    </script>
                    
                    <script>
                        $(document).ready(function(){
                            $('#myTable').dataTable({
                                language: {
                                    paginate: {
                                        previous: "{{trans('table.previous')}}",
                                        next: "{{trans('table.next')}}"
                                    },
                                    aria: {
                                        paginate: {
                                            previous: "Previous",
                                            next: "Next"
                                        }
                                    },
                                    "search" : "{{trans('table.search')}}:",
                                    "searchPlaceholder" : "{{trans('table.search')}}",
                                    "info" : "{{trans('table.showing')}} _START_ {{trans('table.to')}} _END_ {{trans('table.of')}} _TOTAL_ {{trans('table.entries')}}",
                                    "infoEmpty" : "{{trans('table.showing')}} 0 {{trans('table.to')}} 0 {{trans('table.of')}} 0 {{trans('table.entries')}}",
                                    "lengthMenu" : "{{trans('table.show')}} _MENU_ {{trans('table.entries')}}",
                                }
                            });
                        });
                    </script>

                    {{-- INPUT FILE SCRIPT --}}
                    <script>
                    $(document).on('click', '#close-preview', function(){ 
                            $('.image-preview').popover('hide');
                            // Hover befor close the preview    
                        });

                        $(function() {
                            // Create the close button
                            var closebtn = $('<button/>', {
                                type:"button",
                                text: 'x',
                                id: 'close-preview',
                                style: 'font-size: initial;',
                            });
                            closebtn.attr("class","close pull-right");

                            // Clear event
                            $('.image-preview-clear').click(function(){
                                $('.image-preview').attr("data-content","").popover('hide');
                                $('.image-preview-filename').val("");
                                $('.image-preview-clear').hide();
                                $('.image-preview-input input:file').val("");
                                $(".image-preview-input-title").text("Browse"); 
                            }); 
                            // Create the preview image
                            $(".image-preview-input input:file").change(function (){     
                                var img = $('<img/>', {
                                    id: 'dynamic',
                                    width:250,
                                    height:200
                                });      
                                var file = this.files[0];
                                var reader = new FileReader();
                                // Set preview image into the popover data-content
                                reader.onload = function (e) {
                                    $(".image-preview-input-title").text("Change");
                                    $(".image-preview-clear").show();
                                    $(".image-preview-filename").val(file.name);
                                }        
                                reader.readAsDataURL(file);
                            });  
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('extra_script')
    <script type="text/javascript" src="{{ asset('js/filestyle/bootstrap-filestyle.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/filestyle/bootstrap-filestyle.min.js') }}"></script>
@endsection

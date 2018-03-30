<!-- Required Javascript -->
{{--  <script src="{{asset('js/jquery-3.2.1.slim.min.js')}}"></script>  --}}
<script src="{{asset('js/treeView/bootstrap-treeview.js')}}"></script>

<div id="treeview-selectable"></div>
<div id="treeview-selectable"></div>
<script>
        function getTree() {
            // Some logic to retrieve, or generate tree structure
            var tree = [
            {
                text: "PATRON GROUP"
            }
            ];
            return tree;
          }
          
          //$('#tree').treeview({data: getTree()});
          var initSelectableTree = function() {
            return $('#treeview-selectable').treeview({
              data: getTree(),
              multiSelect: $('#chk-select-multi').is(':checked'),
              onNodeSelected: function(event, node) {
                //$('#selectable-output').prepend('<p>' + node.text + ' was selected</p>');
                console.log(node.text);
                },
              onNodeUnselected: function (event, node) {
                $('#selectable-output').prepend('<p>' + node.text + ' was unselected</p>');
              }
            });
          };
          var $selectableTree = initSelectableTree();
</script>
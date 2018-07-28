/**
 * Created by Akash on 6/18/2016.
 */
$(document).ready(function() {
    $('#dataTables-example').DataTable({
        responsive: true
    });
    $( "#tabs" ).tabs({
        collapsible: true
    });
    $("#tree").jstree({
        "checkbox": {
            "keep_selected_style": true
        },
        "plugins": ["checkbox"]
    });

    $('li[data-checkstate="checked"]').each(function() {
        $("#tree").jstree('check_node', $(this));
    });
    $("#tree").bind("changed.jstree",
        function (e, data) {
            var cat=$("#category_name").val();
            if(data.action=='deselect_node'){
                var cat_val='';
                $("#tree").find('li').each(function() {
                    if($(this).find('.jstree-clicked').length >0){
                        cat_val +=$(this).attr('category')+',';
                    }
                });
                $("#category_name").val(cat_val);
            }else{
                var cat_val='';
                $("#tree").find('li').each(function() {
                    console.log($(this).find('.jstree-clicked').length >0);
                    if($(this).find('.jstree-clicked').length >0){
                        cat_val +=$(this).attr('category')+',';
                    }
                });
                console.log(cat_val);
                $("#category_name").val(cat_val);
            }


        });
});

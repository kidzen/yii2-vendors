
$(function () {
    $('#deleteAll').click(function () {
        var keys = $("#entry-inventory").yiiGridView("getSelectedRows").length;
        if (keys > 0) {
            if (confirm('are you sure?')) {
                $.post(
                        "index.php?r=entry/delete-multiple",
                        {
                            pk: $('#entry-inventory').yiiGridView('getSelectedRows')
                        },
                        function () {
                            $.pjax.reload({container: '#entry-inventory'});
                        }
                );
            }
        } else {
            alert("No rows selected for download.");
        }

    });

    $('#createBulkButton').click(function () {
        $.get(
                "index.php?r=entry/create-bulk-ajax",
                function (data) {
                    $("#modalCreateBulk").modal('show')
                            .find('#modalCreateBulkContent').html(data);
                }
        );
    });
});



/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(function () {

    var type = 'fadeInUp';
    var count = 0;
    $('.delay>li').each(function () {
        jQuery(this).addClass('animate' + count + ' ' + type);
        jQuery(this).on('animationend', function (e) {
            //jQuery(this).removeAttr('class');
        });
        count++;
    });
    var type = 'fadeInDown';
    var count1 = 0;
    $('.delay>.delay-child').each(function () {
        jQuery(this).addClass('animate' + count1 + ' ' + type);
        jQuery(this).on('animationend', function (e) {
            //jQuery(this).removeAttr('class');
        });
        count1++;
    });
//    return true;


    //    Request Form Modal
    $('.request').click(function () {
        $.get(
                "index.php?r=request/create-ajax",
                function (data) {
                    $("#modalRequest").modal('show')
                            .find('#modalRequestContent').html(data);
                }
        );
    });
    //    Entry Form Modal
    $('.entry-bulk').click(function () {
        $.get(
                "index.php?r=entry/create-bulk-ajax",
                function (data) {
                    $("#modalCreateBulk").modal('show')
                            .find('#modalCreateBulkContent').html(data);
                }
        );
    });

    //    Tutor Page Modal
    $('.tutorButton').click(function () {
        $.get(
                "index.php?r=site/tutor",
//                "site/tutor",
                function (data) {
                    $('#modalTutor').modal('show')
                            .find('#modalTutorContent')
//                            .load($(this).attr('value'));
                            .html(data);
                });
    });

    //  approval page checkbox limit
//    $('.select-on-check-all').click(function () {
//        alert();
//        var limit = 5;
//        var keySize = $("#approval-grid").yiiGridView("getSelectedRows").length;
//        var keys = $("#approval-grid").yiiGridView("getSelectedRows");
//        var checkboxes = $(':checkbox');
//        if (this.checked) {
//            // Iterate each checkbox
//            if (limit <= checkboxes.length) {
//                for (var i = 1; i < limit; i++) {
//                    checkboxes[i].checked = !checkboxes[i].checked;
//                }
//            } else {
//                checkboxes.each(function () {
//                    this.checked = !this.checked;
//                });
//            }
//        } else {
//            checkboxes.each(function () {
//                this.checked = !this.checked;
//            });
//        }
//        return false;
//    });

//    $('#approve-transaction').click(function () {
//        var keySize = $("#approval-grid").yiiGridView("getSelectedRows").length;
//        var max = 3;
//        var pk = $("#approval-grid").yiiGridView("getSelectedRows");
//        var checkboxes = $('input[type="checkbox"]');
//        var current = checkboxes.filter(':checked').length;  //**check! : included top columnn checkbox
////    var max = $("#approval-grid").val();
//        if (keySize > 0 && current <= max) {
//            $.post(
//                    "index.php?r=request/approve-transaction",
//                    {
//                        pk: $('#approval-grid').yiiGridView('getSelectedRows')
//                    },
//                    function () {
//                        $.pjax.reload({container: '#approval-grid'});
//                    }
//            );
////        alert(pk);
//        } else {
//            alert("No rows selected for download.");
//        }
//        return false;
//
//    });

    $('.view-button').click(function () {
        $('#modalView').modal('show')
                .find('#modalViewContent')
//                .load($(this).attr('href'));
                .load($(this).attr('value'));
//                .html(data);
    });


//    $('#deleteAll').click(function () {
//        var keys = $("#entry-inventory").yiiGridView("getSelectedRows").length;
//        if (keys > 0) {
//            if (confirm('are you sure?')) {
//                $.post(
//                        "index.php?r=entry/delete-multiple",
//                        {
//                            pk: $('#entry-inventory').yiiGridView('getSelectedRows')
//                        },
//                        function () {
//                            $.pjax.reload({container: '#entry-inventory'});
//                        }
//                );
//            }
//        } else {
//            alert("No rows selected for download.");
//        }
//
//    });



////    Entry Bulk Page
//    $('#createBulkButton').click(function () {
//        $.get(
//                "index.php?r=entry/create-bulk",
//                function (data) {
//                    $("#modalCreateBulk").modal('show')
//                            .find('#modalCreateBulkContent').html(data);
//                }
//        );
//    });

//    $('#gs1').change(function () {
//        var gsId = $(this).val();
//        alert(gsId);
//    });

//    $('#infoButton').click(function () {
//        $('#info').modal('show')
//                .find('#infoContent')
//                .load($(this).attr('value'));
//    });








});
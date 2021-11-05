"use strict";

$(document).ready(function () {

    // ------------- Vista perfil ----------------- 
    $("#edit-cancel").on("click", function () {
        var c = $("#edit-btn").find("i");
        c.removeClass("icofont-close");
        c.addClass("icofont-ui-edit");
        $(".view-info").show();
        $(".edit-info").hide();
    });

    $(".edit-info").hide();

    $("#edit-btn").on("click", function () {
        var b = $(this).find("i");
        var edit_class = b.attr("class");
        if (edit_class == "icofont icofont-ui-edit") {
            b.removeClass("icofont-edit");
            b.addClass("icofont-close");
            $(".view-info").hide();
            $(".edit-info").show();
        } else {
            b.removeClass("icofont-close");
            b.addClass("icofont-ui-edit");
            $(".view-info").show();
            $(".edit-info").hide();
        }
    });
    // ------------- Vista perfil ----------------

   

});
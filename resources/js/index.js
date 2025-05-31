function initDtClient(tableName) {
    if (window.jQuery) {
        console.log("jQuery is loaded");
    } else {
        location.reload();
    }

    $(document).ready(function () {
        let table = $("#" + tableName).DataTable({
            // autoWidth: true,
            processing: true,
            serverSide: false,
            deferRender: true,
            pageLength: 25,
            lengthMenu: [10, 25, 50, 100],
            scrollY: 350,
            // scrollX: true,
            order: [[0, "asc"]],
            rowCallback: function (row, data) {
                $(row).find("td").css({
                    padding: "4px 8px",
                    "font-size": "12px",
                    "line-height": "1",
                });
            },
        });
    });
}

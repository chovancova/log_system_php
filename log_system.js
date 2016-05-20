function deleteLog(logId) {
    if (window.confirm("Are you sure?")) {

        $.ajax({
                url: "delete.php",
                type: "POST",
                data: {
                    delete_id: logId
                },
                dataType: "json"
            }
        ).fail(function () {
            alert("not possible.")
        }).success(function (data) {
            console.log(data);
            if (data.success) {
                alert("ok");
            }
            else {
                alert("notpossible");
            }
        });


    }
}

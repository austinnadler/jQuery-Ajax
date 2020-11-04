$(function() {   
    
    let incId = $("#incId").val();

    $.get('../incidents/selectIncident.php', { id: incId }, function(response) {
        let rows = JSON.parse(response);
        inc = rows[0];
        if(rows.length != 1) { alert('Number of rows fetched != 1.'); }
        else {
            $("#incNumber").text(inc.number);
            $("#desc").val(inc.short_desc);
            $("#opened").val(inc.opened);
            $("#resolved").val(inc.resolved);
            $("#priority").val(inc.priority);
            $("#state").val(inc.state);
            $("#resolution").val(inc.resolution);

            console.log($("#incNumber").text());
            console.log($("#desc").val());
            console.log($("#opened").val());
            console.log($("#resolved").val());
            console.log($("#priority").val());
            console.log($("#state").val());
            console.log($("#resolution").val());
        }
    });

    $("#btnSubmit").on('click', function() {
        $.post('../incidents/updateIncident.php', { id: incId,
                                                    short_desc: inc.short_desc,
                                                    opened: inc.opened,
                                                    resolved: inc.resolved,
                                                    priority: inc.priority,
                                                    state: inc.state,
                                                    resolution: inc.resolution },
        function(response) {
            alert(response);
            if(response === 'success') {
                window.location.href = `../index.php?from=update&id=${incId}`;
            } else {

            }
        });
    });
});
// window.location.href = "../index.php"; 
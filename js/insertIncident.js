$(function() {
    $("#btnSubmit").on('click', function() {
        let urlParams = $("#incidentForm").serialize();
        $.post('../incidents/insertIncident.php', urlParams, function(response) {
            if(response == 'success') { window.location.href = "../index.php"; }
            else                      { alert(response); }
        });
    });
});
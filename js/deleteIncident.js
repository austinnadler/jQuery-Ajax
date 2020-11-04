$(function() {
    $(document).on('click', '[id^=delete]', function() {
        let id = this.id;
        let p_id = '';
        for(let i = 6; i < id.length; i++) { //.splice doesn't like the id so this is good to remove 'delete' from the incident id
            p_id += id[i];
        }
        // prompt('Are you sure you want to delete INC' + p_id.padStart(7, '0'));
        // alert(p_id);
        $.post('incidents/deleteIncident.php', { id: p_id }, function(response) {
            if(response === "success") { $("#" + p_id).remove(); }
            else                       { alert(response); }
             // Assuming ajax was successful
        });
    });
});
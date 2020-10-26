$(function() {
    // Wait for the entire page to load, then send get
    $.get('incidents/getIncidents.php', function(response) {
        let rows = JSON.parse(response);
        let incidents = $("#incidents-list");
        rows.forEach(function(i) {          
            let tr = ` 
                    <tr id="${i.id}">
                        <td>${i.number}</td>
                        <td>${i.short_desc}</td>
                        <td>${i.priority}</td>
                        <td>${i.state}</td>
                        <td>${i.opened}</td>
                        <td>${i.resolved}</td>
                        <td>${i.resolution}</td>
                        <td>
                            <a id="edit${i.id}" class="w3-button"><i class="fa fa-pencil"></i></a>
                            <a id="delete${i.id}" class="w3-button"><i class="fa fa-trash w3-text-red"></i></a>
                        </td>
                    </tr>
                    `;
            incidents.append(tr);
        });        
    });

    $("#btnSubmit").on('click', function() {
        let urlParams = $("#incidentForm").serialize();
        $.post('../incidents/postIncident.php', urlParams, function(response) {
            if(response == 'success') { window.location = "../index.php"; }
            else                      { alert('POST (INSERT) operation failed in incidents.js'); }
        });
    });
    
    // Selectors for dynamically created elements created by $.get()

    $(document).on('click', '[id^=edit]', function() {
        alert(this.id);
    });

    $(document).on('click', '[id^=delete]', function() {
        let id = this.id;
        let p_id = '';
        for(let i = 6; i < id.length; i++) { //.splice doesn't like the id so this is good to remove 'delete' from the incident id
            p_id += id[i];
        }
        // prompt('Are you sure you want to delete INC' + p_id.padStart(7, '0'));
        // alert(p_id);
        $.post('incidents/deleteIncident.php', { id: p_id }, function(response) {
            $("#" + p_id).remove(); // Assuming ajax was successful
        });
    });
});
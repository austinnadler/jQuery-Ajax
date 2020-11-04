$(function() {
    // Wait for the entire page to load, then send get
    $.get('incidents/selectAllIncidents.php', function(response) {
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

    // When one of the edit buttons is clicked, get the incident id from the element id and redirect to formEditIncident.php with the id as a url param.
    $(document).on('click', '[id^=edit]', function() {
        let id = this.id;
        let p_id = '';
        for(let i = 4; i < id.length; i++) {
            p_id += id[i];
        }
        window.location.href = `pages/formEditIncident.php?id=${p_id}`;
    });
});
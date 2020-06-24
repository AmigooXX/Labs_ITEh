$( document ).ready(function() {
    $('#nurse').on('change', function () {
        $.ajax({
            type: "POST",
            url: "handler.php",
            data: {
                id_nurse: $(this).val(),
                action: 'ward'
            },
            success: function( data ){
                var obj = $.parseJSON(data);
                var x = '   <table id="info-table">\n' +
                    '        <tr>\n' +
                    '            <th>Ward Name</th>\n' +
                    '        </tr>\n';
                for (i in obj) {
                    x += '        <tr>\n' +
                         '            <th>'+obj[i]+'</th>\n' +
                         '        </tr>\n';
                }
                x += '</table>';
                $( "#info-table" ).remove();
                $('#first').append(x);
            },
        });
    })

    $('#department').on('change', function () {
        $.ajax({
            type: "POST",
            url: "handler.php",
            data: {
                department: $(this).val(),
                action: 'department'
            },
            success: function( data ){
                var obj = $.parseJSON(data);
                var x = '   <table id="info-table">\n' +
                    '        <tr>\n' +
                    '            <th>Department Name</th>\n' +
                    '        </tr>\n';
                for (i in obj) {
                    x += '        <tr>\n' +
                        '            <th>'+obj[i]+'</th>\n' +
                        '        </tr>\n';
                }
                x += '</table>';
                $( "#info-table" ).remove();
                $('#first').append(x);
            },
        });
    })

    $('#shift').on('change', function () {
        $.ajax({
            type: "POST",
            url: "handler.php",
            data: {
                shift: $(this).val(),
                action: 'shift'
            },
            success: function( data ){
                var obj = $.parseJSON(data);
                var x = '   <table id="info-table">\n' +
                    '        <tr>\n' +
                    '            <th>Nurse name</th>\n' +
                    '            <th>Ward</th>\n' +
                    '            <th>Date</th>\n' +
                    '        </tr>\n';
                for (i in obj) {
                    x += '        <tr>\n' +
                        '            <th>'+obj[i][0]+'</th>\n' +
                        '            <th>'+obj[i][1]+'</th>\n' +
                        '            <th>'+obj[i][2]+'</th>\n' +
                        '        </tr>\n';
                }
                x += '</table>';
                $( "#info-table" ).remove();
                $('#first').append(x);
            },
        });
    })
});
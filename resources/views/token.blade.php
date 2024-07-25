<!DOCTYPE html>
<html>
<head>
    <title>Access Token and Ticket Custom Fields</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1>Access Token</h1>
    <pre id="access-token">Loading...</pre>

    <h1>Ticket Custom Fields</h1>
    <pre id="ticket-custom-fields">Loading...</pre>

    <script type="text/javascript">
        $(document).ready(function() {
            // Fetch access token
            $.ajax({
                url: '/get-token', // Endpoint to get token
                method: 'GET',
                success: function(data) {
                    if (data.httpCode === 200) {
                        $('#access-token').text(data.accessToken);
                        
                        // Fetch ticket custom fields using the obtained access token
                        $.ajax({
                            url: '/ticket-custom-fields', // Endpoint to get ticket custom fields
                            method: 'GET',
                            headers: {
                                'Authorization': 'Bearer ' + data.accessToken
                            },
                            success: function(data) {
                                if (data.httpCode === 200) {
                                    $('#ticket-custom-fields').text(JSON.stringify(data.response, null, 4));
                                } else {
                                    $('#ticket-custom-fields').text('Failed to get ticket custom fields, HTTP Code: ' + data.httpCode);
                                }
                            },
                            error: function(xhr, status, error) {
                                $('#ticket-custom-fields').text('An error occurred while fetching ticket custom fields: ' + error);
                            }
                        });
                    } else {
                        $('#access-token').text('Failed to get token, HTTP Code: ' + data.httpCode);
                    }
                },
                error: function(xhr, status, error) {
                    $('#access-token').text('An error occurred: ' + error);
                }
            });
        });
    </script>
</body>
</html>

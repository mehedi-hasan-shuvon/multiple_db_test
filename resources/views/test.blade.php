<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container my-3">
        <h1 class="text-center">Database Testing</h1>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <select id="databaseSelect" class="form-select" aria-label="Select database">
					<option value="" selected>Select</option>
                    @foreach ($databases as $database)
                        <option>{{ $database }}</option>
                    @endforeach
                </select>
            </div>

			<div class="col-md-6">
                <button id="showData" class="btn btn-primary">Show Data</button>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#databaseSelect').change(function() {
                var selectedDatabase = $(this).val();
                if (selectedDatabase) {
                    $.ajax({
                        url: '/select-database',
                        type: 'POST',
                        data: {database: selectedDatabase},
                        success: function(response) {
                            console.log(response);
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                        }
                    });
                }
            });




			$('#showData').click(function() {

                    $.ajax({
                        url: '/show-data',
                        type: 'GET',
                        success: function(response) {
                            console.log(response);
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                        }
                    });
                
            });
        });
    </script>


</body>
</html>

<?php
if (array_key_exists('Error', $data['response'])) {
    echo $data['response']['Error'];
}else{
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script>
            $(function () {
                $("#tabs").tabs();
            });
        </script>
    </head>
    <body>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>Hello there user <?php echo $data['response']['id'] ?></h1>
                <hr>
                <div id="tabs">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item"><a class="nav-link active" id="home-tab" data-toggle="tab" role="tab" aria-controls="home" aria-selected="true" href="#tabs-1">Upload</a></li>
                        <li class="nav-item"><a class="nav-link active" id="home-tab" data-toggle="tab" role="tab" aria-controls="home" aria-selected="true" href="#tabs-2">Api</a></li>
                    </ul>
                    <br><br>
                    <div id="tabs-1">
                        <form id="uploadForm" method="post" enctype="multipart/form-data">
                            <input id="uploadImage" type="file" accept="application/3gpp-ims+xml" name="xml" required/>
                            <br><br>
                            <input class="btn btn-success" type="submit" value="Upload">
                        </form>
                        <hr>
                    </div>
                    <div id="tabs-2">
                        <div class="input-group mb-3">
                            <form id="apiForm">
                                <div class="form-group">
                                    <label for="productCode">Code</label>
                                    <input type="text" class="form-control" id="productCode" aria-describedby="productCode" required>
                                    <small id="productCode" class="form-text text-muted">Input the product code.</small>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>

    <script type="text/javascript">
        $("#uploadForm").on('submit', (function (e) {
            e.preventDefault();
            $.ajax({
                url: 'http://localhost:8000/file/upload',
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                dataType: 'json',
                success: function (data) {
                    debugger;
                    if (data['success'] === true) {
                        alert(data['items']);
                        $("#uploadForm")[0].reset();
                    }
                },
                error: function (e) {
                    alert(e);
                }
            });
        }));
    </script>
    </html>
<?php
}
?>

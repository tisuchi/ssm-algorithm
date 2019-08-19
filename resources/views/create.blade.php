<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SSM Algorithm</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

    <div class="container">
        <div class="row mt-5 pt-5">
            <div class="col-sm-3"></div>
            <div class="col-sm-5">
                <h3>Try SSM Algorithm</h3>

                <hr>
                <form action="/add" method="POST">
                    @CSRF

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Write Message</label>
                        <textarea name="message" class="form-control" id="exampleFormControlTextarea1" rows="2"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Check Now</button>
                </form>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>

</body>
</html>
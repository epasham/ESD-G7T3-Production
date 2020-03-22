<!DOCTYPE HTML>
<html>
    <head>
        <title>Customer Homepage</title>
        <meta charset="UTF-8">
        <!-- Bootstrap libraries -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Latest compiled and minified CSS -->
        <link 
            rel="stylesheet" 
            href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
            integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" 
            crossorigin="anonymous">

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <script 
            src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" 
            integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
            crossorigin="anonymous">
        </script>

        <script
            src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
            integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
            crossorigin="anonymous">
        </script>
    </head>
    <!--
    <style>
        body {Form
              padding: 10px;
        }    
    </style>
    -->
    <body>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">
                <img src="../../app/Paws-logo.png" width="140" height="60" alt="Paws">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link active" href="../../app/index.html">Home <span class="sr-only">(current)</span></a>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Booking
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="../booking/createBooking.html">Create booking</a>
                            <a class="dropdown-item" href="../booking/updateBooking.html">Update booking</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Service Providers
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="../microservices/serviceprovider/createServiceProvider.html">Create Service Provider</a>
                            <a class="dropdown-item" href="../microservices/serviceprovider/updateServiceProvider.html">Update Service Provider</a>
                        </div>
                    </li>
                    <a class="nav-item nav-link" href="../microservices/review/createReview.html">Reviews</a>

                </div>
            </div>
        </nav>
        <br>
        <h1 class="display-4 text-center">Customer Registration</h1>
        <br/>
        <div id="main-container" class="container" style = "width: 80%;">
            <table id="service_table" class='table table-striped' border='1'>
                <thead class='thead-dark'>
                    <tr>
                        <th>Service Provider</th>
                        <th>Contact Number</th>
                        <th colspan="3">Services Provided</th>
                        <th>Price</th>
                    </tr>
                <thead class='thead-dark'>
            </table>
            <a id="addReviewBtn" class="btn btn-primary" href="add-serviceprovider.html">Add Provider</a>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <footer class="page-footer font-small" style = "background-color: #007bff;">

            <!-- Copyright -->
            <div class="footer-copyright text-center py-3" style = "color: white;">© 2020 Copyright:
                ESD G7T3
            </div>
            <!-- Copyright -->

        </footer>

        <script>
            $('#customer_table').hide();
            function showError(message) {
                // Hide the table and button in the event of error
                $('#customer_table').hide();
                $('#addCustomerBtn').hide();

                // Display an error under the main container
                $('#main-container').append("<label class='errormsg'>" + message + "</label>");
            }

            check = [];

            //$("#submit").click(function () {
            $("#addCustomerBtn").click(function () {
                $(async () => {
                    var customer_name = $('#customer_name').val();
                    var customer_mobile = $('#customer_mobile').val();
                    var customer_address = $('#customer_address').val();

                    var serviceURL = "http://localhost:1000/customer/" + customer_mobile;
                    console.log(serviceURL)
                    // console.log(customer_name)
                    // console.log(customer_mobile)
                    // console.log(customer_address)

                    try {
                        const response =
                                await fetch(
                                        serviceURL, {
                                            method: 'POST',
                                            headers: {"Content-Type": "application/json"},
                                            body: JSON.stringify({customer_name: customer_name, customer_address: customer_address})
                                        });
                        console.log(response)
                        const data = await response.json();
                        alert("Sucessfully Registered for account")
                    } catch (error) {
                        $('.errormsg').remove();
                        // Errors when calling the service; such as network error, 
                        // service offline, etc
                        showError('There is a problem retrieving customer data, please try again later.<br>' + error);
                    } // error
                });
            })
        </script>
    </body>
</html>
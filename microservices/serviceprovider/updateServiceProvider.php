<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width">

        <title>Update Service Provider</title>

        <link rel="stylesheet" href="">
        <!--[if lt IE 9]>
          <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <!-- Bootstrap libraries -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    </head>

    <body>
        <div id="main-container" class="container">
            <h1 class="display-4" style = "padding-left: 10%;">Update Service Provider</h1>
            <p>
                <a class="btn btn-outline-info" href="../booking/booking.php">Bookings</a>
                <a class='btn btn-outline-info' href='../customer/customer.php'>Customers</a> 
                <a class='btn btn-outline-info' href='../serviceprovider/serviceprovider.php'>Service Providers</a>
                <a class='btn btn-outline-info' href='../review/review.php'>Reviews</a>
            </p>
            <form id='updateServiceProviderForm' method="post">
                Service Provider: <br><input type="text" id="serviceProv"> <br> Contact Number: <br><input type="text" id="contactNum"> <br> Services Provided1: <br><input type="text" id="services1"> <br> Services Provided2: <br><input type="text" id="services2">            <br> Services Provided3: <br><input type="text" id="services3"> <br> Price: <br><input type="text" id="pricing"> <br> <br>
                <button id="updateServiceProviderBtn" type="button" class='btn btn-primary'>Update Service Provider</button>
            </form>
            <!-- <button id="submitBtn" type="button" class='btn btn-primary'>Search</button> -->
            <!--Placed here also can-->

            <table id="serviceProviderTable" class='table table-striped' border='1'>
                <thead class='thead-dark'>
                    <tr>
                        <th>Serice Provider</th>
                        <th>Contact Number 13</th>
                        <th colspan="3">Services Provided</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <!-- <tbody> -->
                <!-- </tbody> -->
            </table>
            <!-- <a id="addBookBtn" class="btn btn-primary" href="add-book.html">Add a book</a> -->
        </div>

        <footer class="page-footer font-small" style = "background-color: #007bff">

            <!-- Copyright -->
            <div class="footer-copyright text-center py-3" style = "color: white;">© 2020 Copyright:
            ESD G7T3
            </div>
            <!-- Copyright -->
        
        </footer>

        <script>
            $('#serviceProviderTable').hide();

            function showError(message) {
                // Hide the table and button in the event of error
                $('#serviceProviderTable').hide();
                $('#updateServiceProviderBtn').hide();

                // Display an error under the main container
                $('#main-container')
                        .append("<label class='errormsg'>" + message + "</label>");
            }

            check = [];

            //$("#submit").click(function () {
            $("#updateServiceProviderBtn").click(function () {
                $(async() => {
                    var serviceProvider = $('#serviceProv').val();
                    var contactNumber = $('#contactNum').val();
                    var serviceProvided1 = $('#services1').val();
                    var serviceProvided2 = $('#services2').val();
                    var serviceProvided3 = $('#services3').val();
                    var price = $('#pricing').val();

                    var serviceURL = "http://localhost:1001/serviceprovider/update" + "/" + contactNumber;
                    console.log(serviceURL)

                    try {
                        const response =
                                await fetch(
                                        serviceURL, {
                                            method: 'POST',
                                            headers: {
                                                "Content-Type": "application/json"
                                            },
                                            body: JSON.stringify({
                                                provider_name: serviceProvider,
                                                provider_service1: serviceProvided1,
                                                provider_service2: serviceProvided2,
                                                provider_service3: serviceProvided3,
                                                provider_price: price
                                            })
                                        });

                        console.log(response)
                        const data = await response.json();

                        //var books = data; //the arr is in v.books of the JSON data
                        // array or array.length are falsy
                        //console.log(books);
                        //console.log(books.message);
                        //if(books.message != undefined) {
                        //    $('.errormsg').remove(); 
                        //    $('#booksTable').hide();
                        //    showError('Books list empty or undefined.');
                        //}


                    } catch (error) {
                        $('.errormsg').remove();
                        // Errors when calling the service; such as network error, 
                        // service offline, etc
                        showError('There is a problem retrieving Service Provider data, please try again later.<br />' + error);

                    } // error

                });

            })
        </script>
    </body>

</html>
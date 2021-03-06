<!DOCTYPE HTML>
<html>
    <head>
        <title>Customers</title>
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
        <?php include("../../app/globalCustomerHeader.php") ?>
        <h1 class="display-4" style = "padding-left: 10%;">Update Customer</h1>
        <div id="main-container" class="container">
            <form id='updateCustomerForm' method="POST">
                Customer Full Name: <br><input type="text" id="customer_name" size="45"> <br>
                Mobile Number: <br><input type="text" id="customer_mobile" size="45"> <br>
                Address: <br><input type="text" id="customer_address" size="45"> <br>
                <br>
                <button id="updateCustomerBtn" type="button" class='btn btn-primary'>Update Customer</button>
            </form>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <footer class="page-footer font-small" style = "background-color: #007bff">
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
                $('#updateCustomerBtn').hide();

                // Display an error under the main container
                $('#main-container').append("<label class='errormsg'>" + message + "</label>");
            }

            check = [];

            //$("#submit").click(function () {
            $("#updateCustomerBtn").click(function () {
                $(async () => {
                    var customer_name = $('#customer_name').val();
                    var customer_mobile = $('#customer_mobile').val();
                    var customer_address = $('#customer_address').val();

                    var serviceURL = "http://localhost:1000/customer_amqp/" + customer_mobile;
                    console.log(serviceURL);
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

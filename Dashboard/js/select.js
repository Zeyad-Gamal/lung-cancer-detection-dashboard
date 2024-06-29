$(document).ready(function () {
    // Define a function to make the AJAX request
    function fetchData() {
        $.ajax({
            url: 'process.php',
            type: 'POST',
            data: {
                action: 'selectusersdata'
            },
            success: function (response) {
                $('#nav-up-data').html(response);
            }
        });
    }
    
    
    
        // Define a function to make the AJAX request
    function patientsdata() {
        $.ajax({
            url: 'process.php',
            type: 'POST',
            data: {
                action: 'selectdetectionsdata'
            },
            success: function (response) {
                $('#selectdetectionsData').html(response);
            }
        });
    }

    // Call the fetchData function initially
    fetchData();
    patientsdata();

    // Set interval to refresh the data every 5 seconds
    setInterval(fetchData, 5000);

    // setInterval(patientsdata, 4000);
});




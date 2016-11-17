@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>

                <div id="results">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script src="https://code.jquery.com/jquery-1.12.4.min.js"
        integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $.ajax({
            type: "GET",
            url: "api/v2/user/2", //single user
            //url: "api/v2/user/", // All users
            dataType: "Json",
            // Work with the response
            success: function(data) {
                var someObjStr = JSON.stringify(data);
                console.log( someObjStr);
                // alert(data.length);

                if($.isArray(data)) {
                    //alert("a is an array!");
                    //var JSONString = ' {"id":1,"name":"Mr. Odell Johnston","email":"kling.elouise@example.org","api_token":"Mc9IVKYAMeIqUDe8qfsqwLaFVjZEokZsTYVhI7Rf3ez4y2FfPFRfVk7XtMDD","created_at":"2016-11-15 14:25:57","updated_at":"2016-11-15 14:25:57"},{"id":2,"name":"Dr. Providenci Dietrich","email":"oliver82@example.net","api_token":"orja3jcr56uX5QlRUpsinULRPjUy7njIqPUq4VdtaKrAANdv8UFJbguIWDyy","created_at":"2016-11-15 14:25:57","updated_at":"2016-11-15 14:25:57"}]';
                    var JSONString = someObjStr;

                    var JSONObject = JSON.parse(JSONString);
                    // console.log(JSONObject[0]["name"]);      // Dump all data of the Object in the console
                    //alert(JSONObject[0]["name"]); // Access Object data

                    var html_sr='<ul>';
                    for (i = 0; i < data.length; i++) {
                        html_sr += JSONObject[i]["name"] + "<br>";
                    }
                    html_sr +='</ul>';

                } else {
                    //alert("a is not an array!");
                    var html_sr='<ul>';
                    $.each( data, function( key, value ) {
                        //alert( key + ": " + value );
                        html_sr +=  key + ": " + value + "<br>";
                    });
                    html_sr +='</ul>';

                }
                $("#results").html(html_sr);

            }
        });
    });
</script>
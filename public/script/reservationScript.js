$(document).ready(function(){
    $("#datepicker").change(function(){

        var dateCheck = $(this).val();
        // alert(dateCheck);

        //console.log(dateCheck);

        if(dateCheck != ''){
            $.ajax({
                url: '/reservation',
                method: "POST",
                data: {dateCheck:dateCheck},

                success: function(data){
                    $("#sucessMessage").html(data);
                }
            });        
        } else {
            //$("#infoReservation").css("display", "none");
        }
    });
});
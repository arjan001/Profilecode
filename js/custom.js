
    $("#loginfrm").submit(function(e){
      e.preventDefault();
       $("#status").html("<p class='alert alert-success'><i class='fas fa-spinner fa-pulse'></i> Logging in...</p>");
       $.ajax({
         method: "POST",
         url : "app/vendorlogin",
         data: new FormData(this),
         contentType: false,
         processData: false,
         cache: false
       }).done(function (data){
        if(data.status == 200){
         window.location.replace("vendors/");
        }
        if(data.status == 300){
         $("#status").html("<p class='alert alert-danger'><i class='fas fa-exclamation-circle'></i> Login invalid. Wrong email or password.</p>");
        }
       });
      
    });
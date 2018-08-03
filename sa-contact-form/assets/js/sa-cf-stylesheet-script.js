jQuery( document ).on( "click", ".sa-cf-btn", function() {
    //getting the values of the form in the two veriables
    var eml = document.getElementById("sa_cf_email").value;
    var nme = document.getElementById("sa_cf_name").value;
    
    //checking wether the name field is empty or not
    if(nme == "")
    {
        //showing error message
        document.getElementById("show_resp").innerHTML = "Please Enter Your name";
        //changing the text color of the error message to red
        document.getElementById("show_resp").style.color = "red";
        //changing the border color of the name field to show error in the field
        document.getElementById("sa_cf_name").style.border = "1px red solid";
        return false; // preventing the form from submitting if the values are not set
    }

    //checking email field is empty or not
    if(eml == "")
    {
        //showing error message
        document.getElementById("show_resp").innerHTML = "Please Enter Your Email";
        //changing the text color of the error message to red
        document.getElementById("sa_cf_email").style.color = "red";
        //changing the border color of the name field to show error in the field
        document.getElementById("sa_cf_email").style.border = "1px red solid";
        return false; // preventing the form from submitting if the values are not set
    }

    //displaying the loading text if all the values are entered correctly
    document.getElementById("loading_img").style.display = "block";

    // setting the url to send form data to the file to add it into the database
    var plugin_url = "http://localhost/sarang/wordpress/wp-content/plugins/sa-contact-form/classes/class-add-data-to-db.php";
    jQuery.ajax({
        url : plugin_url,
        type : "post",
        data : {
            sa_cf_name : nme, //name field is assined to the variable to send
            sa_cf_email : eml //email value is assigned to the variable to send
        },
        success : function( response ) {
            //alert(response);
            //displaying the message came from the database file. wether it is successful or not.
            jQuery("#show_resp").html( response );
            //reseting the form after successful submition
            document.getElementById("sa-cf-form").reset();
            //changint the border or the name & email field after successful submition of the form
            document.getElementById("sa_cf_name").style.border = "1px solid #bbb";
            document.getElementById("sa_cf_email").style.border = "1px solid #bbb";
            //changing the color of the success message to green
            document.getElementById("show_resp").style.color = "green";
            //hiding the loading text after successful form submition
            document.getElementById("loading_img").style.display = "none";
        }
    });

    return false;
});
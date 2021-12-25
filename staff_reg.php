<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JEC Diamond Jubilee</title>
    <link rel="stylesheet" href="css/st.css">
   
</head>

<body>

   

    <?php include('nav.php'); ?>

    <main>
        <div id="myModal" class="modal">
            <div class="modal-content">

                <form action="staff_reg1.php" method="POST">

                     <div class="row">
                        <label>Phone</label>
                        <input type="number" minlength="10" maxlength="10" name="phone" id="phone" placeholder="Phone" onkeyup="GetDetail(this.value)">
                    </div>

                    

                    <div class="row">
                        <label>Name</label>
                        <input type="text" name="name" id="name" placeholder="Name" required>
                    </div>
                  




                    <div class="row">
                        <label>Contribution</label>
                        <input type="text" name="contribution" id="contribution" placeholder="Contribution" required>
                        <input type="hidden" name="add_contribution" id="contribution" placeholder="Contribution" value="0">

                    </div>

                    <!-- <div class="row">
                        <label for="">Additional Contribution</label>
                        <input type="number" min="0" name="add_contribution" id="add_contribution" placeholder="Additional Contribution">
                    </div> -->

                    

                    <div class="row">
                        <label for="">Coupon</label>
                        <input type="number" name="coupon" id="coupon" >
                    </div>

                    <div class="row">
                        <input type="submit" class="createAc" value="Submit" onclick="confirm1()">
                    </div>
                </form>

            </div>
        </div>


    </main>

    <script>
        function confirm1() {
            var iframe = document.createElement("IFRAME");
            iframe.setAttribute("src", 'data:text/plain,');
            document.documentElement.appendChild(iframe);
            if (window.frames[0].window.confirm("Are you sure?")) {
                // what to do if answer "YES"
            } else {
                // what to do if answer "NO"
            }
        }
    </script>


    <script>
        function GetDetail(str) {
            input_name = document.getElementById("name");
            input_email = document.getElementById("email");
            input_branch = document.getElementById("branch");
            input_yop = document.getElementById("yop");
            input_chapter = document.getElementById("chapter");
            input_address = document.getElementById("address");
            input_contribution = document.getElementById("contribution");
            input_add_contribution = document.getElementById("add_contribution");
            input_date = document.getElementById("date");
            input_coupon = document.getElementById("coupon");

            if (str.length == 0) {



                input_name.value = "";
                input_email.value = "";
                input_branch.value = "";
                input_yop.value = "";
                input_chapter.value = "";
                input_address.value = "";
                input_contribution.value = "";
                input_add_contribution.value = "";
                input_date.value = "";
                input_coupon.value = "";
                
                return;
            } else {


                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {

                    if (this.readyState == 4 &&
                        this.status == 200) {

                        var myObj = JSON.parse(this.responseText);

                        if (myObj === null) {
                            input_name.readOnly = false;
                            input_address.readOnly = false;
                            input_email.readOnly = false;
                            input_yop.readOnly = false;
                            input_branch.disabled = false;
                            input_chapter.disabled = false;
                            input_contribution.readOnly = false;

                            input_name.value = "";
                            input_address.value = "";
                            input_email.value = "";
                            input_yop.value = "";
                            input_branch.value = "";
                            input_chapter.value = "";
                            input_contribution.value = "";
                            input_add_contribution.value = "";
                            input_date.value = "";
                            input_coupon.value = "";
                        }

                        input_name.value = myObj[0];
                        input_email.value = myObj[1];
                        input_branch.value = myObj[2];
                        input_yop.value = myObj[3];
                        input_chapter.value = myObj[4];
                        input_address.value = myObj[5];
                        input_contribution.value = myObj[6];
                        input_add_contribution.value = myObj[7];
                        input_date.value = myObj[8];
                        input_coupon.value = myObj[9];

                        
                    }


                };

                xmlhttp.open("GET", "getdetails.php?phone=" + str, true);

                xmlhttp.send();
            }
        }
    </script>


    <script src="modal-nav.js"></script>

</body>

</html>
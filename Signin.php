<?php require_once 'connectdb.php' ?>

<html lang="en">
<title>ChannalDoc.lk</title>
<link rel = "stylesheet" href="CSS/style.css">
<!--<link rel="stylesheet"
 href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->
<body >
    <a href='Index.php'>Home</a>
    <br><a href='Signin.php'>Sign in</a><br>
    <a href='Login.php'>Login</a><br>
    <br>
    <img src="Images/hospitalbanner2.jpg" id="Registration banner">
    
    <div class="RegisterForm">
        <h3>Create Account</h3>
    <br>
    <form action="Signin.php" method='POST'>
            <label for='FirstName'>First Name</label><br><Input type='text' name='FirstName' required='yes' id='FirstName'>
        <br><label for='LastName'>Last Name</label><br><Input type='text' name='LastName' required='yes' id='LastName'>
        <br><label for='NIC'>NIC</label><br><Input type='NIC' name='NIC' required='yes' id='NIC'>
        <br><label for='Email'>Email</label><br><Input type='Email' name='Email' required='yes' id='Email'>
        <br><label for='Pass'>Password</label><br><Input type='Password' name='Pass' required='yes' id='Pass'>
        <br><label for='Gender'>Gender</label><br>
        <select name='Gender' required = 'yes' id='Gender'>
         <option value= 'Male'>Male</option>
         <option value= 'Female'>Female</option></select><br>
        <br>

        <!--Radio button can be clicked and they can choose both (Error)-->
    
        <p>Type of User:</p>
  <input type="radio" id="patient" name="type">
  <label for="Patient">Patient</label><br>
  <input type="radio" id="Practitioner" name="type">
  <label for="Practitioner">Practitioner</label><br>
<br><label for='PhoneNumber'>Phone Number</label><br><Input type='PhoneNumber' name='PhoneNumber' required='yes' id='PhoneNumber'><br>
    <br>
    <input type="Submit"  name="Signin" values="Signin" >
    </form>
    </div>

    <!-- ----------------------------------------------------------------------------------------------------------------------------------- -->
  
        <div class="Files" name="Files">
            <!--Need to find the PHP code for the icon button to add the file into the system (Development Issue)-->
        <form>
        <h1>Document and Verifications (Medical Practitioners)</h1>
            <ul>
        <li><label for="medical_creti">Medical Degree/Diploma Certificate</label><input type="file" id= "medical_creti"></li>
       <br>
        <li><label for="medical_licen">Medical License</label><input type="file" id= "medical_licen"></li>
        <br>
        <li><label for="CV">CV/Resume</label><input type="file" id= "CV"></li>
        <br>
        <li><label for="medical_Intern">Medical Intership Document</label><input type="file" id= "medical_Intern" ></li>
        <br>
        <li><label for="medical_train">Medical Post-graduate Training Document</label><input type="file"  id= "medical_train"></li>
        <br>
        <li><label for="medical_specialcerti">Medical Speciality Certificate</label><input type="file" id= "medical_specialcerti"></li>
        <br>
        <li><label for="medical_degree">Medical Degree/Diploma Transcript</label><input type="file" id= "medical_degree"></li>
            </ul>
        </form>
           <!--<ul>
               <li><a href="">Medical Degree/Diploma Certificate</a> <button class="btn1"><i class="fa fa-upload" id="Medical Degree/Diploma Certificate" name="Medical Degree/Diploma Certificate""></i></button></li>
               <li><a href="">Medical License</a> <button class="btn2"><i class="fa fa-upload" id="Medical License" name="Medical License""></i></button></li>
               <li><a href="">CV/Resume</a> <button class="btn3"><i class="fa fa-upload" id="CV/Resume" name="CV/Resume""></i></button></li>
               <li><a href="">Medical Intership Document</a> <button class="btn4"><i class="fa fa-upload" id="Medical Intership Document" name="Medical Intership Document" "></i></button></li>
               <li><a href="">Medical Post-graduate Training Document</a> <button class="btn"5><i class="fa fa-upload" id="Medical Post-graduate Training Document" name="Medical Post-graduate Training Document""></i></button></li>
               <li><a href="">Medical Speciality Certificate</a> <button class="btn6"><i class="fa fa-upload" id="Medical Speciality Certificate" name="Medical Speciality Certificate""></i></button></li>
               <li><a href="">Medical Degree/Diploma Transcript</a> <button class="btn7"><i class="fa fa-upload" id="Medical Degree/Diploma Transcript" name="Medical Degree/Diploma Transcript""></i></button></li>
           </ul>-->
           <p>Note: Please upload the documents requested as PDF versions. If there is an issue with upload the document please email <a href="mailto:it@helpdeskdoc.lk">it@helpdeskdoc.lk</a>. After Verification a mail will be send to pay the verification fee (Rs.1000). </p>
   
        </div>

        <?php    

        if(isset($_POST["Signin"]) && ($conn = connect2db()))
        {
            
           try{
                $query ="INSERT INTO `users`(`First_Name`, `Last_Name`, `NIC`, `Email`, `Password`, `Gender`, `Type_of_User`, `Phone_No`, `Medical_Files`) 
                VALUES (':First Name',':Last Name',':nic',':email',':password',':gender',':Type of Users',':Phone No','')";
                $stmnt = $conn->prepare($query);

                $stmnt->bindParam(':First Name', $_POST['FirstName']);
                $stmnt->bindParam(':Last Name', $_POST['LastName']);
                $stmnt->bindParam(':nic', $_POST['NIC']);
                $stmnt->bindParam(':email', $_POST['Email']);
                $stmnt->bindParam(':gender', $_POST['Gender']);
                $stmnt->bindParam(':Type of Users', $_POST['type']);
                $stmnt->bindParam(':Phone No', $_POST['PhoneNumber']);
                //$stmnt->bindParam(':Medical_Files', $_POST['Files']);
                
                $Password=password_hash($_POST['Pass'], PASSWORD_DEFAULT);
                $stmnt->bindParam(':password', $Password);
                
                $stmnt->execute();
                echo "<br>".$_POST['FirstName']." ". $_POST['LastName'] ." is successfully Registered!";
                echo "<br>Wait..You are redirecting to the login page.";
                header("Location:Login.php");
            
            
            }
            catch(PDOException $e)
            {
               echo "Login Failed<br>";
                throw new PDOException($e->getMessage(), (int) $e->getCode());
            }
        }
          
        
        ?>

</body>
</html>
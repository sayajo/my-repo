<!DOCTYPE html>
<html>
<head>
 <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
 </script>

 <script type="text/javascript">
  function validateForm() {
   var c = confirm("Are you sure you want to send this form?");
   if (c == true) {
     return true;
   }
   return false;
 }

 </script>
</head>
<body>
 <form name="myForm" action="{{url('sms')}}" onsubmit="return validateForm()" method="post">
   {{csrf_field()}}
   Number:<input type="text" name="number" id="number" required="tr" pattern="[9][78]\d{8}(?:,[9][78]\d{8})*$" placeholder=" ENTER your Number"/><br/><br/>
   Message:<input type="text" name="message" id="message" placeholder="Enter your Message" required="true" /><br/><br/>
   <input type="reset" value = "Reset form" />
   <input type="hidden" name="status" value="Send">
  <input type="submit" name="submit" value="submit">
 <p id="demo"></p>

 </form>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<title> SMS-GATEWAY </title>
	<h2> LOGIN TO SYSTEM </h2>
	<link rel="stylesheet" type="text/css" href="https://bootswatch.com/4/sketchy/bootstrap.min.css">
</head>
<body>
<div class="container">
     <div class="flex-lg-row">
     <div class="col-md-8 col-md-offset-2">
     <div class="panel panel-default">
     
     <div class="panel-body">
<form name="" action="{{url('user')}}"  method="post">
    {{csrf_field()}}
	Name:<input type="text" name="name" id="name" placeholder="Enter your Name" /><br/><br/>
     Number:<input type="text" name="number" id="number" placeholder="Enter your Number" /><br/><br/>
    
    <input type="reset" value = "Reset form" />
    <input type="submit" value = "Submit" />
</form>
</body>
<%@ taglib prefix="form" uri="http://www.springframework.org/tags/form" %>

<html>

<head>
	
	<title>Customer confirmation </title>

</head>

	<body>
	
	The customer is confirmed: ${customer.firstName} ${customer.lastName} 
	
	<br><br>
	
	Customer Free Passes: ${customer.freePasses} 
	
	<br><br>
	
	Postal Code: ${customer.postalCode} 
	</body>

</html>
<%@ taglib prefix="form" uri="http://www.springframework.org/tags/form" %>

<html>

	<head>
	
		<title>Customer registration page</title>
		
		<style>
			.error{color:red}		
		</style>
		
	</head>
	
	<body>
	
	Fill put the form. Asterisk (*) means required.
	
	<br><br>
	
		<form:form action="processForm" modelAttribute="customer" >
		 
			<br><br>
			
			First name: <form:input type="text" path="firstName"/>
			
			<br><br>
			
			Last name: (*) <form:input type="text" path="lastName"/>
			<form:errors path="lastName" cssClass="error" />
			
			<br><br>
			
			Free Passes: <form:input type="text" path="freePasses" />
			<form:errors path="freePasses" cssClass="error" />
			
			<br><br>
			
			Postal Code: <form:input type="text" path="postalCode" />
			<form:errors path="postalCode" cssClass="error" />
			
			<br><br>
			
			<input type="Submit" value="Submit" />
		
		</form:form>
		
	</body>
</html>
<%@ taglib prefix="form" uri="http://www.springframework.org/tags/form" %>

<!-- this makes possible the usage of form:form tags  -->

<!DOCTYPE html>
<html>
	<head>
	
		<title>Student Registration Page</title>
		
		<style>
			.error{color: red}
		</style>
		
	</head>

     <body>
     
     <form:form action="processForm" modelAttribute="student">
     
     	First Name: <form:input path="firstName"/> <!--thats the actual property name from the Student class  -->
     				<form:errors path="lastName" cssClass="error" />
     	<br><br>
     
     	Last Name: <form:input path="lastName" /> <!--thats the actual property name from the Student class  -->
     				<form:errors path="lastName" cssClass="error" />
     	<br><br>
     	
     	<!--  this text was hardcoded, so it only uses as an example
     	
     	Country: <form:select path="country">
     			
     				<form:option value="Brazil" label="Brazil"/>
     				<form:option value="France" label="France"/>
     				<form:option value="Germany" label="Germany"/>
     				<form:option value="India" label="India"/>
     				<form:option value="Swizerland" label="Swizerland"/>
     	
     			</form:select>
     			
     -->
     
     	Country: <form:select path="country">
     				
     					<form:options items="${student.countryOptions}"/>
     					
     			</form:select>
     			
     	<br><br>
     	
     	Favourite language: 
     	
     	Java   <form:radiobutton path="favouriteLanguage" value="Java"/>
     	C#     <form:radiobutton path="favouriteLanguage" value="C#"/>	
     	PHP    <form:radiobutton path="favouriteLanguage" value="PHP"/>
     	Ruby   <form:radiobutton path="favouriteLanguage" value="Ruby"/>
     	Phyton <form:radiobutton path="favouriteLanguage" value="Phyton"/>	
     	
     	<br><br>
     
     	Operating Systems:
     	
     	Linux             <form:checkbox path="operatingSystems" value="Linux"/>
     	Mac OS            <form:checkbox path="operatingSystems" value="Mac OS"/>
     	Microsoft Windows <form:checkbox path="operatingSystems" value="Microsoft Windows"/>
     	
     	
     <!-- The real important thing here is that Spring MVC will call theStudent.getFirstName() 
     	and theStudent.getLastName() methods and later it will do the bindings -->
     
     
      <!-- When pressing the Submit button, Spring MVC will call theStudent.setFirstName() 
      and theStudent.setLastName() -->
     
     	<input type="submit" value="Submit"/>
     
     </form:form>
     
     </body>
</html>
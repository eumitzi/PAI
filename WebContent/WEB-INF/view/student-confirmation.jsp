<%@ taglib uri = "http://java.sun.com/jsp/jstl/core" prefix = "c" %>

<!DOCTYPE html>
<html>
	<head>
	
		<title> Student Confirmation Page</title>
		
	</head>

     <body>
     
		The student is confirmed: ${student.getFirstName()} ${student.getLastName()} 
		
		<br><br>
		
		Country: ${student.getCountry()} 
		
		<br><br>
		
		Favourite Language: ${student.getFavouriteLanguage()} 
		
		<br><br>
		
		Operating Systems:
		
		<ul>
			<c:forEach var="temp" items="${student.operatingSystems}">
			<li>${temp} </li>
			</c:forEach>
		</ul>		
     </body>
</html>
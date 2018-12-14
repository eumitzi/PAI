package com.luv2code.springdemo.mvc;

import javax.validation.Valid;

import org.springframework.beans.propertyeditors.StringTrimmerEditor;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.validation.BindingResult;
import org.springframework.web.bind.WebDataBinder;
import org.springframework.web.bind.annotation.InitBinder;
import org.springframework.web.bind.annotation.ModelAttribute;
import org.springframework.web.bind.annotation.RequestMapping;

@Controller
@RequestMapping("/student")
public class StudentController {
	
	// add a initBinder to ... to convert trim input strings
		// remove leading and trailing whitespace
		// resolve issue for our validation
		
		@InitBinder
		public void initBinder(WebDataBinder dataBinder) {
			
			StringTrimmerEditor stringTrimmerEditor = new StringTrimmerEditor(true);
			
			dataBinder.registerCustomEditor(String.class, stringTrimmerEditor);
			
		}

	@RequestMapping("/showForm")
	public String showForm(Model theModel) {
		
		//create a student object
		Student theStudent = new Student();
		
		//add that student object to the model
		theModel.addAttribute("student", theStudent);
		
		return "student-form";
	}
	
	@RequestMapping("/processForm")
	public String processForm(@Valid @ModelAttribute("student") Student theStudent, 
			BindingResult theBindingResult) {
		
		// log the input data
		System.out.println("the student:" + theStudent.getFirstName() + " " + theStudent.getLastName() 
		+ " " + theStudent.getCountry() + " " + theStudent.getFavouriteLanguage() );
		
		if(theBindingResult.hasErrors()) {
			return "student-form";
		} else {
			return "student-confirmation";
		}
	}
}

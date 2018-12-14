package com.luv2code.springdemo.mvc;

import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.RequestMapping;


// this one thinks it works, but it doesnt
@Controller
public class SillyController {

	@RequestMapping("/showForm")
	public String displayTheForm() {
		
		return "silly";
	}
}

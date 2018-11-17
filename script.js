if (localStorage.getItem('polskiHidden') == "yes") 
		{
			hide("polski","polskiHidden");										
		} 
		else 
		{
			show("polskiHidden","polski");																							
		}

if (localStorage.getItem('englishiHidden') == "yes") 
		{
			hide("amerykanski","englishiHidden");	
			hide("wymowa","pronHidden");				
		} 
		else 
		{
			show("englishiHidden","amerykanski");
			show("pronHidden","wymowa");			
		}

		
	function startMePl()
		{
			if (localStorage.getItem('polskiHidden') == "yes") 
			{
				show("polskiHidden","polski");																							
				localStorage.setItem('polskiHidden','no');
			} 
			else 
			{
				hide("polski","polskiHidden");										
				localStorage.setItem('polskiHidden','yes');
			}
		}
		
	function startMeEn()
		{
			if (localStorage.getItem('englishiHidden') == "yes") 
			{
				show("englishiHidden","amerykanski");																						
				show("pronHidden","wymowa");																						
				localStorage.setItem('englishiHidden','no');
			} 
			else 
			{
				hide("amerykanski","englishiHidden");											
				hide("wymowa","pronHidden");											
				localStorage.setItem('englishiHidden','yes');
			}
		}
		
		
	function hide(firstP, secondP) {													
			document.getElementById(firstP).style.display = "none"; 
			document.getElementById(secondP).style.display = "block"; 
		}
		
	function show(firstP, secondP) {																							
			document.getElementById(firstP).style.display = "none";
			document.getElementById(secondP).style.display = "block";
		}
		
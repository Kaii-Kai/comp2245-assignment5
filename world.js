document.addEventListener("DOMContentLoaded", function() {
	const searchCountry = document.getElementById("country");
	const lookup = document.getElementById("lokup");
	const resultDiv = document.getElementById("result");
	const lookupCities = document.getElementById("lookup_cities");

	function getResults(type) {
		const searchedInput = searchCountry.value.trim(): '';
		
		const httpReq = new XMLHttpRequest();
		
		const url = "world.php?country=${encodeURIComponent(country)}&lookup=${type}";
		httpReq.onreadystatechange = lookup;
		httpReq.open('GET'. url);
		httpReq.send();
		
		function lookup() {
			if (httpReq.readySate === XMLHttpRequest.DONE) {
				if (httpReq.status === 200) {
					resultDiv.innerHTML = httpReq.responseText;
				}else {
					resultDiv.innerHTML = "<p>There was an error.</p>";
				}
			};
		}
	}
	
	lookup.addEventListener("click",()=> getResults("countries"));
	
	lookup_cities.addEventListener("click",()=> getResults("cities"));
});
		
		
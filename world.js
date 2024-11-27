document.addEventListener("DOMContentLoaded", function() {
	const searchCountry = document.getElementById("country");
	const lookup = document.getElementById("lokup");
	const resultDiv = dovument.getElementById("result");

	lookup.addEventListener("click", function() {
		//event.preventDefault();
		const searchedInput = searchCountry.value.trim();
		
		const httpReq = new XMLHttpRequest();
		
		const url = "world.php";
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
	});
});
		
		/*if (!country) {
			resultDiv.innerHTML = "<p>Please enter a country name.</p>";
			return;
		}
		
		fetch("world.php")
			.then(response => {
				if (response.ok){
					return response.text()
					//return response.json()
				}else {
					return Promise.reject("Country not found");
					//return throw new Error("Country not found");
				}
			})
			.then(data => {
				result.innerHTML = data
				//RESULT(data);
			})
			.catch(error => {
				resultDiv.innerHTML = `<p>There was an error.</p>`;
			});
	});
});

function RESULT(data) {
	resultDiv.innerHTML = `
		<h2>Country Info</h2>
		<p><bold>*/
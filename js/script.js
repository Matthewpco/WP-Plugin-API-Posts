// Select main shortcode cotainer class
var shortcodeMainClass = document.querySelector(".hl-apidata-container");
// Boolean to check if SC is active
var isApidataActive;


// Error control to check if shortcode is active on current page
const isShortcodeActive = () => {
	if (shortcodeMainClass == null) {
		isApidataActive = false;
	}
	else if (shortcodeMainClass !== null) {
		isApidataActive = true;
	}
}


// Calls the function to set shortcode active to true or false
isShortcodeActive();

// If shortcode is active run main code
if (isApidataActive == true) {
	console.log("Apidata sc active")
	
	// Function to Fetch data about posts
	const getHeadlessApidata = async function() {
		const response = await fetch(
		'https://therealdeal.com/wp-json/wp/v2/posts?_embed'
		);
		const result = await response.json();
		// Pass fetched props to be displayed
		displayHeadlessApidata(result);		
	}
	

	// Call function to populate data
	getHeadlessApidata();	
	
	// Function to loop through 3 most recent posts and use a template literal to return HTML with js object data
	const displayHeadlessApidata = (result) => {
		// Increment variable to control how many posts are being looped through
		let incrementVar = 0;
		
		// Loop through JSO to get specific data
		for(const singleResult of result) {
		incrementVar++;
		
		// Loops through 3 posts
		if(incrementVar < 4) {
        const resultDiv = document.createElement("div");
		resultDiv.classList.add("headless-apidata");
        resultDiv.innerHTML = `
        <h2 class="headless-apidata-h2"><a href="${singleResult.link}">${singleResult.title.rendered}</a></h2>
		<img src="${singleResult['_embedded']['wp:featuredmedia']['0']['source_url']}"> </>
		<p> ${singleResult.excerpt.rendered} </p>
        `;		
			shortcodeMainClass.appendChild(resultDiv);
			}
		}
	}
}
else {
	console.log("Headless api sc not active");
}